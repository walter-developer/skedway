<?php

namespace App\Http\Requests;

use App\Enumerations\EnumTimezones;
use App\Models\Event;
use App\Http\Requests\WebFormRequest;
use \Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\DB;

class FormEventUpdate extends WebFormRequest
{

    public function prepareForValidation()
    {
        $timezone = $this->get('timezone', EnumTimezones::TMZ_578_UTC->value);
        $start = $this->get('start') ? parent::timestampToTimezoneUtc($this->get('start'), $timezone, $timezone) : null;
        $end = $this->get('end') ? parent::timestampToTimezoneUtc($this->get('end'), $timezone, $timezone) : null;
        $this->merge(['start' => $start,  'end' => $end]);
    }

    public function rules()
    {
        return  [
            'id' => $this->id(),
            'title' => 'required|string|min:3|max:100',
            'timezone' => $this->timezone(),
            'start' => $this->start(),
            'end' => 'required|date_format:Y-m-d H:i:s|after_or_equal:start',
            'description' => 'required|string|min:3|max:500',
        ];
    }

    private function id()
    {
        $event = Event::class;
        return [
            'required',
            'numeric',
            "exists:$event,id",
            function ($attribute, $value, $fail) {
                $started = (new Event())
                    ->where('id', $value)
                    ->where('start', '<', DB::raw('CURRENT_TIMESTAMP()'))
                    ->first();
                return $started ? $fail("O forumlário contém um evento já inicializado,e não pode ser editado!") : true;
            },
            function ($attribute, $value, $fail) {
                $finalized = (new Event())
                    ->where('id', $value)
                    ->where('end', '<', DB::raw('CURRENT_TIMESTAMP()'))
                    ->first();
                return $finalized ? $fail("O forumlário contém um evento já finalizado, e não pode ser editado!") : true;
            }
        ];
    }

    private function start()
    {
        return [
            'required',
            'date_format:Y-m-d H:i:s',
        ];
    }

    public function messages()
    {
        return [
            'start.after_or_equal' => 'O campo :attribute deve ser uma data posterior ou igual a data atual.',
        ];
    }

    public function attributes()
    {
        return [
            'id' => 'identificador do evento',
            'title' => 'título do evento',
            'timezone' => 'Timezone',
            'start' => 'data e hora de início do evento',
            'end' => 'data e hora final do evento',
            'description' => 'descrição do evento',
        ];
    }

    private function timezone()
    {
        return [
            'required',
            'numeric',
            function ($attribute, $value, $fail) {
                $valid = in_array($value, array_column(Event::TIMEZONES->options(), 'id'));
                return empty($valid) ? $fail("O campo $attribute, contém um timezone inválido!") : true;
            }
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        if (parent::responseTypeJson()) {
            return throw new HttpResponseException(response()
                ->json($validator->errors(), 404)
                ->setStatusCode(404, 'Data failed validation.'));
        }
        return throw new HttpResponseException(redirect()->back()->withInput()
            ->withErrors($this->singleLevelArray($validator->errors()->all()))
            ->setStatusCode(303, 'Data invalid.'));
    }
}
