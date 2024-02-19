@extends('layouts.master')
@section('title')
Update post
@endsection

@section('content')

<div class="container">
    <h1> Người Dùng: {{ $post['p_title'] }}</h1>

    <div class="">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3 mt-3">
                <select name="categories_id" id="" class="form-control" required>
                    @foreach($categories as $category)
                    <option @if ($category['id'] == $post['category_id']) selected @endif value="{{ $category['id'] }}">
                        {{ $category['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 mt-3">
                <label for="title" class="form-label">title:</label>
                <input type="text" class="form-control" id="title" required placeholder="Enter title"
                    value="{{ $post['p_title'] }}" name="title">
            </div>
            <div class="mb-3 mt-3">
                <label for="excerpt" class="form-label">excerpt:</label>
                <input type="excerpt" class="form-control" id="excerpt" required placeholder="Enter excerpt"
                    value="{{ $post['p_excerpt'] }}" name="excerpt">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">content:</label>
                {{-- <input type="content" class="form-control" id="content" required placeholder="Enter content"
                    value="{{ $post['p_content'] }}" name="content"> --}}
                    <textarea name="content" id="" class="form-control" cols="30" rows="10">{{ $post['p_content'] }}</textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">image:</label>
                <input type="file" class="form-control" id="image" name="image">
                <img src="{{ $post['p_image'] }}" alt="" width="100px">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/admin/posts/" class="btn btn-danger">Danh sach</a>
        </form>
    </div>
</div>
@endsection