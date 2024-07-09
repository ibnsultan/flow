<?php

namespace App\Controllers\App;

use App\Models\ApiKey;
use App\Models\ApiActivity;

use App\Helpers\Helpers;
use Leaf\Helpers\Password;
use Leaf\Helpers\Authentication;

use App\Controllers\Controller;

class ApiController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display a listing of all user's API keys.
     *
     * @return \Leaf\Core\Response
     */
    public function index(){

        if(!$this->data->modules->api)
            exit(response()->page(getcwd()."/app/views/errors/404.html"));

        $this->data->title = 'API Key Management';
        $this->data->apiKeys = ApiKey::user(auth()->id());

        render('app.api.index', (array) $this->data);

    }

    /**
     * Issue a new API key
     *
     * @return \Leaf\Core\Response
     */
    public function issueKey(){

        if(!$this->data->modules->api)
            exit(response()->json(['status' => 'error', 'message' => 'API module is disabled']));
        
        $apiName = request()->get('api_name');
        $secretKey = Password::hash(request()->get('api_secret'));

        try{

            $token = Authentication::generateToken(
                [
                    'iat' => time(),
                    'exp' => strtotime('+1 year'),
                    'iss' => 'localhost',
                    'user_id' => auth()->id()
                ],
                $secretKey
            );

            ApiKey::create([
                'name' => $apiName,
                'user_id' => auth()->id(),
                'token' => $token,
                'secret' => $secretKey
            ]);

            response()->json(['status' => 'success', 'message'=> $token]);

        } catch (\Exception $e) {

            (getenv('app_debug') == "true")? $message = $e->getMessage() : $message = "Failed to generate an Api key";
            response()->json(['status' => 'error', 'message' => $message]);
        }
        

    }

    /**
     * Delete an API key
     *
     * @return \Leaf\Core\Response
     */
    public function revokeKey($id){

        $apiID = Helpers::decode($id);

        if($apiID == '') exit(response()->json(['status' => 'error', 'message' => 'Invalid request']));

        try {
            ApiKey::where('id', $apiID)->delete();
            response()->json(['status' => 'success', 'message' => 'API key revoked']);
            
        } catch (\Throwable $e) {
            (getenv('app_debug') == "true")? $message = $e->getMessage() : $message = "Failed to revoke the API key";
            response()->json(['status' => 'error', 'message' => $message]);
        }
   
    }

    /**
     * Get all user's API keys
     *
     * @return object
     */
    public function userKeys(){
        return ApiKey::user(auth()->id());
    }

    /**
     * Copy an API key
     *
     * @return object
     */
    public function copy(){

        if(!$this->data->modules->api)
            exit(response()->json(['status' => 'error', 'message' => 'API module is disabled']));

        $apiID = Helpers::decode(request()->get('api_id'));
        $secretKey = request()->get('api_secret');

        if($apiID == '' or $secretKey == '')
            exit(response()->json(['status' => 'error', 'message' => 'Invalid request']));

        $api = ApiKey::find($apiID);
        if(!$api)
            exit(response()->json(['status' => 'error', 'message' => 'API key not found']));

        // verify secret key
        if(!Password::verify($secretKey, $api->secret))
            exit(response()->json(['status' => 'error', 'message' => 'Invalid secret key']));

        response()->json(['status' => 'success', 'message' => $api->token]);
    }

    /**
     * Get all user's API activities
     *
     * @return \Leaf\Core\Response
     */
    public function activity($id){
        
        $apiKeyID = Helpers::decode($id);

        if($apiKeyID == '' or !$this->data->modules->api)
            exit(response()->page(getcwd()."/app/views/errors/404.html"));

        $this->data->title = 'API Activity';
        $this->data->apiID = $id;
        $this->data->apiKey = ApiKey::find($apiKeyID);
        $this->data->activities = ApiActivity::key($apiKeyID);

        render('app.api.activity', (array) $this->data);
        
    }

    /**
     * Log API activity
     *
     * @param string $apiID
     * @param string $status
     * @return void
     */
    public function logActivity($apiID, $status='pass'){

        ApiActivity::create([
            'handler' => $_SERVER['REQUEST_URI'],
            'origin' => $_SERVER['REMOTE_ADDR'],
            'payload' => $_REQUEST,
            'status' => $status,
            'apiID' => $apiID
        ]);
    }

}