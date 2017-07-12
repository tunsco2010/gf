@extends('layouts.master')

@section('content')
    <ol class='breadcrumb'>
        <li><a href='/inventory/adjustment'>Inventories</a></li>
        <li class='active'>Adjustments</li>
    </ol>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Adjustments
                        <div class="pull-right">
                            <a href="{{ url('inventory/adjustment/create') }}" class="btn btn-primary btn-xs">Create</a>
                        </div>
                    </div>

                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>Adjusted Item</th>
                            <th>Created</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($adjustments as $key => $adjustment)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $adjustment->user->name }}</td>
                                <td>{{ $adjustment->total_item }}</td>
                                <td>{{ $adjustment->created_at->format('d F Y H:i') }}</td>
                            </tr>
                        @empty
                            @include('partials.table-blank-slate', ['colspan' => 4])
                        @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection