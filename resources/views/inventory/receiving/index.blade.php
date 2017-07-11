@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <br>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Product Supply
                        <div class="pull-right">
                            <a href="{{ url('inventory/receiving/create') }}" class="btn btn-primary btn-xs">Create</a>
                        </div>
                    </div>

                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Supplier</th>
                            <th>Items</th>
                            <th>No Items Supplied</th>
                            <th>Total Cost</th>
                            <th>Created</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($receivings as $key => $receiving)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ ($receiving->supplier) ? $receiving->supplier->name : 'SUP-'.$receiving->supplier_id }}</td>
                                <td>
                                    @foreach($receiving->items as $itemReceiving)
                                           <?php
                                               $item = \App\Item::find($itemReceiving['item_id']);
                                               $quantity = $itemReceiving['quantity'];
                                            ?>
                                          <p>{{$item->name}}({{$quantity}})</p>
                                    @endforeach</td>
                                <td>{{ $receiving->total_item }}</td>
                                <td>&#x20A6;{{ $receiving->total_amount }}</td>
                                <td>{{ $receiving->created_at->format('d F Y H:i') }}</td>
                            </tr>
                        @empty
                            @include('partials.table-blank-slate', ['colspan' => 5])
                        @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection