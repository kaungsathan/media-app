@extends('admin.layout.app')

@section('content')
    <div class="col-md-3 col-sm-12 mt-5">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin#createPost') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Post Title</label>
                        <input type="text" name="postTitle" class="form-control" placeholder="Post Title">
                        @error('postTitle')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <div class="form-floating">
                            <textarea name="postDesc" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                            <label for="floatingTextarea2">Enter Description</label>
                            @error('postDesc')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" name="postImg" class="form-control">
                        @error('postImg')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Post Category</label>
                        <select name="postCategory" class="form-select">
                            <option value="">Choose Category</option>
                            @foreach ($category as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @endforeach
                        </select>
                        @error('postCategory')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-dark">Create</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-9 col-sm-12 mt-5">
        @if (count($post) > 0)
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Post</h3>

                    <div class="card-tools">
                        <form action="">
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
                        <th>Post ID</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($post as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>
                                    @if ($item->image)
                                        <img src="{{ asset('storage/'.$item->image) }}" width="180" height="110" alt="image">
                                    @else
                                        <img src="{{ asset('image/no-image.png') }}" width="180" height="110" alt="no-image">
                                    @endif
                                </td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->description }}</td>
                                <td>
                                    <a href="{{ route('admin#updatePostPage',$item->id) }}" class="text-decoration-none">
                                        <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>
                                    </a>
                                    <a href="{{ route('admin#deletePost',$item->id) }}" class="text-decoration-none">
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
            <h3 class="text-center">No Post!</h3>
        @endif
        <!-- /.card -->
    </div>
@endsection
