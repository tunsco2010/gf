@extends('layouts.master')

@section('title')

    <title>Suppliers</title>

@endsection

@section('content')

    <ol class='breadcrumb'>
        <li><a href='/'>Home</a></li>
        <li class='active'>Suppliers</li>
    </ol>

    <h2>Suppliers</h2>

    <hr/>

    @if($suppliers->count() > 0)

        <table class="table table-hover table-bordered table-striped">

            <thead>
            <th>Id</th>
            <th>Company Name</th>
            <th>Date Created</th>
            </thead>

            <tbody>

            @foreach($suppliers as $supplier)

                <tr>
                    <td>{{ $supplier->id }}</td>
                    <td>
                        <a href="/supplier/{{ $supplier->id }}-{{ $supplier->slug }}">
                            {{ $supplier->company_name }}
                        </a>
                    </td>
                    <td>{{ $supplier->created_at }}</td>
                </tr>

            @endforeach

            </tbody>

        </table>

    @else

        Sorry, no Suppliers

    @endif

    {{ $suppliers->links() }}

    <div>
        <a href="/supplier/create">
            <button type="button"
                    class="btn btn-lg btn-primary">
                Create New
            </button>
        </a>
    </div>

@endsection