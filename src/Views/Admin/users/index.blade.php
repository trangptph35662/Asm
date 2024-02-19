@extends('layouts.master')
@section('title')
User
@endsection

@section('content')
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Avatar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Avatar</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td> {{ $user['id'] }} </td>
                        <td> {{ $user['name'] }} </td>
                        <td> {{ $user['email'] }} </td>
                        <td> {{ $user['password'] }} </td>
                        <td>
                            <img src="{{ $user['avatar'] }}" alt="" width="100px">
                        </td>
                        <td>
                            <a href="/admin/users/{{ $user['id'] }}/update" class="btn btn-warning">Cập nhật</a>
                            <a href="/admin/users/{{ $user['id'] }}/show" class="btn btn-info">Xem chi tiết</a>
                            <a href="/admin/users/{{ $user['id'] }}/delete"
                                onclick="return confirm('Có chắc xóa không?')" class="btn btn-danger">Xóa</a>

                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection