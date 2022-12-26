<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class UsersController extends Controller
{   

    public function store(Request $request)
    {   
        $json = file_get_contents('php://input');
        $inputs =  json_decode($json, true); 

        $api = 'https://api-sport-events.php6-02.test.voxteneo.com/api/v1/users';
        $req = Http::post($api, $inputs);
        $res = $req->json();

        return response([
            'title' => 'Create New User',
            'data' => $res
        ], 200);   

    }

    public function login(Request $request)
    {   
        $json = file_get_contents('php://input');
        $inputs =  json_decode($json, true); 

        $api = 'https://api-sport-events.php6-02.test.voxteneo.com/api/v1/users/login';
        $req = Http::post($api, $inputs);
        $res = $req->json();

        return response([
            'title' => 'Login User',
            'data' => $res
        ], 200);   
    }



    public function show($id)
    {   
        $api = 'https://api-sport-events.php6-02.test.voxteneo.com/api/v1/users/'.$id;
        $req = Http::withToken(config('token.key'))->get($api);
        $res = $req->json();
  
        return response([
            'title' => 'Single Data User',
            'data' => $res
        ], 200);  
             
    }

    public function update(Request $request, $id)
    {

        $json = file_get_contents('php://input');
        $inputs =  json_decode($json, true); 


        $api = 'https://api-sport-events.php6-02.test.voxteneo.com/api/v1/users/'.$id;
        $req = Http::withToken(config('token.key'))->put($api, $inputs);
        $res = $req->json();

        return response([
            'title' => 'Update User',
            'data' => $inputs
        ], 200);   

    }

    public function destroy($id)
    {

        $api = 'https://api-sport-events.php6-02.test.voxteneo.com/api/v1/users/'.$id;
        $req = Http::withToken(config('token.key'))->delete($api);
        $res = $req->json();

        return response([
            'title' => 'Delete User',
            'status' => "successfull"
        ], 200);   

    }
}