<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CreateContactEmailRequest;
use Mail;

class ContactsController extends Controller
{
    public function store(Request $request)
    {
    	$name = $request->name;
    	$email = $request->email;
    	$phone = $request->phone;
    	$message = $request->message;
        $theme = $request->theme;

        $headers = 'From: info@ideadesign.lt' . "\r\n" .
	    'Reply-To: info@ideadesign.lt' . "\r\n" .
	    'X-Mailer: PHP/' . phpversion();

		$mail = mail('id@ideadesign.lt', $theme, $message, $email);

        if($mail){            
             flash()->success('', 'Žinutė siunčiama!');
             return redirect()->back();
        }else{
            return 'Something wrong happened';
        }

    }

}
