@extends('layouts.mainLayout')

@section('MainContent')
    <main class="main-wrapper">
        @include('includes.html.header')

        <div class="title-wrapper pt-20 pl-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title mb-30">
                        <h2>Stores</h2>
                    </div>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-style">
                            <h6 class="mb-10">All Stores</h6>
                            @if ($stores->isNotEmpty())
                                <div class="table-wrapper table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <h6>#</h6>
                                                </th>
                                                <th>
                                                    <h6>Logo</h6>
                                                </th>
                                                <th>
                                                    <h6>Name</h6>
                                                </th>
                                                <th>
                                                    <h6>Address</h6>
                                                </th>
                                                <th>
                                                    <h6>Status</h6>
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
                                            @foreach ($stores as $store)
                                                <tr>
                                                    <td class="min-width">
                                                        <p>{{ $store->id }}</p>
                                                    </td>
                                                    <td>
                                                        <div class="employee-image">
                                                            <img src="{{ $store->logo_image }}" alt="No image!"
                                                                width="100%" height="100%" />
                                                        </div>
                                                    </td>
                                                    <td class="min-width">
                                                        <p>{{ $store->name }}</p>
                                                    </td>
                                                    <td class="min-width">
                                                        <p>{{ $store->address }}</p>
                                                    </td>
                                                    <td class="min-width">
                                                        <span
                                                            class="status-btn @if ($store->trashed()) close-btn @else active-btn @endif">
                                                            @if ($store->trashed())
                                                                Closed
                                                            @else
                                                                Active
                                                            @endif
                                                        </span>
                                                    </td>
                                                    <td>
                                                        @if ($store->trashed())
                                                            @csrf
                                                            <button class="main-btn light-btn rounded-full btn-hover"
                                                                style="width: 100px; padding: 11px; color: grey !important; cursor: not-allowed;"
                                                                disabled>
                                                                Edit
                                                            </button>
                                                        @else
                                                            <form action="{{ route('admin.store.edit', $store->id) }}"
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
                                                        @if ($store->trashed())
                                                            <form action="{{ route('admin.store.restore', $store->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <button class="main-btn success-btn rounded-full btn-hover"
                                                                    type="submit" style="width: 100px; padding: 11px;">
                                                                    Activate
                                                                </button>
                                                            </form>
                                                        @else
                                                            <form action="{{ route('admin.store.destroy', $store->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <button class="main-btn danger-btn rounded-full btn-hover"
                                                                    type="submit" style="width: 100px; padding: 11px;">
                                                                    Deactivate
                                                                </button>
                                                            </form>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <!-- end table -->
                                    <div class="d-flex justify-content-center mt-5">
                                        {{ $stores->links() }}
                                    </div>
                                </div>
                            @else
                                <p>
                                <h1>No Stores added yet.</h1>
                                <a href="{{ route('admin.store.add') }}">Click here to add a
                                    store.</a>
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
