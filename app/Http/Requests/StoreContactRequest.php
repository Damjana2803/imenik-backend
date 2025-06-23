<?php

namespace App\Http\Requests;

use App\Contact;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreContactRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'ime' => 'required|string|max:255',
            'broj' => 'required|string|max:255',
            'email' => 'nullable|string|max:255',
            'tip_broja' => ['sometimes', Rule::in(Contact::TIPOVI_BROJA)],
            'beleske' => 'nullable|string|max:255',
        ];
    }
}
