@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">

        <div class="col-12 col-lg-3">

            <!-- Side Navigation -->
            @include('layouts.sidebar', ['allDiscount' => true])
            <!-- End of Side Navigation -->

        </div>

        <div class="col-12 col-md-9">
            <div class="w-lg-90 ml-auto table-responsive">

                {!! session('message') !!}

                <table class="table table-bordered table-border-dark text-center">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>S.N.</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Amount</th>
                            <th>Expiry Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($discounts as $discount)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $discount->name }}</td>
                            <td>
                                @if($discount->type == 0) Fixed @endif
                                @if($discount->type == 1) Percentage @endif
                            </td>
                            <td>@if($discount->type == 0)£@endif{{ $discount->amount }}@if($discount->type == 1)%@endif</td>
                            <td>
                                @if ($discount->expiry_date == null)
                                Unlimited
                                @elseif($discount->expiry_date >= today())
                                {{ \Carbon\Carbon::parse($discount->expiry_date)->format('Y/m/d') }}
                                @else
                                Expired
                                @endif
                            </td>
                            <td>
                                <div class="d-flex align-items-center justify-content-center">
                                    <a href="{{ route('discounts.edit', $discount->id) }}" data-toggle="popover" data-trigger="hover" data-placement="top"
                                        data-content="Edit">
                                        <i class="far fa-edit link-dark mx-1"></i>
                                    </a>
                                    <form action="{{ route('discounts.destroy', $discount->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete?')"
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
                        @empty
                            <td colspan="100%">
                                <h5 class="mb-1">No Discount Yet</h5>
                                <p class="mb-3 text-text">Click the button below to add a discount</p>
                                <a href="{{ route('discounts.create') }}" class="btn btn-primary">Add New Discount</a>
                            </td>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection('content')
