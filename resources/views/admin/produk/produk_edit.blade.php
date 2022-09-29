@extends('admin.admin_master')
@section('main')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="col-xl">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Edit Produk </h4>
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Edit Produk</h5>
                        <small class="text-muted float-end"></small>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('produk.update', $dataProduk->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                    <img id="showImage" src="{{ asset($dataProduk->produk_image) }}" alt="user-avatar"
                                        class="d-block rounded" height="150" width="150">
                                    <div class="button-wrapper">
                                        <h5 class=" mb-4">Upload image produk</h5>
                                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                            <span class="d-none d-sm-block">Upload new photo</span>
                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                            <input type="file" id="upload" class="account-file-input" hidden=""
                                                accept="image/png, image/jpeg" name="produk_image">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Nama</label>
                                <input type="text" class="form-control" id="basic-default-fullname" name="nama"
                                    value="{{ $dataProduk->nama }}" placeholder="{{ $dataProduk->nama }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-company">Harga</label>
                                <input type="text" class="form-control" id="basic-default-company" name="merk"
                                    value="{{ $dataProduk->merk }}" placeholder="{{ $dataProduk->merk }}">
                            </div>

                            <label class="form-label" for="basic-default-company">Merk</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Rp</span>
                                <input type="text" class="form-control" value="{{ $dataProduk->harga }}.000"
                                    placeholder="{{ $dataProduk->harga }}.000" aria-label="Amount (to the nearest dollar)"
                                    name="harga">
                                <span class="input-group-text">.00</span>
                            </div>
                            <a href="{{ route('produk.index') }}" class="btn btn-outline-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        @include('admin.body.footer')
        <!-- / Footer -->
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#upload').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
