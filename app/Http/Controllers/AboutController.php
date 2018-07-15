<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\MasterData;
use Illuminate\Http\Request;
use Stichoza\GoogleTranslate\TranslateClient;

class AboutController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('page.createforlooping');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        for ($x = 0; $x <= 100; $x++) {

        $tr = new TranslateClient(); // Default is from 'auto' to 'en'
        $tr->setSource('en'); // Translate from English
        $tr->setTarget('id'); // Translate to Indonesian

        $master_datum = new MasterData();
        $ip = $request->ip();
        $master_datum->ip = $ip;
        $detail = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
        $master_datum->id = $request->input("id");
        $master_datum->user = "drikdoank@gmail.com";
        $master_datum->id_aplikasi = rand(1,5);
        $master_datum->imei = rand(11212112,123232321);
        $master_datum->click = "save";
        $master_datum->view =  "home";
        $master_datum->connected_by="wifi";
        $master_datum->operator="IM3";
        $master_datum->type_device ="samsung";
        $master_datum->language = $detail->country;
        
        
        $reg_indo=$tr->translate($detail->region);
	    if($reg_indo=="Jakarta")
			$reg_indo="Jakarta Raya";
    
        $master_datum->state = $reg_indo;
        
        $master_datum->regional = $detail->city;    
        $master_datum->loc = $detail->loc;               
        $master_datum->save();
        }
        $status=true;
        return compact('status');
    }
}
