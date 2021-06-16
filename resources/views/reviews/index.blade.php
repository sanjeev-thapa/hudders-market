@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">

        <div class="col-12 col-lg-3">

            <!-- Side Navigation -->
            @include('layouts.sidebar', ['myReview' => true])
            <!-- End of Side Navigation -->

        </div>

        <div class="col-12 col-md-9">
            <div class="w-lg-90 ml-auto table-responsive">
                <table class="table table-bordered table-border-dark text-center">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>S.N.</th>
                            <th>Product Name</th>
                            <th>Rating</th>
                            <th>Comment</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>2021/04/09</td>
                            <td>
                                <div style="width: 120px" class="text-warning text-center">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </td>
                            <td class="elipsis-2">Healthy Fruits</td>
                            <td>
                                <div class="d-flex align-items-center justify-content-center">
                                    <a href="#" data-toggle="popover" data-trigger="hover" data-placement="top"
                                        data-content="View">
                                        <i class="far fa-eye link-dark"></i>
                                    </a>
                                    <a href="#" data-toggle="popover" data-trigger="hover" data-placement="top"
                                        data-content="Edit">
                                        <i class="far fa-edit link-dark mx-1"></i>
                                    </a>
                                    <form action="#" onsubmit="return confirm('Are you sure you want to delete?')"
                                        class="d-inline">
                                        <button class="btn p-0 m-0" data-toggle="popover" data-trigger="hover"
                                            data-placement="top" data-content="Delete">
                                            <i class="far fa-trash-alt link-dark"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>2021/05/10</td>
                            <td>
                                <div class="text-warning text-center">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </td>
                            <td>This is exactly what I needed</td>
                            <td>
                                <div class="d-flex align-items-center justify-content-center">
                                    <a href="#" data-toggle="popover" data-trigger="hover" data-placement="top"
                                        data-content="View">
                                        <i class="far fa-eye link-dark"></i>
                                    </a>
                                    <a href="#" data-toggle="popover" data-trigger="hover" data-placement="top"
                                        data-content="Edit">
                                        <i class="far fa-edit link-dark mx-1"></i>
                                    </a>
                                    <form action="#" onsubmit="return confirm('Are you sure you want to delete?')"
                                        class="d-inline">
                                        <button class="btn p-0 m-0" data-toggle="popover" data-trigger="hover"
                                            data-placement="top" data-content="Delete">
                                            <i class="far fa-trash-alt link-dark"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>2021/06/15</td>
                            <td>
                                <div class="text-warning text-center">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                            </td>
                            <td>
                                <p style="width: 250px" class="ellipsis-2 mb-0">
                                    This is different product. It's not the same as shown on the picture.
                                </p>
                            </td>
                            <td>
                                <div class="d-flex align-items-center justify-content-center">
                                    <a href="#" data-toggle="popover" data-trigger="hover" data-placement="top"
                                        data-content="View">
                                        <i class="far fa-eye link-dark"></i>
                                    </a>
                                    <a href="#" data-toggle="popover" data-trigger="hover" data-placement="top"
                                        data-content="Edit">
                                        <i class="far fa-edit link-dark mx-1"></i>
                                    </a>
                                    <form action="#" onsubmit="return confirm('Are you sure you want to delete?')"
                                        class="d-inline">
                                        <button class="btn p-0 m-0" data-toggle="popover" data-trigger="hover"
                                            data-placement="top" data-content="Delete">
                                            <i class="far fa-trash-alt link-dark"></i>
                                        </button>
                                    </form>
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
