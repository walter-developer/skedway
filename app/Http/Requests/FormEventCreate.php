<?php

namespace App\Http\Requests;

use App\Enumerations\EnumTimezones;
use App\Models\Event;
use App\Http\Requests\WebFormRequest;
use \Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class FormEventCreate extends WebFormRequest
{

    public function prepareForValidation()
    {
        $timezone = $this->get('timezone', EnumTimezones::TMZ_578_UTC->value);
        $start = $this->get('start') ? parent::timestampToTimezoneUtc($this->get('start'), $timezone, $timezone) : null;
        $end = $this->get('end') ? parent::timestampToTimezoneUtc($this->get('end'), $timezone, $timezone) : null;
        $now = parent::timestampToTimezoneUtc(date('Y-m-d H:i:s'), EnumTimezones::TMZ_578_UTC->value, $timezone);
        $this->merge(['date_now' => $now, 'start' => $start,  'end' => $end,]);
    }

    public function rules()
    {
        return  [
            'title' => 'required|string|min:3|max:100',
            'timezone' => $this->timezone(),
            'start' => "required|date_format:Y-m-d H:i:s|after_or_equal:date_now",
            'end' => 'required|date_format:Y-m-d H:i:s|after_or_equal:start',
            'description' => 'required|string|min:3|max:500',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'título do evento',
            'timezone' => 'Timezone',
            'start' => 'data e hora de início do evento',
            'end' => 'data e hora final do evento',
            'description' => 'descrição do evento',
        ];
    }

    public function messages()
    {
        return [
            'start.after_or_equal' => 'O campo :attribute deve ser uma data posterior ou igual a data atual.',
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
