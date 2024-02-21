<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|min:5|max:225',
            'email' => 'required|max:225|email|unique:users,email,' . $this->id,
            'telp' => 'required|numeric|digits_between:11,12',
            'role' => 'required|in:Pengunjung,Admin,Penulis',
        ];
    }
}
