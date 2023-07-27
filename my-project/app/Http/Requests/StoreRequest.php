<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
//    protected $redirect = 'admin/stores/edit';
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'          => 'required',
            'description'   => 'required|min:10',
            'phone'         => 'required',
            'mobile_phone'  => 'required',
            'logo'          => 'image'
        ];
    }

    public function messages()
    {
        return [
            'min' => ':attribute precisa de no mínimo :min caracters',
            'required' => 'O campo :attribute é obrigatório',
            'image' =>  'Arquivo não é uma imagem válida!'
        ];
    }
}
