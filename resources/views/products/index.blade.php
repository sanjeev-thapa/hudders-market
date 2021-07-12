@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">

        <div class="col-12 col-lg-3">

            <!-- Side Navigation -->
            @include('layouts.sidebar', ['allProduct' => true])
            <!-- End of Side Navigation -->

        </div>

        <div class="col-12 col-md-9">
            <div class="table-responsive">

                {!! session('message') !!}

                <table class="table table-bordered table-border-dark text-center">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>Product&nbsp;#</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Type</th>
                            <th>Discount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>
                                <p style="width:125px" class="ellipsis-2 mb-0">{{ $product->name }}</p>
                            </td>
                            <td class="p-1">
                                <img class="table-product-img"
                                    src="{{ $product->image ? asset($product->image) : asset('assets/images/thumbnail.png') }}"
                                    alt="{{ $product->name }}">
                            </td>
                            <td>£{{ $product->getPrice() }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>
                                <a class="font-weight-bold ellipsis-2" href="#">{{ $product->productType->name }}</a>
                            </td>
                            <td>{{ $product->discount->first() ? $product->discount->first()->name : '' }}</td>
                            <td>
                                @if($product->status == 0) <span class="badge badge-pill badge-primary">Active</span>
                                @endif
                                @if($product->status == 1) <span class="badge badge-pill badge-warning">Pending</span>
                                @endif
                                @if($product->status == 2) <span
                                    class="badge badge-pill badge-danger">Deactivated</span> @endif
                            </td>
                            <td>
                                <div class="d-flex align-items-center justify-content-center">
                                    <a href="#" data-toggle="popover" data-trigger="hover" data-placement="top"
                                        data-content="View">
                                        <i class="far fa-eye link-dark"></i>
                                    </a>
                                    <a href="{{ route('products.edit', $product->id) }}" data-toggle="popover"
                                        data-trigger="hover" data-placement="top" data-content="Edit">
                                        <i class="far fa-edit link-dark mx-1"></i>
                                    </a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="post"
                                        onsubmit="return confirm('Are you sure you want to delete?')" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn p-0 m-0" data-toggle="popover" data-trigger="hover"
                                            data-placement="top" data-content="Delete">
                                            <i class="far fa-trash-alt link-dark"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <td colspan="100%">
                            <h5 class="mb-1">No Product Yet</h5>
                            <p class="mb-3 text-text">Click the button below to add a product</p>
                            <a href="{{ route('products.create') }}" class="btn btn-primary">Add New Product</a>
                        </td>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection('content')
