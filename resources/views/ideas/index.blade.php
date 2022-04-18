@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ideas</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
{{--                        <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
{{--                        <li class="breadcrumb-item active">Starter Page</li>--}}
                    </ol>
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
            @if(Auth::user()->type == 2)
            <div class="row">
                <div class="col-6">
                    <a class="btn btn-warning float-end" href="{{ route('ideas.export') }}">Export Ideas Data</a>
                    <a class="btn btn-warning float-end" href="{{ route('ideas.download') }}">Download attach file</a>
                </div>

            </div>
            @endif
            <div class="row">
                <div class="col-7">
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
                                    Document
                                    @foreach($idea->documents as $document)
                                        <p>
                                            <a href="{{ URL::to('/images/' . $document->file_name)  }}" class="link-black text-sm"><i class="fas fa-link mr-1"></i> {{ $document->file_name }}</a>
                                        </p>
                                    @endforeach



                                </div>
                                <!-- /.user-block -->
                                <div class="card-tools">

                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-plus"></i>
                                    </button>

                                </div>



                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <!-- post text -->
                                <p>
                                    {{ $idea->content }}
                                </p>

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
                            <!-- /.card-footer -->
                            <div class="card-footer">
                                <form action="{{ route('comments.store') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="idea_id" value="{{ $idea->id }}">
                                    <img class="img-fluid img-circle img-sm"
                                         src="{{ asset('adminlte/dist/img/avatar3.png') }}" alt="Alt Text">
                                    <!-- .img-push is used to add margin to elements next to floating images -->
                                    <div class="img-push">
                                        <input type="text" class="form-control form-control-sm" name="content"
                                               placeholder="Press enter to post comment">
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                    @endforeach
                    <div class="card-footer">
                        {!! $ideas->links("pagination::bootstrap-4") !!}
                    </div>

                </div>
                <div class="col-5">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Create Idea</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <form id="quickForm" method="post" action="{{ route('ideas.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputEstimatedBudget">Title</label>
                                    <input type="text" id="inputEstimatedBudget" class="form-control" name="title">
                                </div>
                                <div class="form-group">
                                    <label for="inputSpentBudget">Content</label>
                                    <textarea rows="4" id="inputSpentBudget" class="form-control"
                                              name="content"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="inputTag">Category</label>
                                    <input type="text" id="inputTag" class="form-control" name="tags">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="images[]" id="subject" type="file" multiple
                                           onfocus="this.placeholder = ''" onblur="this.placeholder = 'Địa chỉ'"
                                           placeholder="Địa chỉ">

                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="terms" class="custom-control-input"
                                               id="exampleCheck1">
                                        <label class="custom-control-label" for="exampleCheck1">I agree to the <a
                                                href="#">terms of service</a>.</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="is_anonymously" class="custom-control-input"
                                               id="exampleCheck2">
                                        <label class="custom-control-label" for="exampleCheck2">Is Anonymously</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <input type="submit" value="Create new Idea" class="btn btn-success ">
                                    </div>
                                </div>
                            </div>
                        </form>
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
