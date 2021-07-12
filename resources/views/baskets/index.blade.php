@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-muted text-left bold mt-5">My Basket</h2>

    @if($basket->basketItem()->count() > 0)
    <div class="row">

        <div class="col-lg-8">

            <?php
                $subTotal = 0;
                $total = 0;
                ?>

            @foreach ($basket->basketItem as $basketItem)
            <div class="row mb-4">
                <div class="col-lg-5">
                    <img class="basket-img mt-3"
                        src="{{ $basketItem->product->image ? asset($basketItem->product->image) : asset('assets/images/thumbnail.png') }}">
                </div>

                <form action="{{ route('baskets.update', $basketItem->id) }}" class="d-inline" method="post">
                    <div class="col">
                        <h4 class="mt-3"> {{ $basketItem->product->name }} </h4>
                        <div class="d-flex align-items-left mt-3">
                            <p class="ml-0 mt-2">Qty: </p>
                            <div class="form-group col-lg-5">
                                <input class="form-control border-text" name="quantity" type="number"
                                    min="{{ $basketItem->product->minimum }}" max="{{ $basketItem->product->maximum }}"
                                    value="{{ $basketItem->quantity }}">
                            </div>
                        </div>
                        <p class="text-dark mt-2">Price:
                            @if ($basketItem->product->hasDiscount())
                            <strike class="text-text font-weight-normal"> £{{ $basketItem->product->price }} </strike>
                            @endif
                            £{{ $basketItem->product->getPrice() }}
                        </p>
                        <div class="d-flex align-items-left mt-3">
                            @csrf
                            @method('PUT')
                            <button class="btn btn-info bold ml-0"> Update <i class="fas fa-sync-alt"></i> </button>
                </form>

                <form action="{{ route('baskets.destroy', $basketItem->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger bold ml-2">
                        Delete <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <?php
                    $subTotal += $basketItem->product->price * $basketItem->quantity;
                    $total += $basketItem->product->getPrice() * $basketItem->quantity;
                    ?>
    @endforeach

</div>

<div class="col-lg-4">
    <table class="table border mb-5 mt-4 mb-lg-0 mt-lg-0">
        <tbody class="bg-white border">
            <tr>
                <td colspan="2" class="text-muted bold">Order Summary</td>
            </tr>
            <tr class="text-muted">
                <td class="pl-4">
                    Sub Total
                </td>
                <td>
                    £{{ $subTotal }}
                </td>
            </tr>
            <tr class="text-muted">
                <td class="pl-4">
                    Discount
                </td>
                <td>
                    £{{ $subTotal - $total }}
                </td>
            </tr>
            <tr class="text-muted">
                <td class="pl-4 border- top border-text">
                    Total Payable
                </td>
                <td class="border- top border-text">
                    £{{ $total }}
                </td>
            </tr>
            <tr>
                <td colspan="100%" class="p-0 border-0">
                    <a href="{{ route('checkouts.index') }}" class="btn btn-primary btn-block">Proceed to Checkout</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
</div>
@else
<div class="bg-white p-4 border rounded mt-5 mb-4 text-center">
    <h4 class="mb-2">No Items in the Cart Yet</h4>
    <p class="text-text mb-0"><a href="{{ url('') }}">Explore</a> Products to add to cart</p>
</div>
@endif

<div class="text-center">
    <a href="{{ url('') }}" class="btn btn-secondary ml-auto mt-3 mb-4">Continue Shopping</a>
</div>
</div>
@endsection

@section('script')
{!! session('message') !!}
@if($errors->count()) {{!! toastr($errors->all()[0], '', 'error') !!} @endif
@endsection
