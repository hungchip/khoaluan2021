@extends('hotel.layouts.default')
@section('content')
<section class="banner">
    <div class="intro text-center">
        <p class="intro-top">{{$blog->title}}</p>
    </div>
</section>
<!-- blog  -->
<section class="blog-detail">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <article class="post-detail">
                    <div class="header-text">
                        <h1>{{$blog->title}}</h1>
                        <div class="is-divider"></div>
                        <div class="author-info">
                            <span class="post-on">Đăng lúc <span class="post-time"></span></span>
                            <span class="post-by"> bởi <span class="author"></span></span>
                        </div>
                    </div>
                    <img src="{{ asset('public/image/blog/')}}/{{$blog->thumbnail}}" alt="">
                    <div class="content">
                        {!!$blog->content!!}
                    </div>
                    <div class="footer-text">

                    </div>
                </article>
            </div>
            <div class="col-md-3">
                
                {{-- <aside class="blog-search">
                    <form action="">
                        <input type="text" class="form-control input-search" placeholder="Tìm kiếm bài viết">
                        <button><i class="fas fa-search"></i></button>
                    </form>
                </aside> --}}
                <aside class="new-post">
                    <p class="new-post-title">Bài viết mới</p>
                    <div class="is-divider"></div>
                    <ul class="list-new-post">
                        @foreach ($recentBlogs as $recentBlog)
                        <li class="new-post-item">
                            <a href="">
                                <div class="new-post-row clearfix">
                                    <div class="post-date-item">
                                        <span class="post-day">{{date('d',strtotime($blog->created_at))}}</span>
                                        <br>
                                        <span class="post-month"><strong>{{date('M',strtotime($blog->created_at))}}</strong></span>
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