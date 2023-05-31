<?php

namespace App\Http\Requests;

use DateTime, DateTimeZone;
use App\Enumerations\EnumTimezones;
use App\Support\Collection\Collection;
use Illuminate\Foundation\Http\FormRequest;
use \Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;



class WebFormRequest extends FormRequest
{

    public function collect($key = null): Collection
    {
        return new Collection(array_merge(parent::all(), parent::validated()));
    }

    public function valid(int|string $key = null, mixed $default = null): Collection
    {
        return new Collection(parent::validated($key, $default));
    }

    protected function formatDate(string $date, string $format = 'Y-m-d H:i:s')
    {
        if ($date && strlen($date)) {
            $datetime = (new DateTime($date));
            return $datetime->format($format);
        }
        return null;
    }

    protected function timestampToTimezoneUtc(string $date, int $currentTimezone, int $toTimezone, string $format = 'Y-m-d H:i:s')
    {
        if ($date && strlen($date)) {
            $datetime = (new DateTime($date, new DateTimeZone(EnumTimezones::enum($currentTimezone)->timezone())));
            $datetime = $datetime->setTimezone(new DateTimeZone(EnumTimezones::enum($toTimezone)->timezone()));
            return $datetime->format($format);
        }
        return null;
    }

    protected function responseTypeJson()
    {
        return strtolower($this->getHeader('Accept')) === 'application/json';
    }

    protected function failedValidation(Validator $validator)
    {
        if ($this->responseTypeJson()) {
            return throw new HttpResponseException(response()
                ->json($validator->errors(), 404)
                ->setStatusCode(404, 'Data failed validation.'));
        }
        return throw new HttpResponseException(redirect()->back()->withInput()
            ->withErrors($this->singleLevelArray($validator->errors()->all()))
            ->setStatusCode(303, 'Data invalid.'));
    }

    protected function failedAuthorization()
    {
        if ($this->responseTypeJson()) {
            return throw new HttpResponseException(response()
                ->json(['401' => 'O usuário não tem acesso ao este serviço.'], 404)
                ->setStatusCode(404, 'Data failed validation.'));
        }
        return throw new HttpResponseException(redirect(route('/'))->withInput()
            ->withErrors($this->singleLevelArray(['error' => 'Não autorizado, autentique-se!']))
            ->setStatusCode(303, '401 Unauthorized'));
    }

    public function getHeader(int|string $key, mixed $default = null): mixed
    {
        if ($this->headers->has($key)) {
            $value = $this->headers->get($key);
            if (is_array($value || is_object($value))) {
                return count((array)$value) ? $value : $default;
            }
            return strlen(strval($value)) ? $value : $default;
        }
        return $default;
    }

    protected function current(array $data = [])
    {
        $first = current($data);
        if (is_array($first)) {
            return $this->current($first);
        }
        return $first;
    }

    protected function singleLevelArray(array $data = [])
    {
        $singleLevelArray = [];
        array_walk_recursive($data, function ($value) use (&$singleLevelArray) {
            if (!empty($value) && !is_array($value)) {
                $singleLevelArray[] = $value;
            }
        });
        return array_filter($singleLevelArray);
    }
}
