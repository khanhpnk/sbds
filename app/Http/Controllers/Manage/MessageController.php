<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Http\Requests\MessageRequest;
use App\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Http\JsonResponse;
use App\User;

class MessageController extends Controller
{
    const INBOX     = 'inbox';
    const SENT      = 'sent';

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($inbox)
    {
        switch ($inbox) {
            case self::INBOX:
                $messages = Auth::user()->messagesTo();
                break;
            case self::SENT:
                $messages = Auth::user()->messagesFrom();
                break;
        }
        $messages = $messages->orderBy('id', 'desc')->simplePaginate(2);

        return view('manage.messages.index', compact('messages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MessageRequest $request
     * @return Response
     */
    public function store(MessageRequest $request)
    {
        // Get id recipients by email
        $toId = User::where('email', $request->input('to'))->value('id');

        if (is_null($toId)) {
            return new JsonResponse(['message' => Lang::get('message.user')], 404);
        } else {
            // LOL you send message for myself?
            if (Auth::user()->id == $toId) {
                return new JsonResponse(['message' => Lang::get('message.lol')], 400);
            }

            $message = Auth::user()->messagesFrom()
                ->create([
                    'to' => $toId,
                    'subject' => $request->input('subject'),
                    'message' => $request->input('message'),
                ], 201);

            return new JsonResponse(['message' => Lang::get('message.sent')]);
        }
    }

    /**
     * Display the specified resource.
     *
     * Message $message
     * @return Response
     */
    public function show(Message $message)
    {
        // Message sent for me, update had read
        if ($message->to == Auth::user()->id) {
            $message->update(['read' => 1]);
        }

        return view('manage.messages.show', compact('message'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  MessageRequest $request
     * @return Response
     */
    public function mutilDestroy(MessageRequest $request)
    {
        Message::whereIn('id', $request->input('checkbox'))->delete();

        return new JsonResponse(['message' => Lang::get('message.destroy')], 200);
    }
}
