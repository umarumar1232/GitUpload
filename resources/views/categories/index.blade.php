@extends('layouts.custom')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">All Categories</h4>
                <a href="{{route('categories.create')}}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add Category</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="display" style="width:100%">
                        <thead class=" text-primary">
                            <th>
                                No
                            </th>
                            <th>
                                Name
                            </th>
                            <th class="text-right">
                                Action
                            </th>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>
                                    {{$loop->iteration}}
                                </td>
                                <td>
                                    {{$category->name}}
                                </td>
                                <td class="text-right">
                                    <a href="{{route('categories.edit', $category->id)}}">
                                        <i class="fa-regular fa-pen-to-square text-warning"></i>
                                    </a>
                                    <form action="{{route('categories.destroy', $category->id)}}" class="d-inline " method="post">
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
            [0, 'asc']
        ]
    });
</script>
@endsection