@extends('admin.adminLayout.app')

@section('title', 'Category Portfolio')

@section('content')
    <div class="pagetitle">
        <h1>Data Portfolio Category</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/admin/portocategory">Portfolio Category</a></li>
                <li class="breadcrumb-item active">Data Portfolio Category</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Portfolio Category</h5>
                        <a type="button" class="btn btn-primary m-2" href="/admin/portocategory/add"><i
                                class="bi bi-plus-square-fill"></i> Tambah Portfolio Category</a>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($portocategories as $portocategory)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $portocategory->name }}</td>
                                        <td><a href="/admin/portocategory/{{ $portocategory->id }}/edit"
                                                class="btn btn-warning"><i class="bi bi-pencil-fill text-white"></i></a>
                                            | <a href="/admin/portocategory/{{ $portocategory->id }}/delete"
                                                class="btn btn-danger"><i class="bi bi-trash3-fill text-white"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
