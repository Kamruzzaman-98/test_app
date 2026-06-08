<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AIController extends Controller
{
    public function index()
    {
        return view('admin.ai.index');
    }

    public function ask(Request $request)
    {
        $message = $request->message;

        $models = [
            'gemini-3.5-flash',
            'gemini-3.1-flash-lite',
        ];

        foreach ($models as $model) {

            $response = Http::post(
                "https://generativelanguage.googleapis.com/v1/models/{$model}:generateContent?key=" . env('GEMINI_API_KEY'),
                [
                    'contents' => [
                        [
                            'parts' => [
                                ['text' => $request->message]
                            ]
                        ]
                    ]
                ]
            );

            $data = $response->json();

            if (isset($data['candidates'][0]['content']['parts'][0]['text'])) {
                return response()->json([
                    'reply' => $data['candidates'][0]['content']['parts'][0]['text']
                ]);
            }
        }
    }
}
