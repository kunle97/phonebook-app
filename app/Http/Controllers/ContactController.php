<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contact;
class ContactController extends Controller
{
    public function createContact(Request $request){
        $contact = new Contact();
        if(Auth::User()){
          $contact->user_id = Auth::User()->id;
        }else {
            return redirect()->route('home');
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
    public function getPhonebook(){
      if(Auth::User()){
        $contacts = Contact::where('user_id', Auth::User()->id)->get();
        return view('phonebook',['contacts' => $contacts]);
      }else{
          return redirect()->route('home');
      }
    }
    public function updateContact(Request $request){
      if(Auth::User()){
          $contact = Contact::where('id',$request['edit-contact-id'])->first();

          $contact->first_name = $request['first_name'];
          $contact->last_name = $request['last_name'];
          $contact->email = $request['email'];
          $contact->phone = $request['phone'];
          $contact->address = $request['address'];

          if($contact->save()){
            return redirect()->back();
          }

      }else {
          return redirect()->route('home');
      }

    }
    public function deleteContact($contact_id){
      $contact = Contact::where('id', $contact_id)->first();
      if (Auth::user()->id != $contact->user_id) {//Verifies if correct user is deleting post
          return redirect()->back();
      }

      if($contact->delete()){
        return redirect()->route('phonebook')->with(['message' => 'Successfully deleted contact']);
      }
    }

}
