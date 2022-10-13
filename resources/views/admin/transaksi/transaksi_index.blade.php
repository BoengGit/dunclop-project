@extends('admin.admin_master')
@section('main')
<div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Transaksi </h4>
            <a href="{{ route('transaksi.create') }}" class="btn btn-primary col-12 mb-3">Create Transaksi</a>
            <div class="card">
                <h5 class="card-header">Tabel Produk</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="col-1">No</th>
                                <th class="col-1">Antrian no</th>
                                <th class="col-1">Date</th>
                                <th class="col-1">User</th>
                                <th class="col-1">Kuantitas</th>
                                <th class="col-1">Nama Produk</th>
                                <th class="col-1">Status</th>
                                <th class="col-1">Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($transaksi as $key => $item)
                                <tr>
                                    {{-- <input type="hidden" class="serdelete_val_id" value="{{ $item->id }}"> --}}
                                    <td>{{ $key + $dataProduk->firstItem() }}</td>
                                    <td>{{ $item->nomor_antrian }}</td>
                                    <td>{{ $item->tanggal }}</td>
                                    <td>{{ $item->user_id }}</td>
                                    <td>{{ $item->kuantitas }}</td>
                                    <td>{{ $item->produk_id }}</td>
                                    <td>
                                        <span class="btn btn-warning">Pending</span>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <form action="{{ route('transaksi.destroy', $item->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                <button type="button" class="dropdown-item servicedeletebtn"
                                                    data-id="{{ $item->id }}" data-nama=""><i
                                                        class="bx bx-trash me-1"></i> Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{ $transaksi->links('pagination::bootstrap-5') }}
        <!-- Footer -->
        @include('admin.body.footer')
        <!-- / Footer -->

        <!-- SweetAlert -->
        <script>
            $(document).ready(function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('.servicedeletebtn').click(function(e) {
                    e.preventDefault();

                    var delete_id = $(this).closest("tr").find('.serdelete_val_id').val();
                    // alert(delete_id);

                    swal({
                            title: "Are you sure?",
                            text: "Kamu akan menghapus data produk dengan id ",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {

                                var data = {
                                    "_token": $('input[name="csrf-token"]').val(),
                                    "id": delete_id,
                                };
                                $.ajax({
                                    type: "DELETE",
                                    url: '/produk/'+delete_id,
                                    data: data,
                                    success: function(response) {
                                        swal(response.status, {
                                            icon: "success",
                                        })
                                        .then((result) => {
                                            location.reload();
                                        });
                                    }
                                });
                            }
                        });
                });
            })
        </script>
    </div>
@endsection
