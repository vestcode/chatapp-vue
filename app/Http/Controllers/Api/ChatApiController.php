<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use Illuminate\Http\Request;
use Inertia\Inertia;
use OpenAI\Laravel\Facades\OpenAI;

class ChatApiController extends Controller
{
    public function sendMessage(Request $request)
    {

        $this->addToDialog($request->message, 'question');

        $result = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'user', 'content' => $request->message],
            ],
        ]);

        $this->addToDialog($result->choices[0]->message->content, 'answere');

        return $this->getChats();
    }


    public function addToDialog(string $msg, string $typ) : void {
        $chat = new Chat();
        $chat->msg = $msg;
        $chat->typ = $typ;
        $chat->save();
    }


    public function getChats()
    {
        return Chat::query()->orderBy('created_at', 'ASC')->get();
    }
}
