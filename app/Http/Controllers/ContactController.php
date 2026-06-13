<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
        ]);

        try {
            Mail::send('emails.contact', [
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'userMessage' => $request->message,
            ], function($mail) {
                $mail->to('admin@spaceint.id')
                    ->subject('Pesan Baru dari ' . request('name'));
            });

            return redirect()->route('contact')
                ->with('success', 'Pesan terkirim! Kami akan membalas dalam 1x24 jam.');
        } catch (\Exception $e) {
            Log::error('Contact email error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal mengirim pesan. Silakan coba lagi.');
        }
    }
}