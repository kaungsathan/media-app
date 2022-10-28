@extends('admin.layout.app')

@section('content')
    <div class="col-8 offset-3 mt-5">
        <div class="col-md-9">
        <div class="card">
            <div class="card-header p-2">
            <legend class="text-center">User Profile</legend>
            </div>
            <div class="card-body">
            <div class="tab-content">
                <div class="active tab-pane" id="activity">
                    {{-- alert --}}
                    @if (session('process'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('process') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    {{-- alert --}}
                    <form action="{{ route('admin#updateAcc') }}" method="POST" class="form-horizontal">
                        @csrf
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" value="{{ old('name',$user->name) }}" id="inputName" placeholder="Name...">
                                @error('name')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>


                        </div>
                        <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" class="form-control" value="{{ old('emial',$user->email) }}" id="inputEmail" placeholder="Email">
                            @error('email')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Gender</label>
                            <div class="col-sm-10">
                                <select name="gender" class="form-control">
                                    <option value="" @if($user->gender == '') selected @endif>Choose gender</option>
                                    <option value="male" @if($user->gender == 'male') selected @endif>Male</option>
                                    <option value="female" @if($user->gender == 'female') selected @endif>Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Phone</label>
                            <div class="col-sm-10">
                                <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" id="inputName" placeholder="09...">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <textarea name="address" class="form-control" cols="30" rows="10" placeholder="Enter address">{{ $user->address }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                                <button type="submit" class="btn bg-dark text-white">Submit</button>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                                <a href="{{ route('admin#password') }}" class="text-decoration-none">Change Password</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
@endsection
