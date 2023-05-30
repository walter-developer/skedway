<?php

namespace App\Http\Controllers;

use App\Enumerations\EnumTimezones;
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

    public function calendar()
    {
        return view('events-calendar');
    }

    public function events()
    {
        return view('crud-events');
    }

    public function data()
    {
        $events = $this->event->get()?->toArray();
        $status = count($events) ? 200 : 204;
        return response()->json($events, $status)
            ->setStatusCode($status);
    }



    public function teste()
    {
        $carbon = (new Carbon());

        $dateBrasil = (new \DateTime("now", new \DateTimeZone("America/Sao_Paulo")));

        $newEvent = [
            'title' => 'Segund evento',
            'description' => 'Segund evento',
            'timezone' => EnumTimezones::enum('America/Sao_Paulo'),
            //'timezone' => EnumTimezones::TMZ_168_AMERICA_NEW_YORK,
            'start' => $dateBrasil->format('Y-m-d H:i:s'),
            'end' => $dateBrasil->format('Y-m-d H:i:s'),
        ];

        $last = $this->event->firstOrCreate($newEvent, $newEvent)?->refresh();

        //dd('aqui', $this->event->get()?->toArray());
        //dd($last, $last?->toArray());

        return view('event', ['event' => $last?->toArray()]);
    }
}
