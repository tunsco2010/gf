<tr data-index="{{ $index }}">
    <td>{!! Form::text('vacines['.$index.'][name]', old('vacines['.$index.'][name]', isset($field) ? $field->name: ''), ['class' => 'form-control']) !!}</td>
<td>{!! Form::text('vacines['.$index.'][description]', old('vacines['.$index.'][description]', isset($field) ? $field->description: ''), ['class' => 'form-control']) !!}</td>

    <td>
        <a href="#" class="remove btn btn-xs btn-danger">@lang('quickadmin.qa_delete')</a>
    </td>
</tr>