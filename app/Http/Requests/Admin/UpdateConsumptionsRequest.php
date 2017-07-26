<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateConsumptionsRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            
            'user_id' => 'required',
            'quantity' => 'required',
            'date' => 'required|date_format:'.config('app.date_format'),
        ];
    }
}
