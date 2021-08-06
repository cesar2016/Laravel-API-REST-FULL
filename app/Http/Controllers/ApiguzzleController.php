<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use GuzzleHttp\Client;

class ApiguzzleController extends Controller
{
    public function guzzEndpoints(Request $request)
    {
         
        $client = new Client();         
        $url = "http://apifull.test/api/$request->endpoint";
        $token = '1|OQGI1ZIDwPzCOYoDpjOO8SmFoQoQ0cfPbCwKDD6a';

        $request = $client->get($url, [

            'headers'=> [
                'Authorization' => 'Bearer ' . $token,
                'Content-Type' => 'application/json'
                ]             
        
        ]);
        return json_decode($request->getBody());    
         
    }

    
    public function guzzSearch(Request $request)
    {
         
        $client = new Client();         
        $url = "http://apifull.test/api/$request->nameEndpoint/find/$request->id";
        $token = '1|OQGI1ZIDwPzCOYoDpjOO8SmFoQoQ0cfPbCwKDD6a';

        $request = $client->get($url, [

            'headers'=> [
                'Authorization' => 'Bearer ' . $token,
                'Content-Type' => 'application/json'
                ]             
        
        ]);
        return json_decode($request->getBody());  
        
    }



}
