@extends('layouts.app')

@section('content')
@php //dd($inventory); @endphp
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Inventory</div>

                <div class="card-body">
                    @if ($inventory->total() === 0)
                        You have no inventory. Add some!
                    @else
                    <div class="row">
                        Total: {{$inventory->total()}}
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <th>Name</th>
                            <th>Sku</th>
                            <th>Quantity</th>
                            <th>Color</th>
                            <th>Size</th>
                            <th>Price</th>
                            <th>Cost</th>
                        </thead>
                        @foreach ($inventory as $record)
                            <tr>
                                @php //dd($record) @endphp
                                <td>{{$record->product->name}}</td>
                                <td>{{$record->sku}}</td>
                                <td>{{$record->quantity}}</td>
                                <td>{{$record->color}}</td>
                                <td>{{$record->size}}</td>
                                <td>{{$record->price_cents}}</td>
                                <td>{{$record->cost_cents}}</td>
                            </tr>
                        @endforeach
                    </table>

                    {{ $inventory->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
