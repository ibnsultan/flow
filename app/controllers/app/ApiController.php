<?php

namespace App\Controllers\App;

use App\Models\ApiKeys;
use App\Models\ApiActivities;

use App\Controllers\Controller;

class ApiController extends Controller
{
    protected $apiKeys;
    protected $apiActivities;

    public function __construct()
    {
        parent::__construct();
        $this->apiKeys = new ApiKeys();
        $this->apiActivities = new ApiActivities();
    }

    public function index(){

        $data = [
            'title' => 'API Key Management',
            'apiKeys' => $this->apiKeys->user(auth()->id())
        ];

        response()->markup(view('app.api.index', $data));

    }

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

    public function revokeKey(){
        $tokenID = request()->get('token_id');
        $this->apiKeys->delete($tokenID);
    }

    public function userKeys(){
        return $this->apiKeys->user(auth()->id());
    }

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

}