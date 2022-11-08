<?php

namespace App\Http\Requests;

class DeleteTask extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id' => 'required|exists:tasks,id'
        ];
    }
}
