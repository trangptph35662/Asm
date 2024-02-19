@extends('layouts.master')

@section('title')
Post 
@endsection

@section('content')
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Title</th>
                    <th>excerpt</th>
                    <th>Image</th>
                    <th>Time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Title</th>
                    <th>excerpt</th>
                    <th>Image</th>
                    <th>time</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td> {{ $post['p_id'] }} </td>
                        <td> {{ $post['c_name'] }} </td>
                        <td> {{ $post['p_title'] }} </td>
                        <td> {{ $post['p_excerpt'] }} </td>
                        <td>
                            <img src="{{ $post['p_image'] }}" alt="" width="100px">
                        </td>
                        <td>{{$post['p_posttime']}}</td>
                        <td>
                            <a href="/admin/posts/{{ $post['p_id'] }}/update" class="btn btn-warning">Cập nhật</a>
                            <a href="/admin/posts/{{ $post['p_id'] }}/show" class="btn btn-info">Xem chi tiết</a>
                            <a href="/admin/posts/{{ $post['p_id'] }}/delete"
                                onclick="return confirm('Có chắc xóa không?')" class="btn btn-danger">Xóa</a>

                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection