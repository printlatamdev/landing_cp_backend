<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $data = Contact::orderBy('id', 'desc')->get();

        return response()->json([
            'data' => $data,
        ]);
    }

    public function store(ContactRequest $request)
    {
        $data = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'description' => $request->description,
        ]);

        return response()->json([
            'data' => $data,
            'message' => 'Contact stored successfully!',
        ]);
    }
}
