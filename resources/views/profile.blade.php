@extends('layouts.appUser')
@section('content')

    <!-- Hero Area End -->
    <!-- ================ contact section start ================= -->
    <section class="contact-section">
        <div class="container">

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p></p>
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">Hồ sơ của bạn</h2>
                </div>
                <div class="col-lg-8">
                    <form class="form-contact contact_form" action="{{ route('profile.update') }}" method="post"
                          enctype="multipart/form-data" id="contactForm" novalidate="novalidate">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <input class="form-control" value="{{ $user->name }}" name="name" id="name"
                                           type="text" onfocus="this.placeholder = ''" placeholder="Nhập họ và tên">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" value="{{ $user->phone_number }}" name="phone_number" id="phone_number" type="text"
                                           onfocus="this.placeholder = ''"
                                           onblur="this.placeholder = 'Nhập số điện thoại'"
                                           placeholder="Nhập số điện thoại">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="about_us" id="about_us" cols="30"
                                              rows="9" onfocus="this.placeholder = ''"
                                              onblur="this.placeholder = 'Giới thiệu bản thân'"
                                              placeholder=" Giới thiệu bản thân">{{ $user->about_us }}</textarea>
                                </div>
                            </div>
                            {{--                            <div class="col-sm-6">--}}
                            {{--                                <div class="form-group">--}}
                            {{--                                    <input class="form-control valid" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name">--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="col-sm-6">--}}
                            {{--                                <div class="form-group">--}}
                            {{--                                    <input class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Email">--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" name="address" id="address" type="text" value="{{ $user->address }}"
                                           onfocus="this.placeholder = ''" onblur="this.placeholder = 'Địa chỉ'"
                                           placeholder="Địa chỉ">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input class="form-control" name="image" id="subject" type="file"
                                           onfocus="this.placeholder = ''" onblur="this.placeholder = 'Địa chỉ'"
                                           placeholder="Địa chỉ">

                                </div>

                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <a href="{{ URL::to('/images/' . $user->file_dinh_kem)  }}" class="genric-btn link">{{ $user->file_dinh_kem }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="button button-contactForm boxed-btn">Send</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    {{--                    <div class="media contact-info">--}}
                    {{--                        <span class="contact-info__icon"><i class="ti-home"></i></span>--}}
                    {{--                        <div class="media-body">--}}
                    {{--                            <h3>{{ $user-> }}</h3>--}}
                    {{--                            <p>Rosemead, CA 91770</p>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="media contact-info">--}}
                    {{--                        <span class="contact-info__icon"><i class="ti-tablet"></i></span>--}}
                    {{--                        <div class="media-body">--}}
                    {{--                            <h3>{{ $user->phone_number }}</h3>--}}
                    {{--                            <p>Mon to Fri 9am to 6pm</p>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-email"></i></span>
                        <div class="media-body">
                            <h3>{{ $user->email }}</h3>
                            {{--                            <p>Send us your query anytime!</p>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->
@endsection
