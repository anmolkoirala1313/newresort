<?php

namespace App\Http\Requests\Backend\Room;

use Illuminate\Foundation\Http\FormRequest;

class AmenityRequest extends FormRequest
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
            'title'        => 'required|string|max:191|unique:amenities,title,'.$this->amenity,
            'image_input'  => request()->method() == 'POST' ? 'required':'nullable'.'|image|mimes:jpeg,png,jpg',
        ];
    }

    public function messages()
    {
        return [
            'title.required'        => 'Please enter a title',
            'image_input.required'  => 'Please choose a image',
            ];
    }
}
