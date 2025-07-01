<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ContactUsMessage;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ContactUsController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email',
            'subject' => 'required|string|max:100',
            'message' => 'required|string|max:500'
        ]);

        $contact_us = new ContactUsMessage();
        $contact_us->first_name = $request->input('first_name');
        $contact_us->last_name = $request->input('last_name');
        $contact_us->email = $request->input('email');
        $contact_us->subject = $request->input('subject');
        $contact_us->message = $request->input('message');
        $contact_us->ip = $request->ip();
        $contact_us->user_agent = $request->userAgent();
        $contact_us->save();

        $contact_us->setAttribute('key',config('context.bpms.key'));

        try {
            $response = Http::post(config('context.bpms.base_url').'/HRSendMessge',
                $contact_us->getAttributes()
            );
        } catch (\Exception $e) {
            // do nothings
        }

        return new JsonResponse(['message' => 'پیام با موفقیت ارسال شد!']);
    }
}
