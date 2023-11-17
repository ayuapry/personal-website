@extends('admin.adminLayout.app')

@section('title', 'Tambah Porto')

@section('content')
    <div class="pagetitle">
        <h1>Tambah Porto</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/admin/portfolio">Porto</a></li>
                <li class="breadcrumb-item active">Tambah Porto</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Porto</h5>

                        <!-- General Form Elements -->
                        <form action="/admin/portfolio" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Judul Portfolio</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('content_title') is-invalid @enderror"
                                        name="content_title">
                                </div>
                                @error('content_title')
                                    <div class="invalid-feedback">
                                        Judul Portfolio tidak boleh kosong
                                    </div>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Deskripsi Singkat</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control @error('content') is-invalid @enderror" style="height: 150px" name="content"></textarea>
                                </div>
                                @error('content')
                                    <div class="invalid-feedback">
                                        Deskripsi tidak boleh kosong
                                    </div>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">URL Portfolio</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('url') is-invalid @enderror"
                                        name="url">
                                </div>
                                @error('url')
                                    <div class="invalid-feedback">
                                        URL tidak boleh kosong
                                    </div>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="inputDate" class="col-sm-2 col-form-label">Tanggal</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                        name="tanggal">
                                </div>
                                @error('tanggal')
                                    <div class="invalid-feedback">
                                        Tanggal tidak boleh kosong
                                    </div>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">Gambar Porto</label>
                                <div class="col-sm-10">
                                    <input class="form-control @error('image') is-invalid @enderror" type="file"
                                        name="image">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Kategori Porto</label>
                                <div class="col-sm-10">
                                    <select class="form-select @error('portocategory_id') is-invalid @enderror"
                                        aria-label="Default select example" name="portocategory_id">
                                        <option selected>Pilih Category</option>
                                        @foreach ($porto_categories as $porto_category)
                                            <option value="{{ $porto_category->id }}">{{ $porto_category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Submit Button</label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Submit Form</button>
                                </div>
                            </div>
                        </form><!-- End General Form Elements -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
