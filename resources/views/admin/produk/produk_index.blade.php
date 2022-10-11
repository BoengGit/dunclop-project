@extends('admin.admin_master')
@section('main')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Produk </h4>
            <a href="{{ route('produk.create') }}" class="btn btn-primary col-12 mb-3">Create Produk</a>
            <div class="card">
                <h5 class="card-header">Tabel Produk</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="col-2">No</th>
                                <th class="col-3">Name</th>
                                <th class="col-2">Merk</th>
                                <th class="col-2">Image</th>
                                <th class="col-3">Harga</th>
                                <th class="col-2">Status</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($dataProduk as $key => $item)
                                <tr>
                                    <input type="hidden" class="serdelete_val_id" value="{{ $item->id }}">
                                    <td>{{ $key + $dataProduk->firstItem() }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->merk }}</td>
                                    <td> <img src="{{ asset($item->produk_image) }}" style="width:100px; height:90px">
                                    </td>
                                    <td>Rp {{ $item->harga }},000</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('produk.edit', $item->id) }}"><i
                                                        class="bx bx-edit-alt me-1"></i>Edit</a>
                                                {{-- <form action="{{ route('produk.destroy', $item->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf --}}
                                                <button type="button" class="dropdown-item servicedeletebtn"
                                                    data-id="{{ $item->id }}" data-nama=""><i
                                                        class="bx bx-trash me-1"></i> Delete</button>
                                                {{-- </form> --}}
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
        {{ $dataProduk->links('pagination::bootstrap-5') }}
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
