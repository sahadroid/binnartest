<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OrganizersController extends Controller
{
    public function index()
    {   

        $api = 'https://api-sport-events.php6-02.test.voxteneo.com/api/v1/organizers';
        $req = Http::withToken(config('token.key'))->get($api);
        $res = $req->json();

        return response([
            'title' => 'Get list of all organizers',
            'data' => $res
        ], 200);   

    }

    public function show($id)
    {   

        $api = 'https://api-sport-events.php6-02.test.voxteneo.com/api/v1/organizers/'.$id;
        $req = Http::withToken(config('token.key'))->get($api);
        $res = $req->json();
  
        return response([
            'title' => 'Get single organizer',
            'data' => $res
        ], 200);  
             
    }


    public function update(Request $request, $id)
    {

        $json = file_get_contents('php://input');
        $inputs =  json_decode($json, true); 

        $api = 'https://api-sport-events.php6-02.test.voxteneo.com/api/v1/organizers/'.$id;
        $req = Http::withToken(config('token.key'))->put($api, $inputs);
        $res = $req->json();

        return response([
            'title' => 'Update organizer',
            'data' => $res
        ], 200);   

    }


    public function destroy($id)
    {
        $api = 'https://api-sport-events.php6-02.test.voxteneo.com/api/v1/organizers/'.$id;
        $req = Http::withToken(config('token.key'))->delete($api);
        $res = $req->json();

        return response([
            'title' => 'Delete organizer',
            'data' => $res
        ], 200);   

    }

    public function store(Request $request)
    {   
        $json = file_get_contents('php://input');
        $inputs =  json_decode($json, true); 

        $api = 'https://api-sport-events.php6-02.test.voxteneo.com/api/v1/organizers';
        $req = Http::withToken(config('token.key'))->post($api, $inputs);
        $res = $req->json();

        return response([
            'title' => 'Create organizer',
            'data' => $res
        ], 200);   
        
    }
}

