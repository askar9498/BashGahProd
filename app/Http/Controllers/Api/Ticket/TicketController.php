<?php

namespace App\Http\Controllers\Api\Ticket;

use App\Enums\TicketPriorities;
use App\Enums\TicketStatuses;
use App\Http\Controllers\Controller;
use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use App\Models\TicketDepartment;
use App\Models\TicketMessage;
use App\Models\TicketSubject;
use App\Services\File\FileManager;
use Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * @param Request $params
     * @return JsonResponse
     */
    public function index(Request $params): JsonResponse
    {
        $tickets = Ticket::whereUserId(Auth::guard('api')->id())->with(['unreadMessages', 'subject', 'department']);
        if (!empty($params['ticket_id'])){
            $tickets = $tickets->where('ticket_id',$params['ticket_id']);
        }

        return TicketResource::collection($tickets->orderByDesc('updated_at')->paginate(10))->response();
    }

    /**
     * @param Ticket $ticket
     * @return JsonResponse
     */
    public function show(Ticket $ticket): JsonResponse
    {
        $ticket->messages()->where('user_id', '!=', Auth::guard('api')->id())->update(['is_read' => true]);

        return new JsonResponse(['ticket' => $ticket->load(['messages','messages.files', 'unreadMessages', 'subject', 'department'])]);
    }

    /**
     * @param Request $request
     * @param FileManager $fm
     * @return JsonResponse
     */
    public function store(Request $request, FileManager $fm): JsonResponse
    {
        $request->validate([
            'title' => 'required|string|min:3',
            'subject_id' => 'required|exists:ticket_subjects,id',
            'department_id' => 'required|exists:ticket_departments,id',
            'priority' => ['required', TicketPriorities::validation()],
            'message' => 'required|string|min:4',
            'files' => 'nullable|array',
        ]);

        $ticket = new Ticket();
        $ticket->title = $request->input('title');
        $ticket->subject_id = $request->input('subject_id');
        $ticket->priority = $request->input('priority');
        $ticket->department_id = $request->input('department_id');
        $ticket->status = TicketStatuses::OPENED;
        $ticket->user_id = Auth::guard('api')->id();
        $ticket->save();

        $message = new TicketMessage();
        $message->body = $request->input('message');
        $message->ticket_id = $ticket->id;
        $message->user_id = Auth::guard('api')->id();
        $message->save();

        if (!empty($request->input('files'))) {
            $files = array_map(function ($item) {
                return ['id' => $item];
            }, $request->input('files'));

            $fm->attachFile('tickets', $message->id, $files);
        }

        return new JsonResponse(['messages' => 'success!', 'ticket' => new TicketResource($ticket)], 201);
    }


    public function open(Ticket $ticket): JsonResponse
    {
        $ticket->status = TicketStatuses::OPENED;
        $ticket->save();

        return new JsonResponse(['message' => 'تیکت با موفقیت باز شد']);
    }


    public function close(Ticket $ticket): JsonResponse
    {
        $ticket->status = TicketStatuses::CLOSED;
        $ticket->save();

        return new JsonResponse(['message' => 'تیکت با موفقیت بسته شد']);
    }


    public function subjects(): JsonResponse
    {
        return new JsonResponse(['subjects' => TicketSubject::all()]);
    }

    public function departments(): JsonResponse
    {
        return new JsonResponse(['departments' => TicketDepartment::all()]);
    }
}
