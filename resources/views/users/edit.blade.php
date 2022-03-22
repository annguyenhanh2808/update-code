@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm mới user</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Thêm mới user</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Main content -->
    <section class="content">
        <form action="{{ route('users.update',$item->id) }}" method="POST">
            <div class="row">
                @csrf
                @method('PUT')
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">General</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Họ Tên</label>
                                <input type="text" id="name" value="{{ $item->name }}"  name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputEmail">Email</label>
                                <input id="inputEmail" type="email" value="{{ $item->email }}" name="email" class="form-control"></input>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Loại tài khoản</label>
                                <select id="inputStatus" class="form-control custom-select" name="type">
                                    <option selected disabled>Select one</option>
                                    <option value="1" {{$item->type == 1 ? 'selected' : ''}}>Admin</option>
                                    <option value="2" {{$item->type == 2 ? 'selected' : ''}} >Công ty</option>
                                    <option value="0" {{$item->type == 0 ? 'selected' : ''}}>User</option>
                                </select>
                            </div>
                            {{--<div class="form-group">
                                <label for="inputPassword">Mật khẩu</label>
                                <input type="password" name="password" id="inputPassword" class="form-control">
                            </div>--}}

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
{{--                <div class="col-md-6">--}}
{{--                    <div class="card card-secondary">--}}
{{--                        <div class="card-header">--}}
{{--                            <h3 class="card-title">Budget</h3>--}}

{{--                            <div class="card-tools">--}}
{{--                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">--}}
{{--                                    <i class="fas fa-minus"></i>--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="inputEstimatedBudget">Estimated budget</label>--}}
{{--                                <input type="number" id="inputEstimatedBudget" class="form-control">--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="inputSpentBudget">Total amount spent</label>--}}
{{--                                <input type="number" id="inputSpentBudget" class="form-control">--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="inputEstimatedDuration">Estimated project duration</label>--}}
{{--                                <input type="number" id="inputEstimatedDuration" class="form-control">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- /.card-body -->--}}
{{--                    </div>--}}
{{--                    <!-- /.card -->--}}
{{--                </div>--}}
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Lưu" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->


@endsection
