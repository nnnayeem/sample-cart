<?php

namespace App\Traits;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Response;

trait ApiForm
{
    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();

        $response = response()->json(Response::unprocessable($errors));

        throw new HttpResponseException($response);
    }
}
