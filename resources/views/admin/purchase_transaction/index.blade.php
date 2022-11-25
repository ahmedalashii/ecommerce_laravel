@extends('layouts.admin.MainLayout')

@section('MainContent')
    <main class="main-wrapper">
        @include('includes.admin.html.header')

        <div class="title-wrapper pt-20 pl-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                <div class="title mb-30">
                        <h2>Purchase Transactions</h2>
                    </div>
                </div>
            </div>
        </div>
        
        <section class="section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-style">
                            <h6 class="mb-10">All Purchase Transactions</h6>
                            @if ($purchase_transactions->isNotEmpty())
                                <div class="table-wrapper table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <h6>#</h6>
                                                </th>
                                                <th>
                                                    <h6>Name</h6>
                                                </th>
                                                <th>
                                                    <h6>Store</h6>
                                                </th>
                                                <th>
                                                    <h6>Purchaser Name</h6>
                                                </th>
                                                <th>
                                                    <h6>Purchaser Address</h6>
                                                </th>
                                                <th>
                                                    <h6>Purchaser Phone</h6>
                                                </th>
                                                <th>
                                                    <h6>Purchaser Email</h6>
                                                </th>
                                                <th>
                                                    <h6>Purchase Price</h6>
                                                </th>
                                                <th>
                                                    <h6>Transaction Time</h6>
                                                </th>
                                            </tr>
                                            <!-- end table row-->
                                        </thead>
                                        <tbody>
                                            @foreach ($purchase_transactions as $purchase_transaction)
                                                <tr>
                                                    <td class="min-width">
                                                        <p>{{ $purchase_transaction->id }}</p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p>{{ $purchase_transaction->product->name }}</p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p style="color: #041d81">
                                                            {{ $purchase_transaction->product->store->name }}
                                                        </p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p>{{ $purchase_transaction->name }}</p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p>{{ $purchase_transaction->address }}</p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p>{{ $purchase_transaction->phone }}</p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p>{{ $purchase_transaction->email }}</p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p>{{ $site_settings->currency . $purchase_transaction->purchase_price }}</p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p>{{ $purchase_transaction->created_at }}</p>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center mt-5">
                                        {{ $purchase_transactions->links() }}
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
@endsection
