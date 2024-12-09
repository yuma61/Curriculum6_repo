<?php

// PostRequest refers to a custom request class that is used to handle and validate incoming HTTP requests.
// It is used to centralize and organize the validation and authorization logic for a specific request.

// Laravelでは、FormRequestというフォームから入力した項目を便利に取り扱うことが可能なクラスが存在する。
// 機能の一つに、リクエストで受け取った値のバリエーションが含まれるので、それを利用。

// main purpose -> Validation

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'post.title' => 'required|string|max:100',
            'post.body' => 'required|string|max:4000',
        ];
    }
}




