@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">

        <div class="col-12 col-lg-3">

            <!-- Side Navigation -->
            @include('layouts.sidebar', ['allProductType' => true])
            <!-- End of Side Navigation -->

        </div>

        <div class="col-12 col-md-9">
            <div class="w-lg-90 ml-auto table-responsive">
                <table class="table table-bordered table-border-dark text-center">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>Type&nbsp;#</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Shop</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>
                                <p class="ellipsis-2 mb-0">Egg</p>
                            </td>
                            <td class="p-1">
                                <img class="table-type-img"
                                    src="https://getuikit.com/v2/docs/images/placeholder_600x400.svg" alt="Image">
                            </td>
                            <td style="min-width:150px">
                                <a href="#" class="font-weight-bold ellipsis-2">Egg, Fish and Meat</a>
                            </td>
                            <td><span class="badge badge-pill badge-warning">Pending</span></td>
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
                            <td>
                                <p class="ellipsis-2 mb-0">Meat</p>
                            </td>
                            <td class="p-1">
                                <img class="table-type-img"
                                    src="https://getuikit.com/v2/docs/images/placeholder_600x400.svg" alt="Image">
                            </td>
                            <td>
                                <a class="font-weight-bold" href="#">Egg, Meat and Fish</a>
                            </td>
                            <td><span class="badge badge-pill badge-primary">Approved</span></td>
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
                            <td>
                                <p class="ellipsis-2 mb-0">Sanitizer</p>
                            </td>
                            <td class="p-1">
                                <img class="table-type-img"
                                    src="https://getuikit.com/v2/docs/images/placeholder_600x400.svg" alt="Image">
                            </td>
                            <td>
                                <a class="font-weight-bold" href="#">Egg, Meat and Fish</a>
                            </td>
                            <td><span class="badge badge-pill badge-danger">Declined</span></td>
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
