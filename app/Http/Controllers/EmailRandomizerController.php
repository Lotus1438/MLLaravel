<?php

namespace App\Http\Controllers;

use App\Models\EmailRandomizer;
use Illuminate\Http\Request;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Support\Facades\DB;

class EmailRandomizerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function getAllMails()
    {
        $emails = DB::table('users')->select('id','email')->get();
        return response()->json($emails);
    }


    public function selectedMails(Request $request)
    {

        $email = new EmailRandomizer;
        $email->emails = serialize($request->emails);
        $email->save();


        // $result = DB::table('email_randomizers')->select('emails')->get();

        return response()->json([
            'result' => $email,
            'Mesage' => 'Emails Selected Successfully'
        ]);
    }

    public function RandomizeEmail()
    {
        # code...
    }



}
