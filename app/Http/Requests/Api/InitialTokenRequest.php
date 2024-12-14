<?php

namespace App\Http\Requests\Api;


use App\Http\Requests\ApiRequest;

class InitialTokenRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ];
    }
}
