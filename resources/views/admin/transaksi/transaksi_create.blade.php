@extends('admin.admin_master')
@section('main')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="col-xl">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Create Transaksi </h4>
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Create Transaksi</h5>
                        <small class="text-muted float-end"></small>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <label for="html5-date-input" class="col-md-2 col-form-label">Tanggal</label>
                            <div class="col-md-8">
                                <input class="form-control" name="tanggal" type="date" id="tanggal">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="html5-date-input" class="col-md-2 col-form-label">Nomor Antrian</label>
                            <div class="col-md-8">
                                <input class="form-control" name="nomor_antrian" type="text" id="nomor_antrian">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="html5-date-input" class="col-md-2 col-form-label">Nama User</label>
                            <div class="col-md-8">
                                <select class="form-select" id="user_id" name="user_id">
                                    {{-- <option selected="">Open this select menu</option> --}}
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->firstname }} {{ $user->lastname }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="html5-date-input" class="col-md-2 col-form-label">Nama Produk</label>
                            <div class="col-md-8">
                                <select class="form-select" id="produk_id"
                                    aria-label="Default select example" name="produk_id">
                                    {{-- <option selected="">Open this select menu</option> --}}
                                    @foreach ($produks as $produk)
                                        <option value="{{ $produk->id }}">{{ $produk->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-secondary me-md-2 addeventmore" type="submit">Add more</button>
                            {{-- <i class="btn btn-secondary me-md-2 addeventmore">Add More</i> --}}
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="" method="">
                            @csrf
                            <table class="table-sm table-bordered" width="100%" style="border-color: #ddd ;">
                                <thead>
                                    <tr>
                                        <th>Nama Produk</th>
                                        <th>PSC</th>
                                        <th>Harga Produk</th>
                                        <th>Deskripsi</th>
                                        <th>Total harga</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody id="addRow" class="addRow">

                                </tbody>

                                <tbody>
                                    <tr>
                                        <td colspan="4"></td>
                                        <td>
                                            <input type="text" name="estimated_amount" value="0"
                                                id="estimated_amount" class="form-control estimated_amount" readonly
                                                style="background-color: #ddd">
                                        </td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                        <button type="submit" class="btn btn-primary mt-4">Purchase Store</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        @include('admin.body.footer')
        <!-- / Footer -->
    </div>

    <script id="document-template" type="text/x-handlebars-template">
        <tr class="delete_add_more_item" id="delete_add_more_item">
            <input type="hidden" name="tanggal[]" value="@{{ tanggal }}">
            <input type="hidden" name="nomor_antrian[]" value="@{{ nomor_antrian }}">
            <input type="hidden" name="user_id[]" value="@{{ user_id }}">

            <td>
                <input type="hidden" name="produk_id[]" value="@{{ produk_id }}">
                @{{ nama_produk }}
            </td>
            <td>
                <input type="number" min="1" class="form-control kuantitas text-right" name="kuantitas[]" value="">
            </td>
            <td>
                <input type="number" class="form-control harga_produk text-right" name="harga_produk[]" value="">
            </td>
            <td>
                <input type="text" class="form-control" name="deskripsi[]">
            </td>
            <td>
                <input type="number" class="form-control total_harga text-right" name="total_harga[]" value="0" readonly>
            </td>

            <td>
                <i class="btn btn-danger btn-sm bx bxs-message-square-x removeeventmore"></i>
            </td>

        </tr>
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $(document).on("click",".addeventmore", function(){
                var tanggal = $('#tanggal').val();
                var nomor_antrian = $('#nomor_antrian').val();
                var user_id = $('#user_id').val();
                var produk_id = $('#produk_id').val();
                var nama_produk = $('#produk_id').find('option:selected').text();

                if (tanggal == "") {
                    $.notify("Mohon masukan tanggal", {globalPosition: 'bottom right', className:'error' })
                    return false;
                }
                if (nomor_antrian == "") {
                    $.notify("Mohon masukan nomor antrian", {globalPosition: 'bottom right', className:'error' })
                    return false;
                }
                if (user_id == "") {
                    $.notify("Mohon masukan user", {globalPosition: 'bottom right', className:'error' })
                    return false;
                }
                if (produk_id == "") {
                    $.notify("Mohon masukan produk", {globalPosition: 'bottom right', className:'error' })
                    return false;
                }

                var source = $("#document-template").html();
                var tamplate = Handlebars.compile(source);
                var data = {
                    tanggal:tanggal,
                    nomor_antrian:nomor_antrian,
                    user_id:user_id,
                    produk_id:produk_id,
                    nama_produk:nama_produk
                };

                var html = tamplate(data);
                $("#addRow").append(html);
            });

            $(document).on("click", ".removeeventmore", function(event){
                $(this).closest(".delete_add_more_item").remove();
                totalAmountPrice();
            });

            $(document).on('keyup click', '.harga_produk,.kuantitas', function(){
                var harga_produk = $(this).closest("tr").find("input.harga_produk").val();
                var kuantitas = $(this).closest("tr").find("input.kuantitas").val();
                var total = harga_produk * kuantitas;
                $(this).closest("tr").find("input.total_harga").val(total);
                totalAmountPrice();
            });

            // kalkulasi total

            function totalAmountPrice(){
                var sum = 0;
                $(".total_harga").each(function(){
                    var value = $(this).val();
                    if (!isNaN(value) && value.lenght != 0) {
                        sum += parseFloat(value);
                    }
                });
                $('#estimated_amount').val(sum);
            }

        });
    </script>

@endsection
