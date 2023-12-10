<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
class UpdateProductRequest extends FormRequest
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
        $method = $this->method();
        if($method == 'PUT'){
            return [
                'name' => ['required'],
                'image' => ['required', File::image()
                                    ->min(1024)
                                    ->max(12 * 1024)
                                    ->dimensions(Rule::dimensions()->maxWidth(1000)->maxHeight(500))],
                'price' => ['required','numeric'],
                'desc' => ['required'],
                'quantity' => ['required','numeric']
            ];
        }else{
            return [
                'name' => ['sometimes','required'],
                'image' => ['sometimes','required', File::image()
                                    ->dimensions(Rule::dimensions()->maxWidth(2000)->maxHeight(1500))],
                'price' => ['sometimes','required','numeric'],
                'desc' => ['sometimes','required'],
                'quantity' => ['sometimes','required','numeric']
            ];
        }
    }
}
