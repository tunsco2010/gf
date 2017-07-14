@extends('layouts.master')

@section('title')

    <title>Feeds</title>

@endsection


@section('content')
    <h3 class="page-title">Feeds</h3>

    <p>
        <a href="" class="btn btn-success">Add New</a>

    </p>


    <div class="panel panel-default">
        <div class="panel-heading">
            List
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped  dt-select ">
                <thead>
                    <tr>

                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>


                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Date</th>
                        <th>Description</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @if (count($feeds) > 0)
                        @foreach ($feeds as $feed)
                            <tr data-entry-id="{{ $feed->id }}">

                                <td></td>
                                <td>{{ $feed->name }}</td>
                                <td>{{ $feed->quantity }}</td>
                                <td>{{ $feed->date }}</td>
                                <td>{{ $feed->description }}</td>
                                <td>

                                    <a href="{{ route('health/feeds.show',[$feed->id]) }}" class="btn btn-xs btn-primary">view</a>


                                    <a href="{{ route('health/feeds.edit',[$feed->id]) }}" class="btn btn-xs btn-info">edit</a>

                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("Are you sure?")."');",
                                        'route' => ['health/feeds.destroy', $feed->id])) !!}
                                    {!! Form::submit(trans('delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}

                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8">No Result found</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('feeds.mass_destroy') }}';
    </script>
@endsection