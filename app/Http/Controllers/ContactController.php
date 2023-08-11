<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    /************************************************************************
    *Contact index page
    *************************************************************************/
    public function index(Request $request)
    {        
        $contacts = Contact::orderBy('created_at')->get(); //Fetch Contact

        if ($request->ajax()) {
            return response()->json(['data' => $contacts]);
        }

        return view('contact.index', compact('contacts'));
    }

    /************************************************************************
    *Contact store function
    *************************************************************************/
    public function store(Request $request)
    {        
        //Validate input values
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'city' => 'required',
            'email' => 'required|email',
            'dob' => 'required|date',
            'contact_no' => 'required',
        ]);

        if ($validator->fails()) 
        {
            //return response()->json(['error'=>$validator]);
            return response()->json(['error' => 'Error while adding Contact.']);
        }

        //Save Contact details
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->city = $request->city;
        $contact->email = $request->email;
        $contact->dob = $request->dob;
        $contact->contact_no = $request->contact_no;
        $contact->save();

        return response()->json(['success'=>'Contact added successfully.']);
    }

    /************************************************************************
    *Contact edit view page
    *************************************************************************/
    public function edit($id)
    {        
        $contact = Contact::find($id);
        return response()->json($contact);
    }

    /************************************************************************
    *Contact update function
    *************************************************************************/
    public function update(Request $request)
    {        
        //Validate input values
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'city' => 'required',
            'email' => 'required|email',
            'dob' => 'required|date',
            'contact_no' => 'required',
        ]);

        if ($validator->fails()) 
        {
            //return response()->json(['error'=>$validator]);
            return response()->json(['error' => 'Error while updating Contact.']);
        }

        //Update Contact details
        $contact = Contact::where('id', $request->contact_id)->first();
        $contact->name = $request->name;
        $contact->city = $request->city;
        $contact->email = $request->email;
        $contact->dob = $request->dob;
        $contact->contact_no = $request->contact_no;
        $contact->save();

        return response()->json(['success'=>'Contact updated successfully.']);
    }

    /************************************************************************
    *Contact delete function
    *************************************************************************/
    public function delete($id)
    {        
        Contact::where('id', $id)->delete();
        return response()->json(['success'=>'Contact deleted successfully.']);
    }
}
