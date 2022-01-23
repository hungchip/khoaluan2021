@extends('hotel.layouts.default')

@section('content')
<section class="banner">
    <div class="intro text-center">
        <p class="intro-top">Bài viết</p>
    </div>
</section>
<!-- blog  -->
<section class="blog">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    @if(count($blogs) > 0)
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
                <aside>
                    <div class="blog-search">
                        <form action="{{route('showPageBlog')}}" class="form-search">
                            <input name="data" type="text" placeholder="Tìm kiếm... ">
                            <button class="btn btn-form-search"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                    <div class="new-post">
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
                    </div>
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