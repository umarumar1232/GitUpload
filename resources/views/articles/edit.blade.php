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
    <form action="{{route('articles.update', $article->id )}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input name="title" type="text" class="form-control" id="title" placeholder="Enter the article title" value="{{$article->title}}" required>
        </div>
        <div class="form-group">
            <label for="body">Content</label>
            <textarea id="editor" name="body" required>
            {{$article->body}}
            </textarea>
        </div>
        <div class="form-group">
            <label for="cover">Cover</label>
            @if (Storage::disk('public')->exists($article->cover) && $article->cover)
            <div class="mb-2">
                <img src="{{Storage::url($article->cover)}}" alt="" height="200">
            </div>                
            @else
            <div class="mb-2">
                <img src="https://via.placeholder.com/640x480.png/008888?text=No+Image" alt="" height="200">
            </div>
            @endif            
            <div class="input-group mb-3">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile01" name="cover" accept=".jpg, .jpeg, .png">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
            </div>
            <span class="text-muted">Min width: 780 px, min height: 500px. Max width: 1000px, max height: 600px. Max size: 2 MB</span>
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select name="category" id="category" class="form-control" required>
                @foreach ($categories as $category)
                <option value="{{$category->id}}" {{$category->id == $article->category_id ? 'selected' : ''}}>{{$category->name}}</option>
                @endforeach
            </select>
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