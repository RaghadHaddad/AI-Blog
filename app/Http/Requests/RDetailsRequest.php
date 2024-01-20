<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RDetailsRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'resource_id'=>'required|exists:resources,id',
            'job'=>'required|string',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'publication_date'=>'required|string',
            'total_download'=>'required|integer',
            'download_formate'=>'required|string',
            'total_number'=>'required|string',
            'average_author_expertise'=>'required|string',
        ];
    }

}
