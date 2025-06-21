<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of contact messages.
     */
    public function index()
    {
        $messages = Contact::latest()->paginate(10);
        return view('admin.contact.index', compact('messages'));
    }

    /**
     * Display the specified message.
     */
    public function show(Contact $contact)
    {
        return view('admin.contact.show', compact('contact'));
    }

    /**
     * Remove the specified message from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contact.index')
            ->with('success', 'Message deleted successfully.');
    }
}
