@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Starter Page</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Starter Page</li>
                    </ol>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <a href="{{ route('job2.create') }}" class="btn btn-primary">Thêm mới</a>
                            </h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right"
                                           placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{$message}}</p>
                                </div>
                            @endif
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Tiêu đề</th>
                                    <th>Danh mục</th>
                                    <th>Loại Job</th>
                                    <th>Ngày đăng</th>
                                    <th>Người tạo</th>
                                    <th>Trạng thái</th>
                                    @if(Auth::user()->type == 1)
                                        <th></th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>
                                            <img src="{{ URL::to('/images/' . $item->image_url)  }}" width="80px">
                                        </td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->category->category_name }}</td>
                                        <td>{{ $item->job_type == 1 ? 'Full time' : 'Part time' }}</td>
                                        <td>{{ $item->expired_date }}</td>
                                        <td>{{ $item->user->email }}</td>
                                        <td>
                                            @if($item->status == 0)
                                                <p class="badge badge-info">Chờ duyệt</p>
                                            @elseif($item->status == 1)
                                                <p class="badge badge-success"> Đã duyệt</p>
                                            @elseif($item->status == 2)
                                                <p class="badge badge-warning">
                                                    Từ chối
                                                </p>
                                            @elseif($item->status == 3)
                                                <p class="badge badge-danger">Đã xóa</p>
                                            @endif
                                        </td>

                                            <td>
                                                <form action="{{ route('job2.destroy',$item->id) }}" method="POST">

                                                    <a href="{{ route('job2.edit',$item->id) }}">
                                                        <i class="fas fa-edit  fa-lg"></i>
                                                    </a>

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" title="delete"
                                                            style="border: none; background-color:transparent;">
                                                        @if($item->active == 0)
                                                            <i class="fas fa-lock fa-lg text-danger"></i>
                                                        @else
                                                            <i class="fas fa-lock-open fa-lg text-danger"></i>
                                                        @endif

                                                    </button>
                                                </form>
                                            </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                        <div class="card-footer">
                            {!! $items->links("pagination::bootstrap-4") !!}
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->

    </div>



@endsection
