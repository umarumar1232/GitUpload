@extends('layouts.custom')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">All Articles</h4>
                <a href="{{route('articles.create')}}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add Article</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="display" style="width:100%">
                        <thead class=" text-primary">
                            <th>
                                Title
                            </th>
                            <th>
                                Category
                            </th>
                            <th class="text-right">
                                Action
                            </th>
                        </thead>
                        <tbody>
                            @foreach ($articles as $article)
                            <tr>
                                <td>
                                    {{$article->title}}
                                </td>
                                <td>
                                    @if ($article->categories->count() == 0)
                                    No Category
                                    @else
                                    @foreach ($article->categories as $category)
                                    <span class="badge badge-pill badge-primary">{{$category->name}}</span>
                                    @endforeach
                                    @endif
                                </td>
                                <td class="text-right">
                                    <a href="{{route('articles.edit', $article->id)}}">
                                        <i class="fa-regular fa-pen-to-square text-warning"></i>
                                    </a>
                                    <form action="{{route('articles.destroy', $article->id)}}" class="d-inline " method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')" style="border:none; background: none;">
                                            <i class="fa-regular fa-trash-can text-danger"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    new DataTable('#example', {
        order: [
            [0, 'desc']
        ]
    });
</script>
@endsection