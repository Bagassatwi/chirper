<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class FormController extends Controller {
    public function upload(Request $request) {
        if (!Auth::check()) {
            return redirect('/')->with("error", "You must be logged in before you can upload chirp");
        }
        $validated = $request->validate([
            'chirp' => 'required'
        ]);
        try {
            //code...
            Chirp::create([
                "message" => $validated['chirp']
            ]);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return redirect('/')->with("error", "Something went wrong");
        }
        return redirect('/')->with("success", "Chirp Uploaded Successfully!");
    }
}
