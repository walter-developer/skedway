<?php

namespace App\Http\Controllers;

use App\Http\Requests\{
    FormEventId,
    FormEventCreate,
    FormEventUpdate,
    FormEventDelete
};
use Carbon\Carbon;
use App\Models\Event;
use App\Enumerations\EnumTimezones;
use App\Http\Controllers\Controller;
use App\Support\Collection\Collection;
use Illuminate\Support\Facades\DB;

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

    public function events(FormEventId $request)
    {
        $collection = $request->valid();

        $timezones = new Collection($this->event::TIMEZONES->options());

        $event = $collection->isNotEmpty('event')
            ? new Collection($this->event->find($collection->get('event'))?->toArray() ?: []) : new Collection();

        return view('crud-events', compact('event', 'timezones'));
    }

    public function data()
    {
        $events = $this->event
            ->where('end', '>=', DB::raw('CURRENT_TIMESTAMP()'))
            ->orderby('start', 'asc')
            ->get()?->toArray();

        $status = count($events) ? 200 : 204;

        return response()->json($events, $status)
            ->setStatusCode($status);
    }

    public function create(FormEventCreate $request)
    {
        $collection = $request->valid();

        $newEvent = [
            'title' => $collection?->get('title'),
            'description' => $collection?->get('description'),
            'timezone' => EnumTimezones::enum($collection?->get('timezone', EnumTimezones::TMZ_578_UTC->value))?->value,
            'start' =>  $collection?->get('start'),
            'end' => $collection?->get('end'),
        ];

        $this->event->firstOrCreate($newEvent, $newEvent);

        return redirect(route('calendar.calendar.get'));
    }


    public function update(FormEventUpdate $request)
    {

        $collection = $request->valid();

        $findEvent = [
            'id' => $collection?->get('id')
        ];

        $newEvent = [
            'title' => $collection?->get('title'),
            'description' => $collection?->get('description'),
            'timezone' => EnumTimezones::enum($collection?->get('timezone', EnumTimezones::TMZ_578_UTC->value))?->value,
            'start' =>  $collection?->get('start'),
            'end' => $collection?->get('end'),
        ];

        $this->event->updateOrCreate($findEvent, $newEvent);

        return redirect(route('calendar.calendar.get'));
    }


    public function delete(FormEventDelete $request)
    {
        $collection = $request->valid();
        $this->event->find($collection->get('event'))?->delete();
        return redirect(route('calendar.calendar.get'));
    }
}
