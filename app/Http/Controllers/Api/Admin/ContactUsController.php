<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUsMessage;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index(Request $params): JsonResponse
    {
        $messages = ContactUsMessage::query();

        if (isset($params['from'])) {
            $messages = $messages->where('created_at', '=<', $params['from']);
        }

        if (isset($params['to'])) {
            $messages = $messages->where('created_at', '>=', $params['from']);
        }

        if (isset($params['page']) && $params['page'] == 'all') {
            $messages = $messages->orderByDesc('created_at')->get();
        } else {
            $messages = $messages->orderByDesc('created_at')->paginate(10);
        }

        return new JsonResponse(['messages' => $messages]);
    }
}
