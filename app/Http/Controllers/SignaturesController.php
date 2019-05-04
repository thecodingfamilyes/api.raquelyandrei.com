<?php

namespace App\Http\Controllers;

use App\Signature;
use Illuminate\Http\Request;

class SignaturesController extends Controller
{
    public function index()
    {
        return Signature::latest()->get();
    }

    public function store(Request $req)
    {
        return Signature::create([
            'name' => $req->name,
            'email' => $req->email,
            'message' => $req->message
        ]);
    }
}
