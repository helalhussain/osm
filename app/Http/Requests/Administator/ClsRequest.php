<?php

namespace App\Http\Requests\Administator;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Cls;
use Illuminate\Http\Request;

class ClsRequest extends FormRequest
{
    public function __constructor(){
        $one;
    }
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
            'title' => 'required',
            'description' => 'nullable'
        ];
    }

    public function store(): bool
    {
        $input = $this->validated();

        // $store = new Cls();
        // $store->title = $input['title'];
        // $store->description = $input['description'];
        // $store->save();
        Cls::create([
            'title' => $input['title'],
            'description' => $input['description']
        ]);
        
        return true;
    }

    public function update($class): bool
    {
        $input = $this->validated();

        $class->update([
            'title' => $input['title'],
            'description' => $input['description']
        ]);

        return true;
    }
}
