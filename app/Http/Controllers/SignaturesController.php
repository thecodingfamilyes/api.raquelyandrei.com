<?php

namespace App\Http\Controllers;

use App\Signature;
use Illuminate\Http\Request;

class SignaturesController extends Controller
{
    public function index()
    {
        return Signature::latest()->get()->map(function ($item) {
            return $this->transform($item);
        });
    }

    public function store(Request $req)
    {
        return response()->json($this->transform(Signature::create([
            'name' => $req->name,
            'email' => $req->email,
            'message' => $req->message
        ])));
    }

    protected function transform(Signature $signature)
    {
        $email = md5(trim(strtolower($signature->email)));
        $size = 40;

        return [
            'name' => $signature->name,
            'gravatar' => "https://www.gravatar.com/avatar/{$email}?s={$size}&default=robohash",
            'message' => $signature->message,
            'created_at' => $signature->created_at
        ];
    }
}
