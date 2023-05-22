<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();

        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:5',
            'contact' => 'required|numeric|digits:9|unique:contacts,contact',
            'email' => 'required|email|unique:contacts,email'
        ]);
        
        $contact = new Contact($request->all()); // Create a new Contact object
        $contact->user_id = Auth::id(); // Assign the authenticated user ID to the user_id field
        $contact->save(); // Save the new contact record to the database

        return redirect()->route('contacts.index')->with('success', 'Contact added successfully.');
    }

    public function edit($id)
    {
        $contact = Contact::find($id);
        return view('contacts.edit', compact('contact'));
    }

    public function scopeExcludeId($query, $id)
    {
        return $query->where('id', '<>', $id);
    }

    public function update(Request $request, $id)
    {
        $contact = Contact::find($id);
        $this->validate($request, [
            'name' => 'required|min:5' . $contact->id,
            'contact' => [
                'required',
                'numeric',
                'digits:9',
                Rule::unique('contacts', 'contact')->ignore($contact->id)
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('contacts', 'email')->ignore($contact->id)
            ]
        ]);

        $contact->fill($request->all())->save();

        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully.');
    }

    public function destroy($id)
    {
        $contact = Contact::find($id);
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
    }
}
