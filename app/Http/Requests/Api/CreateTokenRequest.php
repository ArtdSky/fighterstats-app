<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\ApiRequest;

class CreateTokenRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'token_name' => 'required|string',
        ];
    }
}
