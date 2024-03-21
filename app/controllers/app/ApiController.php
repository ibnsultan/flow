<?php

namespace App\Controllers\App;

use App\Models\ApiKey;
use App\Models\ApiActivity;

use App\Controllers\Controller;

class ApiController extends Controller
{
    protected $apiKeys;
    protected $apiActivities;

    public function __construct()
    {
        parent::__construct();
        $this->apiKeys = new ApiKey();
        $this->apiActivities = new ApiActivity();
    }

    /**
     * Display a listing of all user's API keys.
     *
     * @return \Leaf\Core\Response
     */
    public function index(){

        $data = [
            'title' => 'API Key Management',
            'apiKeys' => $this->apiKeys->user(auth()->id())
        ];

        response()->markup(view('app.api.index', $data));

    }

    /**
     * Issue a new API key
     *
     * @return \Leaf\Core\Response
     */
    public function issueKey(){
        
        $apiName = request()->get('api_name');
        $secretKey = \Leaf\Helpers\Password::hash(request()->get('api_secret'));

        try{

            $token = \Leaf\Helpers\Authentication::generateToken(
                [
                    'iat' => time(),
                    'exp' => strtotime('+1 year'),
                    'iss' => 'localhost',
                    'user_id' => auth()->id()
                ],
                $secretKey
            );

            $this->apiKeys->create([
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

        $apiID = \App\Helpers\Helpers::decode($id);

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
        return $this->apiKeys->user(auth()->id());
    }

    /**
     * Copy an API key
     *
     * @return object
     */
    public function copy(){

        $apiID = \App\Helpers\Helpers::decode(request()->get('api_id'));
        $secretKey = request()->get('api_secret');

        if($apiID == '' or $secretKey == '')
            exit(response()->json(['status' => 'error', 'message' => 'Invalid request']));

        $api = $this->apiKeys->find($apiID);

        // verify secret key
        if(!\Leaf\Helpers\Password::verify($secretKey, $api->secret))
            exit(response()->json(['status' => 'error', 'message' => 'Invalid secret key']));

        response()->json(['status' => 'success', 'message' => $api->token]);
    }

    /**
     * Get all user's API activities
     *
     * @return \Leaf\Core\Response
     */
    public function activity($id){
        
        $apiKeyID = \App\Helpers\Helpers::decode($id);

        if($apiKeyID == '') exit(response()->page(getcwd()."/app/views/errors/404.html"));
        
        $data = [
            'title' => 'Api Activity',
            'apiID' => $id,
            'apiKey' => $this->apiKeys->find($apiKeyID),
            'activities' => $this->apiActivities->activities($apiKeyID)
        ];

        response()->markup(view('app.api.activity', $data));
        
    }

    /**
     * Log API activity
     *
     * @param string $apiID
     * @param string $status
     * @return void
     */
    public function logActivity($apiID, $status='pass'){

        $this->apiActivities->create([
            'handler' => $_SERVER['REQUEST_URI'],
            'origin' => $_SERVER['REMOTE_ADDR'],
            'payload' => $_REQUEST,
            'status' => $status,
            'apiID' => $apiID
        ]);
    }

}