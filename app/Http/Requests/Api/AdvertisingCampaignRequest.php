<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class AdvertisingCampaignRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'display_frequency' => ['required', 'regex:/[0-9]+\/[0-9]+/'],
            'country_ids' => 'required|min:1',
            'country_ids.*' => 'exists:countries,id',
            'browser_ids' => 'required|min:1',
            'browser_ids.*' => 'exists:browsers,id'
        ];
    }
}
