@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-5">
                    <h1 class="m-0">Account</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <!-- /.content -->
        <div class="container-fluid">
            <!-- /.row -->
            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{$message}}</p>
                                </div>
                            @endif
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>Username</th>
                                    {{--                <th>Password</th>--}}
                                    <th>Phone</th>
                                    <th>Department</th>
                                    <th>Gender</th>
                                    <th>Date of Birth</th>
                                    <th>Role</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($users as $item)
                                    <tr>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone_number }}</td>
                                        <td>{{ $item->category->category_name }}</td>
                                        <td>{{ $item->gender }}</td>
                                        <td>{{ $item->date_of_birth }}</td>
                                        <td>{{ $item->type == 1 ? 'Admin'  : ($item->type == 2  ? 'QA Manager' : ($item->type == 3  ? 'QA Coordinator' : 'Staff') ) }}</td>
                                        </td>
                                        <td class="action form-inline">
                                            <a href="{{ route('users.index',['id' => $item->id]) }}"><i
                                                    class="fas fa-edit  fa-lg"></i></a>
                                            <form action="{{ route('users.destroy',$item->id) }}" method="POST" style="margin-left: 10px !important">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"><i class="fas fa-trash fa-lg text-danger""></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                        <div class="card-footer">
                            {!! $users->links("pagination::bootstrap-4") !!}
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ isset($user) ? route('users.update',$user->id) : route('users.store') }}"
                                  method="POST" class="sign-up-form">
                                @csrf
                                @if(isset($user))
                                    @method('PUT')
                                @endif
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" value="{{ $user->name ?? ''}}" name="name"
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail">Username</label>
                                    <input id="inputEmail" type="email" value="{{ $user->email ?? '' }}" name="email"
                                           class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">Role</label>
                                    <select id="inputStatus" class="form-control custom-select" name="type">
                                        <option selected disabled>Select one</option>
                                        <option value="1" {{isset($user) && $user->type == 1 ? 'selected' : ''}}>Admin
                                        </option>
                                        <option value="2" {{isset($user) && $user->type == 2 ? 'selected' : ''}}> QA
                                            Manager
                                        </option>
                                        <option value="0" {{isset($user) && $user->type == 0 ? 'selected' : ''}}>Staff
                                        </option>
                                        <option value="3" {{isset($user) && $user->type == 3 ? 'selected' : ''}}>QA Coordinator
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">Department</label>
                                    <select id="inputStatus" class="form-control custom-select" name="category_id">
                                        <option selected disabled>Select one</option>
                                        @foreach($departments as $department)
                                            <option value="{{$department->id}}" {{isset($user) && $user->category_id == $department->id ? 'selected' : ''}}> {{$department->category_name}}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                                @if(!isset($user))
                                    <div class="form-group">
                                        <label for="inputPassword">Password</label>
                                        <input type="password" name="password" id="inputPassword" class="form-control">
                                    </div>
                                @endif

                                {{--            <div class="input-field">--}}
                                {{--                <span class="material-icons-sharp">lock</span>--}}
                                {{--                <input type="password" name="confirmPassword" placeholder="Confirm Password"/>--}}
                                {{--            </div>--}}
                                <div class="form-group">
                                    <label for="inputPhoneNumber">Phone</label>
                                    <input type="text" value="{{ $user->phone_number ?? '' }}" name="phone_number"
                                           class="form-control" placeholder="Phone"/>
                                </div>
                                <div class="form-group">
                                    <label>Gender</label>
                                    <input type="text" name="gender" value="{{$user->gender ?? '' }}"
                                           class="form-control" placeholder="Gender"/>
                                </div>
                                <div class="form-group">
                                    <label>Date Of Birth</label>
                                    <input type="text" name="date_of_birth" value="{{$user->date_of_birth ?? '' }}"
                                           class="form-control" placeholder="Date Of Birth"/>
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" name="address" value="{{$user->address ?? '' }}"
                                           class="form-control" placeholder="Address"/>
                                </div>

                                <input type="submit" class="btn btn-primary" value="{{ isset($user) ? 'Update' : 'Add'}}"/>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->

    </div>

@endsection
