<?php

namespace App\Middleware;

use App\Models\User;
use App\Models\ApiKey;

use Leaf\Helpers\Authentication;
use App\Controllers\App\ApiController;

class Auth
{

    protected $uri;
    protected $user;
    protected $users;
    protected $errors;
    protected $apiKeys;

    protected $home = 'app/home';
    protected $login = 'auth/login';

    protected $uriRules;
    protected $apiMonitor;

    public function __construct()
    {
     
        $this->users = new User();
        $this->apiKeys = new ApiKey();
        
        $this->user = auth()->user() ?? null;
        $this->uri = ltrim($_SERVER['REQUEST_URI'], '/');
        $this->uriRules = require_once getcwd() . '/app/routes/guard.php';

        $this->apiMonitor = new ApiController();
        
    }

    public function init(): bool
    {
        $rules = $this->getExpressionRules();
        
        if(strpos($this->uri, 'api/') === 0) {
            $response = $this->apiRequestAccess($rules);

            if(isset($response['apiId']) && $response['apiId'] !== false)
                $this->recordApiActivity($response);
            
            if(isset($response['apiId'])) unset($response['apiId']);

            if(isset($response['status']) and $response['status'] == 'error')
                exit(response()->json($response));

        } else {
            $this->webRequestAccess($rules);
        }

        return true;
    }

    public function getExpressionRules(): array
    {
        
        if (isset($this->uriRules[$this->uri])) {
            return $this->uriRules[$this->uri];
        }

        foreach ($this->uriRules as $pattern => $rules) {
            
            $regex = '#^' . strtr(preg_quote($pattern, '#'), [
                '\{int\}' => '(\d+)',           # number based values
                '\{slug\}' => '([a-z0-9-]+)',   # alpha numerical values
                '\{any\}' => '([^/]+?)',        # anything except slashes
                '\{wild\}' => '(.*)'            # wild card
            ]) . '$#i';

            if (preg_match($regex, $this->uri, $matches)) {
                return $rules;
            }
        }

        return ['session' => false, 'access' => 'all'];
    }

    public function authenticateApi()
    {

        $bearerToken = $_SERVER['HTTP_AUTHORIZATION'] ?? null;

        if($bearerToken) $bearerToken = explode(' ', $bearerToken)[1];
        
        // get secret key from token
        $key = $this->apiKeys->getSecret($bearerToken)->secret ?? getenv('app_key');

        $data = Authentication::validateToken($key);

        if (!$data) {
            $errors = Authentication::errors();
            $this->errors = ['status'=>'error', 'message'=>$errors['token']];

            return null;
        }

        # get user data and apiId if available
        return [ 
            'user'=>User::find($data->user_id),
            'apiId'=>$this->apiKeys->getSecret($bearerToken)->id ?? false
        ];
    }

    protected function webRequestAccess($rules) :void
    {

        if ($rules['session'] && !$this->user) {
            exit(header("Location: /{$this->login}"));
        }

        // page guest access but user is logged in
        if ($rules['access'] === 'guest' && $this->user) {
            exit(header("Location: /{$this->home}"));
        }

        if (is_array($rules['access'])) {
            if ($this->user && !in_array($this->user['role'], $rules['access'])) {
                exit(header("Location: /{$this->home}"));
            }
        } elseif ($rules['access'] !== 'all') {
            if ($this->user && $this->user['role'] !== $rules['access']) {
                exit(header("Location: /{$this->home}"));
            }
        }
    }

    # applicable to only api requests stating with 'api/'
    protected function apiRequestAccess($rules, $apiID=0) 
    {
        
        if(!$rules['session']) {
            return;
        }

        $meta = $this->authenticateApi();

        $this->user = $meta['user'] ?? null;

        if ($rules['session'] && !$this->user) {
            $response = $this->errors;
        }

        if (is_array($rules['access'])) {
            if ($this->user && !in_array($this->user->role, $rules['access']))
                $response = ['status'=>'error', 'message'=>'Unauthorized'];
            
        } elseif ($rules['access'] !== 'all') {
            if ($this->user && $this->user->role !== $rules['access'])
                $response = ['status'=>'error', 'message'=>'Unauthorized'];
            
        }

        if(isset($response)) :
            $response['apiId'] = $meta['apiId'] ?? false;
            else: $response = [ 'apiId' => $meta['apiId'] ];
        endif;

        return $response;
    }

    protected function recordApiActivity($response)
    {
        if(isset($response['status']) and $response['status'] == 'error'):

            $this->apiMonitor->logActivity($response['apiId'], 'fail');
            unset($response['apiId']);
            exit(response()->json($response));

        endif;

        $this->apiMonitor->logActivity($response['apiId'], 'pass');    
        
    }

}