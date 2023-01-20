<?php

namespace App\Http\Requests\Excursion;

use Illuminate\Foundation\Http\FormRequest;

class StoreScheduleRequest extends FormRequest
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
            'id' => ['required'],
            'schedule_time' => ['required'],
            'schedule_price' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'Id отсутствует',
            'schedule_time.required' => 'Укажите Время',
            'schedule_price.required' => 'Укажите Цену',
        ];
    }
}
