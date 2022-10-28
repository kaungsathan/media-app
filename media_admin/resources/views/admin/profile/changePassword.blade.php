@extends('admin.layout.app')

@section('content')
    <div class="col-md-8 offset-md-3 mt-5">
        <div class="col-md-9">
        <div class="card">
            <div class="card-header p-2">
            <legend class="text-center">Change Password</legend>
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
                    <form action="{{ route('admin#changePassword') }}" method="POST" class="form-horizontal">
                        @csrf
                        <div class="form-group row">
                            <label for="inputName" class="col-xl-3 col-lg-12 col-form-label">Password</label>
                            <div class="col-md-8 col-sm-12 col-12">
                                <input type="text" name="password" class="form-control"  id="inputName" placeholder="Password">
                                @error('password')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                                @if (session('passwordCheck'))
                                    <div class="text-danger">{{ session('passwordCheck') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="inputEmail" class="col-xl-3 col-lg-12 col-form-label">New Password</label>
                        <div class="col-md-8 col-sm-12 col-12">
                            <input type="password" name="newPassword" class="form-control" id="inputEmail" placeholder="New Password">
                            @error('newPassword')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputName" class="col-xl-3 col-lg-12 col-form-label">Confirm Password</label>
                            <div class="col-md-8 col-sm-12 col-12">
                                <input type="password" name="confirmPassword" class="form-control" placeholder="Confirm Password">
                                @error('confirmPassword')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <div class="offset-xl-3 col-md-8">
                                <button type="submit" class="btn bg-dark text-white">Update</button>
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
