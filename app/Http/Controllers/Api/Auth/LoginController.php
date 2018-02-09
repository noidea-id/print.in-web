<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class LoginController extends Controller
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function login(Request $request)
    {
        $oauth_client = DB::table('oauth_clients')->where('id', 2)->first();

        $request->request->add([
            'username' => $request->username,
            'password' => $request->password,
            'grant_type' => 'password',
            'client_id' => $oauth_client->id,
            'client_secret' => $oauth_client->secret,
            'scope' => '*'
        ]);

        $proxy = Request::create(
            'oauth/token',
            'POST'
        );

        $oauth_grant = json_decode(Route::dispatch($proxy)->getContent());

        if (isset($oauth_grant->error)) {
            return response()->json($oauth_grant);
        }

        $user = Request::create(
            'api/user',
            'GET'
        );
        $user->headers->set('Authorization', 'Bearer ' . $oauth_grant->access_token);
        $user_info = json_decode(app()->handle($user)->getContent());

        $auth_info = (object)[];
        $auth_info->user_id = strval($user_info->id);
        $auth_info->name = $user_info->name;
        $auth_info->email = $user_info->email;
        $auth_info->role = 'customer';
        $auth_info->avatar = app()->make('url')->to('/placeholder/user.jpg');
        $auth_info->_token = $oauth_grant;

        return response()->json($auth_info);
    }
}
