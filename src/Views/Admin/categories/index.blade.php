@extends('layouts.master')

@section('title')
    Category
@endsection

@section('content')
    <div class="container">

        <h1 class="h3 mb-2 text-gray-800">Tables</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td> {{ $category['id'] }} </td>
                                    <td> {{ $category['name'] }} </td>

                                    <td>
                                        <a href="/admin/categories/{{ $category['id'] }}/update" class="btn btn-warning">Cập
                                            nhật</a>
                                        <a href="/admin/categories/{{ $category['id'] }}/show" class="btn btn-info">Xem chi
                                            tiết</a>
                                        <a href="/admin/categories/{{ $category['id'] }}/delete"
                                            onclick="return confirm('Có chắc xóa không?')" class="btn btn-danger">Xóa</a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
@endsection
