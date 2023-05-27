<?php

namespace App\Models;

use App\Models\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Event extends Model
{
    protected $table = 'events';

    protected $columns = [
        'id',
        'title',
        'description',
        'start',
        'end',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'title',
        'description',
        'start',
        'end',
    ];

    protected $appends = [
        'start_date_utc',
        'end_date_utc',
        'created_at_utc',
        'updated_at_utc',
        'deleted_at_utc',
    ];


    protected function start(): Attribute
    {
        return Attribute::make(
            get: fn ($date) => Carbon::parse($date)->setTimezone('UTC'),
            set: fn () => 1
        );
    }

    protected function startDateUtc(): Attribute
    {
        $date = $this->start;
        return Attribute::make(get: fn () => $date ? Carbon::parse($date)->toAtomString() : null);
    }

    protected function endDateUtc(): Attribute
    {
        $end = $this->end;
        return Attribute::make(get: fn () => $end ? Carbon::parse($end)->toAtomString() : null);
    }
}
