@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Products</div>

                <div class="card-body">
                    @if (count($products) === 0)
                        You have no products. Add one!
                    @else
                        <table>
                            <tr>
                                <th>Name</th>
                                <th>Style</th>
                                <th>Brand</th>
                                <th>Skus</th>
                            </tr>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{$product->product_name}}</td>
                                    <td>{{$product->style}}</td>
                                    <td>{{$product->brand}}</td>
                                    <td>{{ implode(", ", $product->getSkus())}}</td>
                                </tr>
                            @endforeach
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
