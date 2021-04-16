<?php

namespace App\Http\Controllers;

use App\Models\EmailRandomizer;
use Illuminate\Http\Request;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class EmailRandomizerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

//query to get all emails in the database
    public function getAllMails()
    {
        $user = Auth::user();
        $emails = DB::table('users')->select('id','email')->get();
        return response()->json($emails);
    }


    //query to get all selected emails
    public function selectedMails(Request $request)
    {
        $user = Auth::user();
        $array = [];
        return response()->json($request->emails);



    }

    public function RandomizeEmail(Request $request)
    {
        $mails = DB::table('email_randomizers');

        $random = Arr::random($mails,3);

        return response()->json($random);

    }



}
