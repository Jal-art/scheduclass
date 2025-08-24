@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Jadwal</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Data Jadwal</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-calendar-plus mr-1"></i>
                        Tambah Data Jadwal
                    </h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-success btn-sm">
                            <i class="fas fa-file-excel"></i> EXPORT EXCEL
                        </button>
                        <button type="button" class="btn btn-primary btn-sm">
                            <i class="fas fa-file-import"></i> IMPORT EXCEL
                        </button>
                        <button type="button" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i> Drop
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>Show 
                                <select class="form-control form-control-sm d-inline-block" style="width: auto;">
                                    <option>10</option>
                                    <option>25</option>
                                    <option>50</option>
                                </select> entries
                            </label>
                        </div>
                        <div class="col-md-6">
                            <div class="float-right">
                                <label>Search: 
                                    <input type="search" class="form-control form-control-sm d-inline-block" style="width: auto;" placeholder="">
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No. <i class="fas fa-sort"></i></th>
                                    <th>Nama Kelas <i class="fas fa-sort"></i></th>
                                    <th>Lihat Jadwal <i class="fas fa-sort"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="3" class="text-center">No data available in table</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <p>Showing 0 to 0 of 0 entries</p>
                        </div>
                        <div class="col-md-6">
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-end mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#">Previous</a>
                                    </li>
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection