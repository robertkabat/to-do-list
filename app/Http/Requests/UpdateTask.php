<?php

namespace App\Http\Requests;

class UpdateTask extends ApiRequest
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
            'id' => 'required|exists:tasks,id',
            'content' => 'sometimes|string|max:500|mix:10',
            'completed' => 'sometimes|boolean'
        ];
    }
}
