<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVacinesRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            
            'name' => 'required',
            'category_id' => 'required',
            'interval' => 'required',
            'last_vacine_date' => 'date_format:'.config('app.date_format'),
            'next_vacine_date' => 'date_format:'.config('app.date_format'),
        ];
    }
}
