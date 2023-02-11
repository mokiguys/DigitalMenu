<?php

namespace App\Http\Controllers\admin;

use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $contact = Contact::orderBy('status', 'ASC')->paginate(10);
        return view('admin.Forms.contact', compact('contact'));
    }

    public function UpdateStatusContact(Request $request)
    {
        $id = $request->input('id');
        $contact = Contact::findOrFail($id);
        if ($contact) {
            $contact->update([
                'status' => 1
            ]);
            echo "success";
        } else {
            echo "error";
        }
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return back();
    }
}
