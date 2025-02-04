<?php

namespace App\Services;

use App\Models\Message;
use Illuminate\Support\Facades\Http;

class ChattBotService
{
    public function __construct(
        private Message $message
    ) {}
    public function message(string $message)
    {
        try {
            $response = Http::post(config('app.gemini.url', '') . '?key=' . config('app.gemini.key', ''), [
                'contents' => [
                    [
                        'parts' => [
                            ['text' => $message]
                        ]
                    ]
                ],
            ]);

            if ($response->successful()) {
                $data = $response->json();
                return $this->message->create([
                    'question' => $message,
                    'content' => preg_replace("/\n|\*\*/", "", $data['candidates'][0]['content']['parts'][0]['text']),
                ]);
            }


            if ($response->failed()) {
                throw new \Exception('Failed to communicate with the chatbot.');
            }

            return $response->json();
        } catch (\Throwable $th) {
            throw new \Exception('Failed to communicate with the chatbot: ' . $th->getMessage());
        }
    }

    public function data()
    {
        return $this->message->get();
    }
}
