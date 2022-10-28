@extends('admin.layout.app')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Admin List</h3>

            <div class="card-tools">
                <form action="{{ route('admin#list') }}">
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
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Gender</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($userData as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->gender }}</td>
                            <td>
                                {{-- <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button> --}}
                                @if ($user->id != Auth::user()->id)
                                    <button class="btn btn-sm bg-danger text-white delBtn" data-id="{{ $user->id }}"><i class="fas fa-trash-alt"></i></button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection

@section('jsCode')
    <script>
        $(document).ready(function(){
            $('.delBtn').click(function(){
                let userId = $(this).data('id');

                $.ajax({
                    type: 'get',
                    url: 'http://127.0.0.1:8000/admin/account/delete',
                    data: {'userId' : userId},
                    dataType: 'json'
                });

                $(this).parents('tr').remove();
            });
        });
    </script>
@endsection
