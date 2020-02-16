<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactStoreRequest extends FormRequest
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
            'name' => 'required|string|min:2|max:50',
            'activity_type' => 'required|string|max:255',
            'contact_phone' => 'required|string|max:255',
            'contact_email' => 'required|string|email|max:255',
            'categories_ids' => ['array', 'present', 'required_if:category,null'],
            'categories_ids.*' => 'required|numeric|exists:categories,id',
            'photos_types' => ['array', 'required', 'min:0'],
            'category' => ['required_if:categories_ids,[]'],
            'photos_count' => 'required|numeric|min:1',
            'file_path' => 'nullable|file',
        ];
    }
}
