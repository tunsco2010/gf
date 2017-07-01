@extends('layouts.master')

@section('title')

    <title>{{ $supplier->company_name }} Supplier</title>

@endsection

@section('content')

    <ol class='breadcrumb'>
        <li><a href='/'>Home</a></li>
        <li><a href='/supplier'>Suppliers</a></li>
        <li><a href='/supplier/{{ $supplier->id }}'>{{ $supplier->company_name }}</a></li>
    </ol>

    <h1>{{ $supplier->company_name }}</h1>

    <hr/>

    <div class="panel panel-default">

        <!-- Table -->
        <table class="table table-striped">

            <thead>
            <tr>

                <th>Id</th>
                <th>Company Name</th>
                <th>Date Created</th>
                <th>Edit</th>
                <th>Delete</th>

            </tr>
            </thead>
            <tbody>

            <tr>
                <td>{{ $supplier->id }} </td>
                <td> <a href="/supplier/{{ $supplier->id }}/edit">
                        {{ $supplier->company_name }}</a></td>
                <td>{{ $supplier->created_at }}</td>

                <td> <a href="/supplier/{{ $supplier->id }}/edit">

                        <button type="button" class="btn btn-default">Edit</button></a></td>

                <td>

                    <div class="form-group">

                        <form class="form" role="form" method="POST" action="{{ url('/supplier/'. $supplier->id) }}">
                            <input type="hidden" name="_method" value="delete">
                            {{ csrf_field() }}

                            <input class="btn btn-danger" Onclick="return ConfirmDelete();" type="submit" value="Delete">

                        </form>
                    </div>
                </td>

            </tr>
            </tbody>

        </table>


    </div>

@endsection
@section('scripts')
    <script>
        function ConfirmDelete()
        {
            var x = confirm("Are you sure you want to delete?");
            if (x){

                return true;
            } else {

                return false;
            }

        }
    </script>
@endsection