<?php

namespace App\Http\Controllers;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Http\Request;
use App\Comment;

class commentLiveDataController extends Controller
{
    public function getLiveData(Request $request)
    {
        $response = new StreamedResponse(function() use ($request) {
            while(true) {
                echo 'data: ' . json_encode(Comment::all()) . "\n\n";
                ob_flush();
                flush();
                usleep(200000);
            }
        });
        $response->headers->set('Content-Type', 'text/event-stream');
        $response->headers->set('X-Accel-Buffering', 'no');
        $response->headers->set('Cach-Control', 'no-cache');
        return $response;
    }
}
