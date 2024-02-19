@extends('layouts.master')
@section('title')
Update-Category 
@endsection

@section('content')
<div class="container">
    <h1>Thêm mới Người Dùng</h1>

    <div class="row">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3 mt-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" required placeholder="Enter name"
                 value="{{$category['name']}}"   name="name">
            </div>
           
           
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
