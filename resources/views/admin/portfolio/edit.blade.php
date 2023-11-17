@extends('admin.adminLayout.app')
@section('title', 'Edit Portfolio')

@section('content')
    <div class="pagetitle">
        <h1>Edit Portfolio</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/admin/portfolio">Portfolio</a></li>
                <li class="breadcrumb-item active">Edit Portfolio</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Portfolio</h5>

                        <!-- General Form Elements -->
                        <form action="/admin/portfolio/{{ $portfolio->id }}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Judul</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('content_title') is-invalid @enderror"
                                        name="content_title" value="{{ $portfolio->content_title }}">
                                </div>
                                @error('content_title')
                                    <div class="invalid-feedback">
                                        Judul tidak boleh kosong
                                    </div>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Content</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control @error('content') is-invalid @enderror" style="height: 100px" name="content">{{ $portfolio->content }}</textarea>
                                </div>
                                @error('content')
                                    <div class="invalid-feedback">
                                        Content tidak boleh kosong
                                    </div>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Judul</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('url') is-invalid @enderror"
                                        name="url" value="{{ $portfolio->url }}">
                                </div>
                                @error('url')
                                    <div class="invalid-feedback">
                                        Judul tidak boleh kosong
                                    </div>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">Thumbnail</label>
                                <div class="col-sm-10">
                                    <input class="form-control @error('image') is-invalid @enderror" type="file"
                                        name="image">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Kategori</label>
                                <div class="col-sm-10">
                                    <select class="form-select @error('portocategory_id') is-invalid @enderror"
                                        aria-label="Default select example" name="portocategory_id">
                                        @foreach ($porto_categories as $porto_category)
                                            <option value="{{ $porto_category->id }}"
                                                {{ old('portocategory_id', $portfolio->portocategory->id) == $porto_category->id ? 'selected' : '' }}>
                                                {{ $porto_category->name }}
                                            </option>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
