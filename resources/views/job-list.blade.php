@extends('layouts.appUser')
@section('content')
    <!-- Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center"
             data-background="assets/img/hero/about.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Danh sách công việc</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End -->
    <!-- Job List Area Start -->
    <div class="job-listing-area pt-120 pb-120">
        <div class="container">
            <div class="row">
                <!-- Left content -->
                <div class="col-xl-3 col-lg-3 col-md-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="small-section-tittle2 mb-45">
                                <div class="ion">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="20px" height="12px">
                                        <path fill-rule="evenodd" fill="rgb(27, 207, 107)"
                                              d="M7.778,12.000 L12.222,12.000 L12.222,10.000 L7.778,10.000 L7.778,12.000 ZM-0.000,-0.000 L-0.000,2.000 L20.000,2.000 L20.000,-0.000 L-0.000,-0.000 ZM3.333,7.000 L16.667,7.000 L16.667,5.000 L3.333,5.000 L3.333,7.000 Z"/>
                                    </svg>
                                </div>
                                <h4>Filter Jobs</h4>
                            </div>
                        </div>
                    </div>
                    <!-- Job Category Listing start -->
                    <div class="job-category-listing mb-50">
                        <form method="get" action="{{ route('job-list') }}">
                            <!-- single one -->
                            <div class="single-listing">
                                <div class="small-section-tittle2">
                                    <h4>Danh mục</h4>
                                </div>
                                <!-- Select job items start -->
                                <div class="select-job-items2">
                                    <select name="category_id">
                                        <option value="">All Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <!--  Select job items End-->
                                <!-- select-Categories start -->
                                <div class="select-Categories pt-80 pb-50">
                                    <div class="small-section-tittle2">
                                        <h4>Loại công việc</h4>
                                    </div>
                                    <div class="select-job-items2">
                                        <select  name="job_type">
                                            <option value="">All Category</option>
                                            <option value="1">Full time</option>
                                            <option value="2">Part time</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="select-Categories pt-80 pb-50">
                                    <div class="small-section-tittle2">
                                        <button type="submit" class="genric-btn primary e-large">Tìm kiếm</button>
                                    </div>

                                </div>
                                <!-- select-Categories End -->
                            </div>
                        </form>
                    </div>
                    <!-- Job Category Listing End -->
                </div>
                <!-- Right content -->
                <div class="col-xl-9 col-lg-9 col-md-8">
                    <!-- Featured_job_start -->
                    <section class="featured-job-area">
                        <div class="container">
                            <!-- Count of Job list Start -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="count-job mb-35">
                                        <span>Tìm thấy {{ count($jobs) }} công việc</span>
                                        <!-- Select job items start -->
                                        <div class="select-job-items">
                                            <span>Sort by</span>
                                            <select name="select">
                                                <option value="">None</option>
                                                <option value="">job list</option>
                                                <option value="">job list</option>
                                                <option value="">job list</option>
                                            </select>
                                        </div>
                                        <!--  Select job items End-->
                                    </div>
                                </div>
                            </div>
                            <!-- Count of Job list End -->
                            <!-- single-job-content -->
                            @foreach($jobs as $job)
                                <div class="single-job-items mb-30">
                                    <div class="job-items">
                                        <div class="company-img">
                                            <a href="{{ route('job-detail', $job->id) }}"><img src="{{ URL::to('/images/' . $job->image_url) }}"
                                                             width="85px" alt=""></a>
                                        </div>
                                        <div class="job-tittle job-tittle2">
                                            <a href="{{ route('job-detail', $job->id) }}">
                                                <h4>{{ $job->title }}</h4>
                                            </a>
                                            <ul>
                                                <li>{{ $job->user->name }}</li>
                                                {{--                                                <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>--}}
                                                <li>{{ $job->salary }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="items-link items-link2 f-right">
                                        <a href="job_details.html">{{ $job->job_type == 1 ? 'Full time' : 'Part time' }}</a>
                                        <span>Đăng {{ \Carbon\Carbon::now()->diffInHours(\Carbon\Carbon::parse($job->created_at)) }} tiếng trước</span>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </section>
                    <!-- Featured_job_end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Job List Area End -->
    <!--Pagination Start  -->
    <div class="pagination-area pb-115 text-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="single-wrap d-flex justify-content-center">
                        {!! $jobs->links("pagination::bootstrap-4") !!}
                        {{--                        <nav aria-label="Page navigation example">--}}
                        {{--                            <ul class="pagination justify-content-start">--}}
                        {{--                                <li class="page-item active"><a class="page-link" href="#">01</a></li>--}}
                        {{--                                <li class="page-item"><a class="page-link" href="#">02</a></li>--}}
                        {{--                                <li class="page-item"><a class="page-link" href="#">03</a></li>--}}
                        {{--                                <li class="page-item"><a class="page-link" href="#"><span class="ti-angle-right"></span></a></li>--}}
                        {{--                            </ul>--}}
                        {{--                        </nav>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Pagination End  -->
@endsection