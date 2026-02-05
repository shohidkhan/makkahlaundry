<?php

namespace App\Http\Controllers\web\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Whatsapp;
use Illuminate\Http\Request;

class WhatsAppController extends Controller
{
    public function index(){
        $whatsapp = Whatsapp::first();
        return view("backend.layouts.whatsapp.index",compact('whatsapp'));
    }

    public function update(Request $request){
        $request->validate([
            'number' => 'required|numeric',
        ]);

        $whatsapp = Whatsapp::first();

        $whatsapp->update([
            'number' => $request->number,
        ]);
        return redirect()->route('admin.whatsapp.index')->with('success', 'WhatsApp number updated successfully.');
    }
}