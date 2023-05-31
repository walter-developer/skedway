<?php

namespace App\Http\Requests;

use App\Models\Event;
use App\Http\Requests\WebFormRequest;
use \Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class FormEventList extends WebFormRequest
{

    public function rules()
    {
        return  [
            'limit' => "required|numeric",
            'page' => "required|numeric",
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        if (parent::responseTypeJson()) {
            return throw new HttpResponseException(response()
                ->json($validator->errors(), 404)
                ->setStatusCode(404, 'Data failed validation.'));
        }
        return throw new HttpResponseException(redirect(route('calendar.calendar.get'))->withInput()
            ->withErrors($this->singleLevelArray($validator->errors()->all()))
            ->setStatusCode(303, 'Data invalid.'));
    }
}
