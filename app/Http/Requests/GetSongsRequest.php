<?php

namespace App\Http\Requests;

use App\Song;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GetSongsRequest extends FormRequest implements GetSongsRequestInterface
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
            'order_by' => 'nullable|in:name',
            'order_by_direction' => 'required_with:order_by|in:asc,desc',
            'limit' => 'nullable',
            'fields' => 'nullable|array',
            'fields.*' => [
                Rule::in(Song::VISIBLE_FIELDS)
            ],
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
     * @return string
     */
    public function getOrderBy(): string
    {
        return $this->input('order_by', 'id');
    }

    /**
     * @return string
     */
    public function getOrderByDirection(): string
    {
        return $this->input('order_by_direction', 'asc');
    }

    /**
     * @return array
     */
    public function getFields(): array
    {
        return $this->input('fields', Song::VISIBLE_FIELDS);
    }
}
