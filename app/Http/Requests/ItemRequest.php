<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
            'owner_name' => 'required|max:50|regex:/^[ا-یِ]+$/u',
            'item_code' => 'required|max:11|min:11|regex:/^09\d{9}$/|unique:items,item_code',
            'category' => 'required|in:telecom,id_number,digital_code',
            'type' => 'required|in:permanent,temporary',
            'price_suggestion' => 'required|numeric|min:10000',
            'location' => 'required|min:2|regex:/^[ا-یِ]+$/u',
        ];
    }
}
