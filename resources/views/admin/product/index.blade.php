@extends('layouts.mainLayout')

@section('MainContent')
    <main class="main-wrapper">
        @include('includes.html.header')

        <div class="title-wrapper pt-20 pl-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title mb-30">
                        <h2>Products</h2>
                    </div>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-style">
                            <h6 class="mb-10">All Products</h6>
                            @if ($products->isNotEmpty())
                                <div class="table-wrapper table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <h6>#</h6>
                                                </th>
                                                <th>
                                                    <h6>Picture</h6>
                                                </th>
                                                <th>
                                                    <h6>Name</h6>
                                                </th>
                                                {{-- <th>
                                                    <h6>Description</h6>
                                                </th> --}}
                                                <th>
                                                    <h6>Store</h6>
                                                </th>
                                                <th>
                                                    <h6>Status</h6>
                                                </th>
                                                <th>
                                                    <h6>Base Price</h6>
                                                </th>
                                                <th>
                                                    <h6>Discount Price</h6>
                                                </th>
                                                <th>
                                                    <h6>is discount allowed?</h6>
                                                </th>
                                                <th>
                                                    <h6>Edit</h6>
                                                </th>
                                                <th>
                                                    <h6>Delete</h6>
                                                </th>
                                            </tr>
                                            <!-- end table row-->
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $product)
                                                <tr>
                                                    <td class="min-width">
                                                        <p>{{ $product->id }}</p>
                                                    </td>
                                                    <td>
                                                        <div class="employee-image">
                                                            <img src="{{ $product->product_picture }}" alt="No image!"
                                                                width="100%" height="100%" />
                                                        </div>
                                                    </td>
                                                    <td class="min-width">
                                                        <p>{{ $product->name }}</p>
                                                    </td>
                                                    {{-- <td class="min-width">
                                                        <p>{{ substr($product->description, 0, 20) }}...</p>
                                                    </td> --}}
                                                    <td class="min-width">
                                                        <p style="color: #041d81">{{ $product->store->name }}</p>
                                                    </td>
                                                    <td class="min-width">
                                                        <span
                                                            class="status-btn @if ($product->trashed()) close-btn @else active-btn @endif">
                                                            @if ($product->trashed())
                                                                Not In Stock
                                                            @else
                                                                Available
                                                            @endif
                                                        </span>
                                                    </td>
                                                    <td class="min-width">
                                                        <p>${{ $product->base_price }}</p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p>${{ $product->discount_price }}</p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p>
                                                            @if ($product->is_discount ?? false)
                                                                Yes <b style="color: #219653;">&#10003;</b>
                                                            @else
                                                                No <b style="color: #d50100;">&#x2717;</b>
                                                            @endif
                                                        </p>
                                                    </td>
                                                    <td>
                                                        @if ($product->trashed())
                                                            @csrf
                                                            <button class="main-btn light-btn rounded-full btn-hover"
                                                                style="width: 100px; padding: 11px; color: grey !important; cursor: not-allowed;"
                                                                disabled>
                                                                Edit
                                                            </button>
                                                        @else
                                                            <form action="{{ route('admin.product.edit', $product->id) }}"
                                                                method="GET">
                                                                @csrf
                                                                <button class="main-btn dark-btn rounded-full btn-hover"
                                                                    type="submit" style="width: 100px; padding: 11px;">
                                                                    Edit
                                                                </button>
                                                            </form>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($product->trashed())
                                                            <form
                                                                action="{{ route('admin.product.restore', $product->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <button class="main-btn success-btn rounded-full btn-hover"
                                                                    type="submit" style="width: 100px; padding: 11px;">
                                                                    Activate
                                                                </button>
                                                            </form>
                                                        @else
                                                            <form
                                                                action="{{ route('admin.product.destroy', $product->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <button class="main-btn danger-btn rounded-full btn-hover"
                                                                    type="submit" style="width: 100px; padding: 11px;"
                                                                    id="deactivateForm">
                                                                    Deactivate
                                                                </button>
                                                            </form>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center mt-5">
                                        {{ $products->links() }}
                                    </div>
                                    <!-- end table -->
                                </div>
                            @else
                                <p>
                                <h1>No Products added yet.</h1>
                                <a href="{{ route('admin.product.add') }}">Click here to add a
                                    product.</a>
                                </p>
                            @endif
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
            </div>
        </section>
    </main>
@endsection
