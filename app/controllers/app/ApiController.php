<?php

namespace App\Controllers\App;

use App\Models\ApiKeys;

use App\Controllers\Controller;
use Leaf\Helpers\Authentication;

class ApiController extends Controller
{
    protected $apiKeys;

    public function __construct()
    {
        parent::__construct();
        $this->apiKeys = new ApiKeys();
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
            'apiKey' => $this->apiKeys->find($apiKeyID)
        ];

        response()->markup(view('app.api.activity', $data));
        
    }

}