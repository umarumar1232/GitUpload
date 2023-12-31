@extends('layouts.custom')

@section('style')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <h1 class="mt-4">Edit Article</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{route('categories.update', $category->id )}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Title</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="Enter the Category" value="{{$category->name}}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection

@section('script')
<!-- Include the Quill library -->
<script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>


<!-- Initialize Quill editor -->
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection