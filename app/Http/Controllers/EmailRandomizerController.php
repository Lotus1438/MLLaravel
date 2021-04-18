<?php

namespace App\Http\Controllers;

use App\Models\EmailRandomizer;
use Illuminate\Http\Request;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;
use App\Mail\Email;

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

        // $selectedMails = $request->emails;
        // $selectedMails->save();
        // return response()->json($request->emails);

        // $selectedMails = new EmailRandomizer;
        // $selectedMails->emails = $request->emails;
        // $selectedMails->toArray();
        // $selectedMails->save();

        $selectedMails = [];
        return response()->json($request->emails);
        // dd($request->emails);


    }

    public function RandomizeEmail(Request $request)
    {
        $mails = DB::table('email_randomizers');

        $random = Arr::random($mails,3);

        return response()->json($random);

    }


    // public function sendEmail()
    // {
    //    $details = [
    //        'title' => "Email Test",
    //        'body' => "This is a test"
    //    ];

    //    Mail::to("rhea.ardiente@mlhuillier.com")->send(new Email($details));
    //    return "Email Sent";
    // }

    public function sendEmailsRandom(Request $request)
    {
        $response = [];
        $response["message"] = "Successfully sending emails!";
        $response["data"] = $request;
        return response()->json($response);
    }

    public function allEmails()
    {
        $response = [];
        $emails = User::all();

        if(!$emails){
            $response["message"] = "No data Found!";
        }else{
            $response["message"] = "Success";
            $response["data"] = $emails;
            $response["errors"] = false;
        }
        return response()->json($response);
    }

}
