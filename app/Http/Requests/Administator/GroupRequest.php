<?php

namespace App\Http\Requests\Administator;

use Illuminate\Foundation\Http\FormRequest;

class GroupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'class_id' => 'required',
            'title' => 'required',
            'description' => 'nullable'
        ];
    }

    public function store(): bool
    {
        $input = $this->validated();

        Group::create([
            'class_id' => $input['class_id'],
            'title' => $input['title'],
            'description' => $input['description']
        ]);

        return true;
    }

    public function update($group): bool
    {
        $input = $this->validated();

        $group->update([
            'class_id' => $input['class_id'],
            'title' => $input['title'],
            'description' => $input['description']
        ]);

        return true;
    }
}
