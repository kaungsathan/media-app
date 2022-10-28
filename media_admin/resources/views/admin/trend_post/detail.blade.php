@extends('admin.layout.app')

@section('content')
    <div class="col-md-6 col-sm-12 mt-5 mx-auto">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin#updatePost',$post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Image</label>

                                @if ($post->image)
                                    <img src="{{ asset('storage/'.$post->image) }}" width="100%" alt="image">
                                @else
                                    <img src="{{ asset('image/no-image.png') }}" width="100%" alt="no-image">
                                @endif

                                <input type="file" name="postImg" class="form-control mt-3">
                                @error('postImg')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Post Title</label>
                                <input type="text" name="postTitle" value="{{ old('postTitle',$post->title) }}" class="form-control" placeholder="Post Title">
                                @error('postTitle')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <div class="form-floating">
                                    <textarea name="postDesc" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">{{ old('postDesc',$post->description) }}</textarea>
                                    <label for="floatingTextarea2">Enter Description</label>
                                    @error('postDesc')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>



                            <div class="mb-3">
                                <label class="form-label">Post Category</label>
                                <select name="postCategory" class="form-select">
                                    <option value="">Choose Category</option>
                                    @foreach ($category as $item)
                                        <option value="{{ $item->id }}" @if($item->id == $post->category_id) selected @endif>{{ $item->title }}</option>
                                    @endforeach
                                </select>
                                @error('postCategory')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
