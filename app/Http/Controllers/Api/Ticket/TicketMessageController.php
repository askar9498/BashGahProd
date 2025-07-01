<?php

namespace App\Http\Controllers\Api\Ticket;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\TicketMessage;
use App\Services\File\FileManager;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TicketMessageController extends Controller
{
    /**
     * @param Request $request
     * @param Ticket $ticket
     * @param FileManager $fm
     * @return JsonResponse
     */
    public function store(Request $request, Ticket $ticket, FileManager $fm): JsonResponse
    {
        $request->validate([
            'message' => 'required|min:4',
            'files' => 'nullable|array',
        ]);

        $message = new TicketMessage();
        $message->user_id = Auth::guard('api')->id();
        $message->ticket_id = $ticket->id;
        $message->body = $request->input('message');
        $ticket->updated_at = Carbon::now();
        $message->save();

        if (!empty($request->input('files'))) {
            $files = array_map(function ($item) {
                return ['id' => $item];
            }, $request->input('files'));

            $fm->attachFile('tickets', $message->id, $files);
        }

        return new JsonResponse(['message' => 'پیام ارسال شد']);
    }
}
