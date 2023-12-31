@extends('layouts.custom')

@section('content')
<div class="container h-100" style="height: 100%;">
    <h1 class="mt-4">Add Category</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{route('categories.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Category</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="Enter the category">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection