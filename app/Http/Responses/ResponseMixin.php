<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Response;

/**
 * @method Response::unauthenticated(string $message)
 **/
class ResponseMixin
{
    public function authenticated()
    {
        return function($token, $user)
        {
            return [
                'success' => true,
                'status' => 200,
                'message' => 'login success',
                'data' => [
                    'access_token' => $token,
                    'token_type' => 'Bearer',
                    'user' => $user
                ],

            ];
        };
    }

    public function unauthenticated()
    {
        return function($message = "login failure")
        {
            return [
                'success' => false,
                'status' => 401,
                'message' => $message,
                'data' => []
            ];
        };
    }

    public function success()
    {
        return function($message = "Successfully performed operation", $data = [])
        {
            return [
                'success' => true,
                'status' => 200,
                'message' => $message,
                'data' => $data
            ];
        };
    }


    public function fail()
    {
        return function($message = "Request Failed", $data = [])
        {
            return [
                'success' => false,
                'status' => 200,
                'message' => $message,
                'data' => $data
            ];
        };
    }

    public function unauthrorized()
    {
        return function($message = "You are unauthorized to perform this action")
        {
            return [
                'success' => false,
                'status' => 403,
                'message' => $message,
                'data' => []
            ];
        };
    }

    public function error(): \Closure
    {
        return function($code = 500, $err = "System error occurred")
        {
            return [
                'success' => false,
                'status' => $code,
                'errors' => [
                    'default' => config('app.debug')?(is_array($err)?$err:[$err]):"System error occurred"
                ],
                'data' => []
            ];
        };
    }

    public function notFound()
    {
        return function($err = "Unknown path requested")
        {
            $err = $err == ""?"Unknown path requested":$err;
            return [
                'success' => false,
                'status' => 404,
                'errors' => [
                    'default' => is_array($err)?$err:[$err]
                ],
                'data' => []
            ];
        };
    }

    public function unprocessable()
    {
        return function($errors = [], $message = "Unprocessable request")
        {
            return [
                'success' => false,
                'status' => 422,
                'message' => $message,
                'errors' => is_array($errors)?$errors:['default' => [$errors]],
                'data' => []
            ];
        };
    }
}
