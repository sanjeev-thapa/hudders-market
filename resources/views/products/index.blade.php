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
                        <tr>
                            <td>1</td>
                            <td>
                                <p style="width:125px" class="ellipsis-2 mb-0">Farm Eggs - Table Tray, Medium,
                                    Antibiotic
                                    Residue-Free, 12 pcs</p>
                            </td>
                            <td class="p-1">
                                <img class="table-product-img"
                                    src="https://getuikit.com/v2/docs/images/placeholder_600x400.svg" alt="Image">
                            </td>
                            <td>£199.99</td>
                            <td>9999</td>
                            <td>
                                <a class="font-weight-bold" href="#">Meat</a>
                            </td>
                            <td>Festival</td>
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
                                <p class="ellipsis-2 mb-0">Fresh Potato Onion Tomato 1 kg Each</p>
                            </td>
                            <td class="p-1">
                                <img class="table-product-img"
                                    src="https://getuikit.com/v2/docs/images/placeholder_600x400.svg" alt="Image">
                            </td>
                            <td>£199.99</td>
                            <td>9999</td>
                            <td>
                                <a class="font-weight-bold" href="#">Meat</a>
                            </td>
                            <td>Festival</td>
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
                                <p class="ellipsis-2 mb-0">I sell anything I want</p>
                            </td>
                            <td class="p-1">
                                <img class="table-product-img"
                                    src="https://getuikit.com/v2/docs/images/placeholder_600x400.svg" alt="Image">
                            </td>
                            <td>£999.99</td>
                            <td>9999</td>
                            <td>
                                <a class="font-weight-bold" href="#">Meat</a>
                            </td>
                            <td>Anything</td>
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
