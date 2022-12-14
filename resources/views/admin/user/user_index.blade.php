@extends('admin.admin_master')
@section('main')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> User </h4>
            <div class="col-md">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-1">
                            <img class="card-img card-img-left" src="{{ asset('backend/assets/img/elements/12.jpg') }}"
                                alt="Card image">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Nama Yang muncul saat ini</h5>
                                <p class="card-text">
                                    Alamat, No. Hp
                                </p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <h5 class="card-header">Tabel User</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="col-1">No</th>
                                <th class="col-5">Name</th>
                                <th class="col-4">Email</th>
                                <th class="col-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($dataUser as $key => $item)
                                <tr>
                                    <td>{{ $key + $dataUser->firstItem() }}</td>
                                    <td>{{ $item->firstname }} {{ $item->lastname }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('user.show', $item->id) }}"><i
                                                        class="bx bx-edit-alt me-1"></i>Show</a>
                                                <button class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#modalToggle{{ $item->id }}"><i
                                                        class="bx bx-trash me-1"></i>
                                                    Delete</button>
                                            </div>
                                        </div>
                                    </td>

                                    <!-- Initial Modal -->
                                    <form action="{{ route('user.destroy', $item->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <div class="modal fade" id="modalToggle{{ $item->id }}"
                                            aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalToggleLabel">Apakah anda yakin?</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        Anda akan menghapus user <span style="font-weight: 900">{{ $item->firstname }} {{ $item->lastname }}</span>  secara permanent!
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary"
                                                            data-bs-toggle="modal" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-danger"
                                                            data-bs-toggle="modal">Delete</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- End Initial Modal -->

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{ $dataUser->links('pagination::bootstrap-5') }}
        <!-- Footer -->
        @include('admin.body.footer')
        <!-- / Footer -->
    </div>
@endsection
