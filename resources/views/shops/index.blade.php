@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">

        <div class="col-12 col-lg-3">

            <!-- Side Navigation -->
            @include('layouts.sidebar', ['allShop' => true])
            <!-- End of Side Navigation -->

        </div>

        <div class="col-12 col-md-9">
            <div class="w-lg-90 ml-auto table-responsive">

                {!! @session('message') !!}

                <table class="table table-bordered table-border-dark text-center">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>Shop&nbsp;#</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($shops as $shop)
                        <tr>
                            <td>{{ $shop->id }}</td>
                            <td>
                                <p class="ellipsis-2 mb-0">{{ $shop->name }}</p>
                            </td>
                            <td class="p-1">
                                <img class="table-type-img"
                                    src="{{ $shop->image ? asset($shop->image) : 'https://getuikit.com/v2/docs/images/placeholder_600x400.svg' }}"
                                    alt="{{ $shop->name }}">
                            </td>
                            <td>
                                @if($shop->status == 0) <span class="badge badge-pill badge-primary">Active</span>
                                @endif
                                @if($shop->status == 1) <span class="badge badge-pill badge-warning">Pending</span>
                                @endif
                                @if($shop->status == 2) <span class="badge badge-pill badge-danger">Deactivated</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex align-items-center justify-content-center">
                                    <a href="#" data-toggle="popover" data-trigger="hover" data-placement="top"
                                        data-content="View">
                                        <i class="far fa-eye link-dark"></i>
                                    </a>
                                    <a href="{{ route('shops.edit', $shop->id) }}" data-toggle="popover" data-trigger="hover" data-placement="top"
                                        data-content="Edit">
                                        <i class="far fa-edit link-dark mx-1"></i>
                                    </a>
                                    <form action="{{ route('shops.destroy', $shop->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete?')"
                                        class="d-inline">
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
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection('content')
