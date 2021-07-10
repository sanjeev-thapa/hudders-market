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
                        <tr>
                            <td>1</td>
                            <td>2021/04/12</td>
                            <td><a class="bold" href="#">5</a></td>
                            <td>2021/04/19<br />Thursday(12-13)</td>
                            <td>£1999.99</td>
                            <td><span class="badge badge-pill badge-dark">Paid</span></td>
                            <td>
                                <div class="d-flex align-items-center justify-content-center">
                                    <a href="#" data-toggle="popover" data-trigger="hover" data-placement="top"
                                        data-content="View">
                                        <i class="fas fa-receipt link-dark"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>2021/05/05</td>
                            <td><a class="bold" href="#">5</a></td>
                            <td>2021/05/12<br />Wednesday(13-14)</td>
                            <td>£1999.99</td>
                            <td><span class="badge badge-pill badge-primary">Delivered</span></td>
                            <td>
                                <div class="d-flex align-items-center justify-content-center">
                                    <a href="#" data-toggle="popover" data-trigger="hover" data-placement="top"
                                        data-content="View">
                                        <i class="fas fa-receipt link-dark"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection('content')
