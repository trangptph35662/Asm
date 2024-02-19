@extends('layouts.master')

@section('title')
Update-User
@endsection

@section('content')
<div class="container">
    <h1> Người Dùng: {{ $user['name'] }}</h1>

    <div class="row">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3 mt-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" required placeholder="Enter name"
                    value="{{ $user['name'] }}" name="name">
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" required placeholder="Enter email"
                    value="{{ $user['email'] }}" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" id="password" required placeholder="Enter password"
                    value="{{ $user['password'] }}" name="password">
            </div>
            <div class="mb-3">
                <label for="Avatar" class="form-label">Avatar:</label>
                <input type="file" class="form-control" id="avatar" name="avatar">
                <img src="{{ $user['avatar'] }}" alt="" width="100px">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/admin/users/" class="btn btn-danger">Danh sach</a>
        </form>
    </div>
</div>
@endsection