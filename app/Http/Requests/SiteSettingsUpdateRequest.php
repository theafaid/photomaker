<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiteSettingsUpdateRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'site_logo' => 'required|string|max:255',
            'site_description' => 'require|string|max:255',
            'site_profile_path' => 'nullable|file',
            'site_email' => 'required|email',
            'site_phone' => 'required|string',
            'site_facebook' => 'nullable|url',
            'site_twitter' => 'nullable|url',
            'site_google_plus' => 'nullable|url',
            'site_instagram' => 'nullable|url',
            'site_customers' => 'array|present',
            'site_customers.*.name' => 'required|string',
            'site.customers.*.logo' => 'required|image|mimes:jpg,jpeg,png',
        ];
    }
}
