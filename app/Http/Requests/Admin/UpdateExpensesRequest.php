<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateExpensesRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            
            'expense_category_id' => 'required',
            'entry_date' => 'required|date_format:'.config('app.date_format'),
            'amount' => 'required',
        ];
    }
}
