<?php

namespace App\Http\Requests\Api\V1;

use App\Traits\ApiForm;
use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'products' => ['required','array', 'min:1'],
            'products.*.product_id' => ['required','exists:products,id'],
            'products.*.quantity' => ['required','int', 'min:1'],
        ];
    }
}
