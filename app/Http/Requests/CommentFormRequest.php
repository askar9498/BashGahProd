<?php

namespace App\Http\Requests;

use App\Enums\CommentEntities;
use App\Rules\CommentEntityExistence;
use Illuminate\Foundation\Http\FormRequest;

class CommentFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'body' => 'required',
            'parent_id' => 'nullable|exists:comments,id',
            'entity_type' => ['nullable', CommentEntities::validation()],
            'entity_id' => ['nullable'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @param $validator
     * @return void
     */
    public function withValidator($validator): void
    {
        $validator->sometimes('entity_type', 'nullable', function ($input) {
            if($input->entity_type)
                return new CommentEntityExistence($input->entity_id);
            return true;
        });

    }
}
