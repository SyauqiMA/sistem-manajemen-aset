<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // True for now
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'userLevel' => ['required',
                            Rule::in('1', '2', '3', '4')],
            'namaLengkap' => ['required',
                             'max:50'],
            'departemen' => ['required',
                             Rule::in('1', '2')],
            'username' => ['required',
                           'unique:user,username',
                           'max:15',
                           'alpha_dash'],
            'password' => ['required',
                           'min:8'],
            'repeatPassword' => ['required',
                                 'same:password']
        ];
    }
 
    public function messages(): array
    {
        return [
            'userlevel.required' => "Level user belum diisi",
            'userlevel.in' => "Level user tidak valid",
            'namaLengkap.required' => "Nama lengkap belum diisi",
            'namaLengkap.max' => "Nama lengkap tidak boeh lebih dari :max karakter",
            'departemen.required' => "Departemen belum diisi",
            'departemen.in' => "Departemen tidak valid",
            'username.required' => "Username belum diisi",
            'username.unique' => "Username sudah terpakai",
            'username.max' => "Username tidak boleh lebih dari :max karakter",
            'username.alpha_dash' => "Username hanya boleh terdiri dari karakter alfanumerik, tanda hubung (-) dan garis bawah (_)",
            'password.required' => "Password belum diisi",
            'password.min' => "Password harus minimal :min karakter",
            'repeatPassword.required' => "Ulangi Password belum diisi",
            'repeatPassword.same' => "Ulangi Password tidak sama dangan Password"
        ];
    }
}
