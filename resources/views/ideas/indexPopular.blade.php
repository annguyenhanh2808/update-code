@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Most Popular Ideas</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
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
                    <!-- Box Comment -->
                    @foreach($ideas as $idea)
                        <div class="card card-widget collapsed-card">
                            <div class="card-header">
                                <div class="user-block">
                                    <img class="img-circle" src="{{ asset('/adminlte/dist/img/avatar5.png') }}"
                                         alt="User Image">
                                    <span class="username"><a href="#">{{ $idea->title }}</a></span>
                                    <span
                                        class="description">Created By <b>{{ $idea->is_anonymously == 1 ? 'Anonymously' :  $idea->name }} </b> - at <b>{{ $idea->created_at }}</b></span>
                                    <span class="text-muted">{{ $idea->like_number }} <i
                                            class="far fa-thumbs-up"></i> - {{ $idea->dislike_number }} <i
                                            class="far fa-thumbs-down"></i> - {{count($idea->comments)}}  <i class="far fa-comment-alt"></i>
                                    </span>
                                    <p>
                                        @foreach(explode(",", $idea->tags) as $tag)
                                            <span class="badge badge-primary">
                                                {{ $tag }}
                                            </span>
                                        @endforeach
                                    </p>
                                    @if(count($idea->documents) > 0)
                                        <h3>Document</h3>
                                        @foreach($idea->documents as $document)
                                            <p>
                                                <a href="{{ URL::to('/images/' . $document->file_name)  }}" class="link-black text-sm"><i class="fas fa-link mr-1"></i> {{ $document->file_name }}</a>
                                            </p>
                                        @endforeach
                                    @endif




                                </div>
                                <!-- /.user-block -->
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>


                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <!-- post text -->
                                <p>
                                    {{ $idea->content }}
                                </p>


                            <!-- Social sharing buttons -->
                                <a href="{{ route('like', $idea->id) }}" class="btn btn-default btn-sm"><i class="{{$idea->like_or_dislike == 1 ? 'fas' : 'far'}} fa-thumbs-up"></i>
                                    Like
                                </a>
                                <a href="{{ route('dislike', $idea->id) }}" class="btn btn-default btn-sm"><i class="{{$idea->like_or_dislike == 2 ? 'fas' : 'far'}}  fa-thumbs-down"></i>
                                    Dislike
                                </a>

                                <span class="float-right text-muted">{{ $idea->like_number }} <i class="far fa-thumbs-up"></i> - {{ $idea->dislike_number }} <i
                                        class="far fa-thumbs-down"></i> - {{count($idea->comments)}} <i class="far fa-comment-alt"></i></span>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer card-comments">
                                @foreach($idea->comments as $comment)
                                    <div class="card-comment">
                                        <!-- User image -->
                                        <img class="img-circle img-sm"
                                             src="{{ asset('/adminlte/dist/img/avatar4.png') }}"
                                             alt="User Image">

                                        <div class="comment-text">
                                        <span class="username">
                                          {{ $comment->createdBy->name }}
                                          <span class="text-muted float-right">{{ $comment->created_at }}</span>
                                        </span><!-- /.username -->
                                            {{ $comment->content }}
                                        </div>
                                        <!-- /.comment-text -->
                                    </div>
                                @endforeach


                            </div>
                        </div>
                        <!-- /.card -->
                    @endforeach
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
            if(event.key === 'Enter') {
                alert(ele.value, ideaId);
            }
        }

    </script>
@endsection
