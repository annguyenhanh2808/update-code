@extends('layouts.appUser')
@section('content')
    <!-- Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/about.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>{{ $job->category->category_name }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End -->
    <!-- job post company Start -->
    <div class="job-post-company pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-between">
                <!-- Left Content -->
                <div class="col-xl-7 col-lg-8">
                    <!-- job single -->
                    <div class="single-job-items mb-50">
                        <div class="job-items">
                            <div class="company-img company-img-details">
                                <a href="#"><img src="{{ URL::to('/images/' . $job->image_url) }}" alt=""></a>
                            </div>
                            <div class="job-tittle">
                                <a href="#">
                                    <h4>{{ $job->title }}</h4>
                                </a>
                                <ul>
                                    <li>{{ $job->user->name }}</li>
{{--                                    <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>--}}
                                    <li>{{ $job->salary }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- job single End -->

                    <div class="job-post-details">
                        <div class="post-details1 mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Địa chỉ</h4>
                            </div>
                            <p>{{ $job->location }}</p>
                        </div>
                        <div class="post-details2  mb-50">
                            {!! $job->description !!}
                        </div>

                    </div>

                </div>
                <!-- Right Content -->
                <div class="col-xl-4 col-lg-4">
                    <div class="post-details3  mb-50">
                        <!-- Small Section Tittle -->
                        <div class="small-section-tittle">
                            <h4>Tổng quan</h4>
                        </div>
                        <ul>
                            <li>Ngày đăng : <span>{{ $job->created_at }}</span></li>
{{--                            <li>Location : <span>New York</span></li>--}}
{{--                            <li>Vacancy : <span>02</span></li>--}}
                            <li>Job nature : <span>{{ $job->job_type == 1 ? 'Full time' : 'Part time' }}</span></li>
                            <li>Salary :  <span>{{ $job->salary }}</span></li>
{{--                            <li>Application date : <span>12 Sep 2020</span></li>--}}
                        </ul>
{{--                        <div class="apply-btn2">--}}
{{--                            <a href="#" class="btn">Apply Now</a>--}}
{{--                        </div>--}}
                    </div>
                    <div class="post-details4  mb-50">
                        <!-- Small Section Tittle -->
                        <div class="small-section-tittle">
                            <h4>Thông tin công ty</h4>
                        </div>
                        <span>{{ $job->user->name }}</span>
{{--                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>--}}
                        <ul>
                            <li>Name: <span>{{ $job->user->name }} </span></li>
{{--                            <li>Web : <span> colorlib.com</span></li>--}}
                            <li>Email: <span>{{ $job->user->email }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- job post company End -->
@endsection
