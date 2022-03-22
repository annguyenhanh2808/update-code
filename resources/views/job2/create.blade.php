@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Đăng công việc</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('job2.index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Đăng công việc</li>
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
        <form action="{{route('job2.store')}}" method="POST" enctype="multipart/form-data">
            <div class="row">

                @csrf

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
                                <label for="title">Tiêu đề</label>
                                <input type="text" id="title" name="title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputCategory">Danh mục</label>
                                <select id="inputCategory" class="form-control custom-select" name="category_id">
                                    <option selected disabled>Select one</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputJobType">Loại Job</label>
                                <select id="inputJobType" class="form-control custom-select" name="job_type">
                                    <option selected disabled>Select one</option>
                                    <option value="1">Fulltime</option>
                                    <option value="2">Parttime</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="inputExpiredDate">Ngày hết hạn</label>
                                <div class="input-group date" id="inputExpiredDate" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" name="expired_date"
                                           data-target="#inputExpiredDate"/>
                                    <div class="input-group-append" data-target="#inputExpiredDate"
                                         data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="title">Địa chỉ</label>
                                <input type="text" id="location" name="location" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputSpentBudget">Lương</label>
                                <input type="text" id="inputSpentBudget" name="salary" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedDuration">Kĩ năng</label>
                                <input type="text" id="inputEstimatedDuration" class="form-control" name="skills">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-6">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Budget</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputEstimatedBudget">Mô tả</label>
                                <textarea id="description" name="description">

                                  </textarea>
                            </div>


                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('job2.index') }}" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Lưu" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->


@endsection

@section('script')

    <script>
        $(function () {
            $('#inputExpiredDate').datetimepicker({
                format: 'YYYY-MM-DD'
            });

            // Summernote
            $('#description').summernote({
                height: 500
            })
            bsCustomFileInput.init();
        });


    </script>
@endsection
