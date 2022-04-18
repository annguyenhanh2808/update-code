@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Lastest Comment</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <!-- /.content -->
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
        @endif
        @if ($message = Session::get('failed'))
            <div class="alert alert-warning">
                <p>{{$message}}</p>
            </div>
        @endif
        <div class="container-fluid">
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <!-- PRODUCT LIST -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Lastest Message</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <ul class="products-list product-list-in-card pl-2 pr-2">
                                @foreach($ideas as $comment)
                                    <li class="item">
                                        <div class="product-img">
                                            <img src="{{ asset('/adminlte/dist/img/avatar5.png') }}" alt="Product Image" class="img-size-50">
                                        </div>
                                        <div class="product-info">
                                            <a href="javascript:void(0)" class="product-title"> {{ $comment->title }}
                                                <span class="badge badge-warning float-right">{{ $comment->name }}</span></a>
                                            <span class="product-description">
                                        {{ $comment->content }}
                                      </span>
                                        </div>
                                    </li>
                                @endforeach


                            </ul>
                        </div>
                        <!-- /.card-body -->
{{--                        <div class="card-footer text-center">--}}
{{--                            <a href="javascript:void(0)" class="uppercase">View All Products</a>--}}
{{--                        </div>--}}
                        <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                    <div class="card-footer">
                        {!! $ideas->links("pagination::bootstrap-4") !!}
                    </div>

                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->

    </div>

@endsection
@section('script')
    <script>
        $(function () {
            $.validator.setDefaults({
                submitHandler: function (form) {
                    form.submit();
                }
            });
            $('#quickForm').validate({
                rules: {
                    title: {
                        required: true,
                        // maxlength: 100,
                    },
                    content: {
                        required: true,
                        minlength: 5
                    },
                    terms: {
                        required: true
                    },
                    tags: {
                        required: true
                    },
                },
                messages: {
                    title: {
                        required: "Please enter  title ",
                        // email: "Please enter a valid email address"
                    },
                    tags: {
                        required: "Please enter  Categoryy ",
                        // email: "Please enter a valid email address"
                    },
                    content: {
                        required: "Please provide content of idea",
                        // minlength: "Your password must be at least 5 characters long"
                    },
                    terms: "Please accept our terms"
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });

        function search(ele, ideaId) {
            if (event.key === 'Enter') {
                alert(ele.value, ideaId);
            }
        }

    </script>
@endsection
