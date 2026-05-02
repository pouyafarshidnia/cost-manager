<?php

namespace App\Http\Requests\Cost;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCostRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'category_id'  => ['required', Rule::exists('categories', 'id')->where('user_id', $this->user()->id)],
            'title'        => ['required', 'max:255'],
            'price'        => ['required', 'numeric', 'min:1'],
            'spent_at'     => ['required', 'date'],
        ];
    }


    /**
     * Preperation data before validation
     */
    protected function prepareForValidation(): void
    {
        $this->merge(['user_id' => $this->user()->id]);
    }
}
