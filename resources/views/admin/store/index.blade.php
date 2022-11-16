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
                            <div class="table-wrapper table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>
                                                <h6>Logo</h6>
                                            </th>
                                            <th>
                                                <h6>Name</h6>
                                            </th>
                                            <th>
                                                <h6>Status</h6>
                                            </th>
                                            <th>
                                                <h6>Actions</h6>
                                            </th>
                                        </tr>
                                        <!-- end table row-->
                                    </thead>
                                    <tbody>
                                        @foreach ($stores as $store)
                                            <tr>
                                                <td>
                                                    <div class="employee-image">
                                                        <img src="{{ asset( "storage/app/". $store->logo) }}"
                                                            alt="No image!" />
                                                    </div>
                                                </td>
                                                <td class="min-width">
                                                    <p>{{ $store->name }}</p>
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
                                                    <div class="action">
                                                        @if ($store->trashed())
                                                            <form action="{{ URL('admin/store/restore/' . $store->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <button class="text-danger" type="submit">
                                                                    <svg width="17px" height="20px"
                                                                        viewBox="-32 0 512 512"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill="green"
                                                                            d="M53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32zm70.11-175.8l89.38-94.26a15.41 15.41 0 0 1 22.62 0l89.38 94.26c10.08 10.62 2.94 28.8-11.32 28.8H256v112a16 16 0 0 1-16 16h-32a16 16 0 0 1-16-16V320h-57.37c-14.26 0-21.4-18.18-11.32-28.8zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z" />
                                                                    </svg>
                                                                </button>
                                                            </form>
                                                        @else
                                                            <form action="{{ URL('admin/store/destroy/' . $store->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <button class="text-danger" type="submit">
                                                                    <i class="lni lni-trash-can"></i>
                                                                </button>
                                                            </form>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div>
                                    {{ $stores->links() }}
                                </div>
                                <!-- end table -->
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
            </div>
        </section>
    </main>
@endsection
