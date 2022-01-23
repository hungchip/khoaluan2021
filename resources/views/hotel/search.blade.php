@extends('hotel.layouts.default')

@section('content')
<section class="banner">
    <div class="intro text-center">
        <p class="intro-top">Kết quả tìm kiếm</p>
    </div>
</section>
<!-- blog  -->
<section class="blog">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <p class="new-post-title">Loại phòng</p>
                <div class="is-divider"></div>
                <div class="row">
                    @if(count($roomTypes) !=0)
                    @foreach ($roomTypes as $roomType)
                    <div class="col-md-4">
                        <div class="post">
                            <a href="{{route('showBlogDetail', $roomType->room_type_id)}}">
                                <div class="post-wrapper">
                                    <div class="post-image">
                                        <img src="{{asset('public/image/')}}/{{$roomType->avatar}}" alt="">
                                    </div>
                                    <div class="post-text">
                                        <h4 class="post-title">{{$roomType->room_type_name}}</h4>
                                        <div class="is-divider"></div>
                                        <p>Giá: <span>{{number_format($roomType->room_type_price)}}</span> VND/Ngày</p>
                                    </div>
                                    {{-- <div class="post-date absolute">
                                        <span class="post-day">{{date('d',strtotime($blog->created_at))}}</span>
                                        <br>
                                        <span
                                            class="post-month"><strong>{{date('M',strtotime($blog->created_at))}}</strong></span>
                                    </div> --}}
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="col-md-12">
                        <p class="no-result">Không có kết quả nào</p>
                    </div>
                    @endif


                </div>

                <p class="new-post-title">Bài viết</p>
                <div class="is-divider"></div>
                <div class="row">
                    @if(count($blogs) != 0)
                    @foreach ($blogs as $blog)
                    <div class="col-md-4">
                        <div class="post">
                            <a href="{{route('showBlogDetail', $blog->blog_id)}}">
                                <div class="post-wrapper">
                                    <div class="post-image">
                                        <img src="{{asset('public/image/blog/')}}/{{$blog->thumbnail}}" alt="">
                                    </div>
                                    <div class="post-text">
                                        <h4 class="post-title">{{$blog->title}}</h4>
                                        <div class="is-divider"></div>
                                        <p>{{$blog->quote}}</p>
                                    </div>
                                    <div class="post-date absolute">
                                        <span class="post-day">{{date('d',strtotime($blog->created_at))}}</span>
                                        <br>
                                        <span
                                            class="post-month"><strong>{{date('M',strtotime($blog->created_at))}}</strong></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="col-md-12">
                        <p class="no-result">Không có kết quả nào</p>
                    </div>
                    @endif

                </div>
            </div>
            <div class="col-md-3">

                {{-- <aside class="blog-search">
                    <form action="">
                        <input type="text" class="form-control input-search" placeholder="Tìm kiếm bài viết">
                        <button><i class="fas fa-search"></i></button>
                    </form>
                </aside> --}}
                <aside class="new-post">
                    <p class="new-post-title">Phòng đặc biệt</p>
                    <div class="is-divider"></div>
                    <ul class="list-new-post">
                        @foreach ($specialRooms as $specialRoom)
                        <li class="new-post-item">
                            <a href="{{route('showDetailRoom',$specialRoom->room_type_id)}}">
                                <div class="new-post-row clearfix">
                                    <div class="special-room-item">
                                        <img src="{{asset('public/image/')}}/{{$specialRoom->avatar}}" alt="">
                                    </div>
                                    <p class="post-title">{{$specialRoom->room_type_name}}</p>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    <p class="new-post-title">Bài viết mới</p>
                    <div class="is-divider"></div>
                    <ul class="list-new-post">
                        @foreach ($recentBlogs as $recentBlog)
                        <li class="new-post-item">
                            <a href="">
                                <div class="new-post-row clearfix">
                                    <div class="post-date-item">
                                        <span class="post-day">{{date('d',strtotime($recentBlog->created_at))}}</span>
                                        <br>
                                        <span
                                            class="post-month"><strong>{{date('M',strtotime($recentBlog->created_at))}}</strong></span>
                                    </div>
                                    <p class="post-title">{{$recentBlog->title}}</p>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </aside>

            </div>
        </div>
    </div>
</section>
<!-- end blog  -->
@endsection

@section('css')
<style>
    .banner {
        background-image: url('{{asset('public/hotel/images/room-05.jpeg')}}');
        height: 400px;
    }
</style>
@endsection