<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTimeEntriesRequest extends FormRequest
{
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
            
            'work_type_id' => 'required',
            'project_id' => 'required',
            'start_time' => 'required|date_format:'.config('app.date_format').' H:i:s',
            'end_time' => 'required|date_format:'.config('app.date_format').' H:i:s',
        ];
    }
}
