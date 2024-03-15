<?php

namespace App\Middleware;

use App\Models\Users;
use App\Models\ApiKeys;
use Leaf\Helpers\Authentication;

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

    public function __construct()
    {
     
        $this->users = new Users();
        $this->apiKeys = new ApiKeys();
        
        $this->user = auth()->user() ?? null;
        $this->uri = ltrim($_SERVER['REQUEST_URI'], '/');
        $this->uriRules = require_once getcwd() . '/app/routes/guard.php';
        
    }

    public function init(): bool
    {
        $rules = $this->getExpressionRules();
        
        if(strpos($this->uri, 'api/') === 0) {
            $this->apiRequestAccess($rules);
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

        # get user data
        return $this->users->find($data->user_id);
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
    protected function apiRequestAccess($rules) :void
    {
        
        if(!$rules['session']) {
            return;
        }

        $this->user = $this->authenticateApi();

        if ($rules['session'] && !$this->user) {
            die ( response()->json($this->errors) );
        }

        if (is_array($rules['access'])) {
            if ($this->user && !in_array($this->user->role, $rules['access'])) {
                die ( response()->json(['status'=>'error', 'message'=>'Unauthorized']) );
            }
        } elseif ($rules['access'] !== 'all') {
            if ($this->user && $this->user->role !== $rules['access']) {
                die ( response()->json(['status'=>'error', 'message'=>'Unauthorized']) );
            }
        }
    }

}