@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Inventory</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-5"></div>
                        <div class="col-2">Total: {{$inventory->total()}}</div>
                        <div class="col-5">
                            <input
                                    type="text"
                                    name="filter"
                                    id="filter"
                                    placeholder="Sku or product id"
                                    value="{{ request()->get('query') }}"
                            />
                            <button class="btn btn-primary btn-sm" onclick="filter()">Filter</button>
                        </div>
                    </div>
                    @if ($inventory->total() === 0)
                        You have no inventory. Add some!
                    @else
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
                                    @php //dd($record->product) @endphp
                                    <td>{{$record->product->product_name}}</td>
                                    <td>{{$record->sku}}</td>
                                    <td>{{$record->quantity}}</td>
                                    <td>{{$record->color}}</td>
                                    <td>{{$record->size}}</td>
                                    <td>${{number_format($record->price_cents / 100, 2)}}</td>
                                    <td>${{number_format($record->cost_cents / 100, 2)}}</td>
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

@section('scripts')
<script>
    function filter()
    {

        let url = window.location;
        let search = document.getElementsByName("filter")[0].value;
        var queryParams = new URLSearchParams(window.location.search);

        if (search) {
            // Set new or modify existing parameter value.
            queryParams.set("query", search);
        } else {
            queryParams.delete('query');
        }
        // Go back to first page on a search
        queryParams.set("page", 1);

        // Replace current querystring with the new one.
        history.pushState(null, null, "?"+queryParams.toString());
        location.reload();
    }
</script>
@endsection