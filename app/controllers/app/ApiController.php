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

    public function issueKey(){

        $key = hex2bin(time());
        $expiration = request()->get('end_date');

        $token = Authentication::generateToken([
            'iat' => time(),
            'exp' => strtotime($expiration) ?? strtotime("+1 year"),
            'user_id' => auth()->id(),
            'iss' => 'localhost'
        ], getenv('app_key'));

        // expration to dateTime ?? 1 year
        $expiration = date("Y-m-d H:i:s", strtotime($expiration) ?? strtotime("+1 year"));

        // insert token into db
        $this->apiKeys->create([
            'user_id' => auth()->id(),
            'key' => $key,
            'token' => $token,
            'expiration' => $expiration
        ]);

    }

    public function revokeKey(){
        $tokenID = request()->get('token_id');
        $this->apiKeys->delete($tokenID);
    }

    public function userKeys(){
        return $this->apiKeys->user(auth()->id());
    }

}