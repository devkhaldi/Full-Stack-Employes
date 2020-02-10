<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeRequest extends FormRequest
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
            'firstName' => 'required|min:1|max:191',
            'lastName' => 'required|min:1|max:191',
            'email' => 'email:rfc,dns',
            'job_id' => 'required|integer|min:0',
            'departement_id' => 'required|integer|min:0',
            'paginate' => 'integer|min:1'
        ];
    }
}
