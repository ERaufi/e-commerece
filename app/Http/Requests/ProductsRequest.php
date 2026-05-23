<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:brands,id',
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:products,slug',
            'regular_price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0',
            'sku' => 'nullable|string|max:255',
            'stock_quantity' => 'nullable|integer|min:0',
            'stock_status' => 'required|string|in:instock,outofstock',
            'featured' => 'required|string|in:yes,no',
            'description' => 'nullable|string',
            'status' => 'required|string|in:draft,active,inactive',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,giv,webp|max:2048',
            'images' => 'nullable|array',
            'images.*' => 'image|image|mimes:jpeg,png,jpg,giv,webp|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'brand_id.required' => 'you forgot to select the brand',
            'category_id.required' => 'you forgot to select the category',
            'name.max' => 'you wront to many text inside the name'
        ];
    }
}
