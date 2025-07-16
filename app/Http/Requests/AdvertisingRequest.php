<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdvertisingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:50|regex:/^[ا-یِ]+$/u',
            'category_advertising_id' => 'required|min:1|max:100000000|regex:/^[0-9]+$/u|exists:category_advertisings,id',
            'user_id' => 'required|min:1|max:100000000|regex:/^[0-9]+$/u|exists:users,id',
            'type' => 'required|in:instant,offer',
            'status' => 'required|numeric|in:0,1',
            'description' => 'required|min:2',
        ];
    }
}
