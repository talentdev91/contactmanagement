<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

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
            'name' => 'required|min:5|unique:contacts,name',
            'contact' => 'required|numeric|digits:9|unique:contacts,contact',
            'email' => 'required|email|unique:contacts'
        ]);

        $contact = Contact::create($request->all());

        return redirect()->route('contacts.index')->with('success', 'Contact added successfully.');
    }

    public function show($id)
    {
        $contact = Contact::find($id);

        return view('contacts.show', compact('contact'));
    }

    public function edit($id)
    {
        $contact = Contact::find($id);

        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:5|unique:contacts,name',
            'contact' => 'required|numeric|digits:9|unique:contacts,contact',
            'email' => 'required|email|unique:contacts,email,' . $id
        ]);

        $contact = Contact::find($id);
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
