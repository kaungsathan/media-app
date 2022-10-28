@extends('admin.layout.app')

@section('content')
    <div class="mt-5">
        <div class="card col-md-4 col-sm-12 mx-auto">
            <div class="card-body">
                <form action="{{ route('admin#updateCategory',$data->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Category Name</label>
                        <input type="text" name="categoryName" value="{{ old('categoryName',$data->title) }}" class="form-control" placeholder="Category Name">
                        @error('categoryName')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <div class="form-floating">
                            <textarea name="categoryDesc" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">{{ old('categoryDesc',$data->description) }}</textarea>
                            <label for="floatingTextarea2">Enter Description</label>
                            @error('categoryDesc')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
