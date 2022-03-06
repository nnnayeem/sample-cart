<?php

namespace App\Http\Requests\Auth;

use App\Enums\UserStatus;
use App\Enums\UserType;
use App\Traits\ApiForm;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserRegister extends FormRequest
{
    use ApiForm;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max: 255'],
            'email' => ['required', 'email', 'max: 255'],
            'password' => ['required', 'confirmed', Password::min(8)->symbols()],
        ];
    }

    public function prepareForValidation()
    {
        $this->merge(
            [
                'type' => UserType::cus(),
                'status' => UserStatus::actv()
            ]
        );
    }


}
