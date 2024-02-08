<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    //
    public function index()
    {
        $results = Event::with("user")->get();
        $data = [
            "success" => true,
            "payload" => $results
        ];
        return response()->json($data);
    }

    // Metodo show che usa il success true/false
    public function show($id)
    {
        $event = Event::with("user")->find($id);

        return response()->json([
            "success" => $event ? true : false,
            "payload" => $event ? $event : "Nessun evento corrispondente all'id"
        ]);
    }

    // Metodo show che usa l'http code automatico (findOrFail)
    // public function show($id)
    // {
    //     $event = Event::with("user")->findOrFail($id);

    //     return response()->json([
    //         "success" => $event,
    //         "payload" => $event
    //     ]);
    // }

    // Metodo show che usa l'http code manuale
    // public function show($id)
    // {
    //     $event = Event::with("user")->find($id);

    //     if(!$event) {
    //         return response(null, 404);
    //     }

    //     return response()->json([
    //         "success" => true,
    //         "payload" => $event
    //     ]);
    // }
}
