@extends('admin.admin_master')
@section('main')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-lg-12 mb-4 order-0">
                    <div class="card">
                        <div class="d-flex align-items-end row">
                            <div class="col-sm-7">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">Selamat Datang Bajang! 🎉</h5>
                                    <p class="mb-4">
                                        Silahkan cek perubahan terbarumu!
                                    </p>
                                    <a href="javascript:;" class="btn btn-sm btn-outline-primary">Lihat Perubahan</a>
                                </div>
                            </div>
                            <div class="col-sm-5 text-center text-sm-left">
                                <div class="card-body pb-0 px-0 px-md-4">
                                    <img src="{{ asset('backend/assets/img/illustrations/man-with-laptop-light.png') }}" height="140"
                                        alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                        data-app-light-img="illustrations/man-with-laptop-light.png" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Content -->

        <!-- Footer -->
        @include('admin.body.footer')
        <!-- / Footer -->

        <div class="content-backdrop fade"></div>
    </div>
@endsection
