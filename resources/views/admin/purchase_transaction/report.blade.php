@extends('layouts.admin.mainLayout')

@section('MainContent')
    <main class="main-wrapper">
        @include('includes.admin.html.header')

        <div class="title-wrapper pt-20 pl-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title mb-30">
                        <h2>Purchase Transactions Report</h2>
                    </div>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-style">
                            <h6 class="mb-10">Total purchases of each product</h6>
                            @if ($products->isNotEmpty())
                                <div class="table-wrapper table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <h6>Product ID</h6>
                                                </th>
                                                <th>
                                                    <h6>Product Name</h6>
                                                </th>
                                                <th>
                                                    <h6>Store Name</h6>
                                                </th>
                                                <th>
                                                    <h6>Total Purchases</h6>
                                                </th>
                                                <th>
                                                    <h6>Last Purchase</h6>
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
                                                    <td class="min-width">
                                                        <p>{{ $product->name }}</p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p>{{ $product->store_name }}</p>
                                                    </td>

                                                    <td class="min-width">
                                                        <p>${{ $product->total_purchases }}</p>
                                                    </td>
                                                    <td>
                                                        <p>{{ $product->last_purchase }}</p>
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
                                <h1>No Purchase Transactions added yet.</h1>
                            @endif
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
            </div>
        </section>
    </main>
@stop
