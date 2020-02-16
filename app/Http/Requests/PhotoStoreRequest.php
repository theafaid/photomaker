<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PhotoStoreRequest extends FormRequest
{
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
            'category_id' => ['required', 'numeric', Rule::exists('categories', 'id')->where(function ($query) {
                return $query->where('parent_id','!=',  null);
            })],
            'path' => 'required|image|mimes:jpg,jpeg,png',
        ];
    }
}
