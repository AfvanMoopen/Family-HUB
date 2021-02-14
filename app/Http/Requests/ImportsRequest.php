<?php

namespace App\Http\Requests;

class ImportsRequest extends AuthorizedRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'vcard' => 'required|file|max:'.config('test.max_upload_size').'|mimes:vcf,vcard',
        ];
    }
}
