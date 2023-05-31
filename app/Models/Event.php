<?php

namespace App\Models;

use App\Models\Model;
use Carbon\Carbon;
use App\Enumerations\EnumTimezones;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Event extends Model
{

    public const TIMEZONES = EnumTimezones::TMZ_578_UTC;

    protected $table = 'events';

    protected $columns = [
        'id',
        'title',
        'description',
        'start',
        'end',
        'timezone',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'title',
        'description',
        'start',
        'end',
        'timezone',
    ];

    protected $appends = [
        'timezone_utc'
    ];

    protected function timezone(): Attribute
    {
        return Attribute::make(
            get: function ($timezone) {
                return EnumTimezones::enum($timezone)?->value;
            },
            set: function ($timezone) {
                return $timezone instanceof EnumTimezones ? $timezone?->value : EnumTimezones::enum($timezone)?->value;
            }
        );
    }

    protected function timezoneUtc(): Attribute
    {
        return Attribute::make(
            get: function () {
                $timezone = $this->getAttribute('timezone', EnumTimezones::TMZ_578_UTC?->value);
                return EnumTimezones::enum($timezone)?->timezone();
            },
            set: function ($timezone) {
                $this->setAttribute('timezone_utc', $timezone instanceof EnumTimezones ? $timezone?->timezone() : EnumTimezones::enum($timezone)?->timezone());
            }
        );
    }

    protected function start(): Attribute
    {
        return Attribute::make(
            get: function ($date) {
                return Carbon::parse($date)->setTimezone(EnumTimezones::TMZ_578_UTC->timezone())->format('Y-m-d H:i:s');
            },
            set: function ($date) {
                $enum = EnumTimezones::enum($this?->getAttributeRaw('timezone', EnumTimezones::TMZ_578_UTC->name)) ?: EnumTimezones::TMZ_578_UTC;
                return Carbon::createFromFormat('Y-m-d H:i:s', Carbon::parse($date), $enum->timezone())->setTimezone(EnumTimezones::TMZ_578_UTC->timezone())->format('Y-m-d H:i:s');
            }
        );
    }

    protected function end(): Attribute
    {
        return Attribute::make(
            get: function ($date) {
                return Carbon::parse($date)->setTimezone(EnumTimezones::TMZ_578_UTC->timezone())->format('Y-m-d H:i:s');
            },
            set: function ($date) {
                $enum = EnumTimezones::enum($this?->getAttributeRaw('timezone', EnumTimezones::TMZ_578_UTC->name)) ?: EnumTimezones::TMZ_578_UTC;
                return Carbon::createFromFormat('Y-m-d H:i:s', Carbon::parse($date), $enum->timezone())->setTimezone(EnumTimezones::TMZ_578_UTC->timezone())->format('Y-m-d H:i:s');
            }
        );
    }
}
