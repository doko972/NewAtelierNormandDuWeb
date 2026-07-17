<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Mail\ContactMessageMail;
use App\Models\ContactMessage;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(StoreContactRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $contactMessage = ContactMessage::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'subject' => $data['subject'] ?? null,
            'message' => $data['message'],
            'ip' => $request->ip(),
        ]);

        $adminEmail = Setting::where('key', 'contact_email')->value('value') ?? config('mail.from.address');

        Mail::to($adminEmail)->send(new ContactMessageMail($contactMessage));

        return back()->with('success', "Votre message a bien été envoyé, je vous réponds au plus vite.");
    }
}