<?php


namespace Product\Http\Requests\Supplier;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => ['string', 'required','max:155', 'min:3'],
            'cost' => ['numeric', 'required'],
            'weight' => ['numeric', 'required'],
            'sizes' => ['required', 'string', 'regex:/\d+x\d+/'],
            'img' => ['nullable', 'file'],
            'description' => [],
        ];
    }
}
