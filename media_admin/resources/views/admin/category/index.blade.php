@extends('admin.layout.app')

@section('content')
    <div class="col-md-3 col-sm-12 mt-5">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin#createCategory') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Category Name</label>
                        <input type="text" name="categoryName" class="form-control" placeholder="Category Name">
                        @error('categoryName')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <div class="form-floating">
                            <textarea name="categoryDesc" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                            <label for="floatingTextarea2">Enter Description</label>
                            @error('categoryDesc')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark">Create</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-9 col-sm-12 mt-5">
        @if (count($data) > 0)
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Category</h3>

                    <div class="card-tools">
                        <form action="{{ route('admin#category') }}">
                            @csrf
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="key" value="{{ request('key') }}" class="form-control float-right" placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap text-center">
                    <thead>
                    <tr>
                        <th>Category ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $cat)
                            <tr>
                                <td>{{ $cat->id }}</td>
                                <td>{{ $cat->title }}</td>
                                <td>{{ $cat->description }}</td>
                                <td>
                                    <a href="{{ route('admin#editCategoryPage',$cat->id) }}" class="text-decoration-none">
                                        <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>
                                    </a>
                                    <a href="{{ route('admin#deleteCategory',$cat->id) }}" class="text-decoration-none">
                                        <button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                <!-- /.card-body -->
            </div>
        @else
            <h3 class="text-center">No Category!</h3>
        @endif
        <!-- /.card -->
    </div>
@endsection
