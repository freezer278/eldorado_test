<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetSongsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'order_by' => 'nullable|in:name',
            'order_by_direction' => 'required_with:order_by|in:asc,desc',
            'limit' => 'nullable',
        ];
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->input('limit', 30);
    }

    /**
     * @return int
     */
    public function getOrderBy(): string
    {
        return $this->input('order_by', 'id');
    }

    /**
     * @return int
     */
    public function getOrderByDirection(): string
    {
        return $this->input('order_by_direction', 'asc');
    }
}
