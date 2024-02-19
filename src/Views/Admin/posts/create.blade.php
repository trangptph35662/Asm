@extends('layouts.master')

@section('title')
New post
@endsection

@section('content')

<div class="container">
    <h1>Thêm mới Người Dùng</h1>

    <div class="row">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3 mt-3">
                <select name="categories_id" id="">
                    @foreach ($categories as $item)
                        <option value="{{$item['id']}}">{{$item['name']}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3 mt-3">
                <label for="title" class="form-label">title:</label>
                <input type="text" class="form-control" id="title" required placeholder="Enter title"
                    name="title">
            </div>
            <div class="mb-3 mt-3">
                <label for="excerpt" class="form-label">excerpt:</label>
                <input type="excerpt" class="form-control" id="excerpt" required placeholder="Enter excerpt"
                    name="excerpt">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">content:</label>
                <input type="content" class="form-control" id="content" required placeholder="Enter content"
                    name="content">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">image:</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection