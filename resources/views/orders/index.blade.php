@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">

        <div class="col-12 col-lg-3">

            <!-- Side Navigation -->
            @include('layouts.sidebar', ['myOrder' => true])
            <!-- End of Side Navigation -->

        </div>

        <div class="col-12 col-md-9">
            <div class="w-lg-90 ml-auto table-responsive">

                {!! session('message') !!}

                <table class="table table-bordered table-border-dark text-center">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>Order&nbsp;#</th>
                            <th>Date</th>
                            <th>Items</th>
                            <th>Collection Slot</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->payment->paid_date->format('Y/m/d') }}</td>
                            <td>
                                <a class="bold" href="{{ route('orders.invoice', $order->id) }}" target="_blank">
                                    {{ $order->product()->count() }}
                                </a>
                            </td>
                            <td>
                                {{ $order->collectionSlot->collection_date }}<br />
                                {{ $order->collectionSlot->day->day }}({{ $order->collectionSlot->time->start_time }}-{{ $order->collectionSlot->time->end_time }})
                            </td>
                            <td>£{{ number_format($order->payment->amount, 2, '.', ',') }}</td>
                            <td>
                                @if($order->status == 1)
                                <span class="badge badge-pill badge-dark">Paid</span>
                                @elseif($order->status == 2)
                                <span class="badge badge-pill badge-primary">Delivered</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex align-items-center justify-content-center">
                                    <a href="{{ route('orders.invoice', $order->id) }}" target="_blank"
                                        data-toggle="popover" data-trigger="hover" data-placement="top"
                                        data-content="Invoice">
                                        <i class="fas fa-receipt link-dark"></i>
                                    </a>
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
