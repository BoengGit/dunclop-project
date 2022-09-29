@extends('admin.admin_master')
@section('main')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="col-xl">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Create Produk </h4>
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Create Produk</h5>
                        <small class="text-muted float-end"></small>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Nama</label>
                                <input type="text" class="form-control" id="basic-default-fullname" name="nama"
                                    placeholder="Cat keras">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-company">Merk</label>
                                <input type="text" class="form-control" id="basic-default-company" name="merk"
                                    placeholder="Dunclop">
                            </div>

                            <label class="form-label" for="basic-default-company">Merk</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Rp</span>
                                <input type="text" class="form-control" placeholder="99.999"
                                    aria-label="Amount (to the nearest dollar)" name="harga">
                                <span class="input-group-text">.00</span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="formFileMultiple">Upload Image Produk</label>
                                <input class="form-control" type="file" id="formFileMultiple" multiple="" name="produk_image">
                            </div>
                            <button type="submit" class="btn btn-primary">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        @include('admin.body.footer')
        <!-- / Footer -->
    </div>
@endsection
