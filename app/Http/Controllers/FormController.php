<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class FormController extends Controller {
    public function upload(Request $request) {
        Log::info(Session::getId());
        Log::info(session()->token());
        Log::info($request->_token);
        if (!Auth::check()) {
            return redirect('/')->with("error", "You must be logged in before you can upload chirp");
        }
        $validated = $request->validate([
            'chirp' => 'required'
        ]);
        Log::info($validated);
        Log::info(Auth::user());
        Log::info(Auth::id());
        try {
            //code...
            Chirp::create([
                "message" => $validated['chirp'],
                'user_id' => Auth::id()
            ]);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return redirect('/')->with("error", "Something went wrong");
        }
        return redirect('/')->with("success", "Chirp Uploaded Successfully!");
    }
    public function login(Request $request) {
        if (Auth::check()) {
            return redirect('/');
        }
        $credentials = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);
        try {
            if (Auth::attempt($credentials, true)) {
                $request->session()->regenerate();
                return redirect('/');
            }
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return redirect('/')->with("error", "Something went wrong");
        }
        return redirect('/')->with("success", "Chirp Uploaded Successfully!");
    }
}
