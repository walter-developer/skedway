<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Carbon\Carbon;

class EventController extends Controller
{
    private Event $event;

    public function __construct(Event $event)
    {
        $this->event = $event;
    }

    public function teste()
    {
        $carbon = (new Carbon());

        $dateUtc = new \DateTime("now", new \DateTimeZone("America/Sao_Paulo"));

        $newEvent = [
            'title' => 'Segund evento',
            'description' => 'Segund evento',
            //'start' => $carbon->now(),
            //'end' => $carbon->now()->addDay(1),
            'start' => $dateUtc->format('Y-m-d H:i:s'),
            'end' => $dateUtc->format('Y-m-d H:i:s'),
        ];

        // dd($dateUtc, $newEvent);


        //$this->event->firstOrCreate($newEvent, $newEvent);

        dd('aqui', $this->event->get()?->toArray());

        return view('event', ['event' => $this->event->first()?->toArray()]);
    }
}
