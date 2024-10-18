<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Referrer;
use App\Models\DownloadReferrer;
use Illuminate\Support\Facades\Log;

class ReferrerController extends Controller
{
    public function storeReferrer(Request $request){
        $input = $request->json()->all();
        $referrer = new Referrer();
        $referrer->referrer = $input['referrer'];
        $referrer->save();
        return response()->json([
            "status" => true,
            "data" => "OK"
        ]);
    }

    public function storeDownloadReferrer(Request $request){
        $input = $request->json()->all();
        //Log::info($input['referrer']); die();
        $referrer = new DownloadReferrer();
        $referrer->referrer = $input['referrer'];
        //$referrer->download = 1;
        $referrer->save();
        return response()->json([
            "status" => true,
            "data" => "OK"
        ]);
    }
}
