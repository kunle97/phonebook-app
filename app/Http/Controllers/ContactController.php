<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contact;
class ContactController extends Controller
{
    public function createContact(Request $request){
        $contact = new Contact()
        if(Auth::User()){

          $contact->user_id = Auth::User()->id
        }

        $contact->first_name = $request['first_name'];
        $contact->last_name = $request['last_name'];
        $contact->email = $request['email'];
        $contact->phone = $request['phone'];
        $contact->address = $request['address'];

        if($contact->save()){
          return redirect()->back();
        }

    }
    public function updateContact(Request $request){

    }
    public function deleteContact(Request $request){

    }
}
