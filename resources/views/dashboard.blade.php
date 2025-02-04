@extends('layouts.user')

@section('content')
<div class="container">
    <h1 class="mb-4">Beranda Tracer Study</h1>

    <div class="row">
        <!-- Kuliah Card -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fas fa-university text-primary"></i>
                        Kuliah
                    </h5>
                    <p class="card-text">Total Mahasiswa Lanjut Kuliah: <strong>20</strong></p>
                </div>
            </div>
        </div>

        <!-- Kerja Card -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fas fa-briefcase text-success"></i>
                        Kerja
                    </h5>
                    <p class="card-text">Total Alumni Bekerja: <strong>35</strong></p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Recent Activities -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Aktivitas Terbaru</h5>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <i class="fas fa-user-graduate text-danger"></i>
                                Alumni mendaftar kuliah
                            </div>
                            <small class="text-muted">2h yang lalu</small>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <i class="fas fa-building text-primary"></i>
                                Alumni mendapatkan pekerjaan
                            </div>
                            <small class="text-muted">5h yang lalu</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
