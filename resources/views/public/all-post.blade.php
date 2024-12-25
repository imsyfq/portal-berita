@extends('public.layout')

@section('content')
    <main>
        <section class="blog_area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mb-5 mb-lg-0">
                        <div class="blog_left_sidebar">
                            @foreach ($posts as $post)
                                <article class="blog_item">
                                    <div class="blog_item_img">
                                        <img class="card-img rounded-0" src="{{ asset($post->image) }}" alt="">
                                        <a href="#" class="blog_item_date">
                                            <h3>{{ $post->created_at->format('d') }}</h3>
                                            <p>{{ $post->created_at->format('M') }}</p>
                                        </a>
                                    </div>

                                    <div class="blog_details">
                                        <a class="d-inline-block" href="{{ route('public.detail', $post->slug) }}">
                                            <h2>{{ $post->title }}</h2>
                                        </a>
                                        {{-- <p>That dominion stars lights dominion divide years for fourth have don't stars is
                                            that
                                            he earth it first without heaven in place seed it second morning saying.</p> --}}
                                        <ul class="blog-info-link">
                                            @if ($post->admin)
                                                <li><a href="#"><i class="fa fa-user"></i>
                                                        {{ $post->admin->name }}</a></li>
                                            @endif
                                            <li><a href="#"><i class="fa fa-comments"></i>
                                                    {{ $post->comments_count ?? 0 }} Comments</a></li>
                                        </ul>
                                    </div>
                                </article>
                            @endforeach

                            {{ $posts->withQueryString()->links('vendor.pagination.post-pagination') }}
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="blog_right_sidebar">
                            <aside class="single_sidebar_widget search_widget">
                                <form action="#">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <form action="{{ request()->url() }}">
                                                <input type="text" class="form-control" placeholder='Search Keyword'
                                                    onfocus="this.placeholder = ''"
                                                    onblur="this.placeholder = 'Search Keyword'" name="q"
                                                    value="{{ request('q') }}">
                                                <div class="input-group-append">
                                                    <button class="btns" type="button"><i class="ti-search"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                        type="submit">Search</button>
                                </form>
                            </aside>

                            <aside class="single_sidebar_widget post_category_widget">
                                <h4 class="widget_title">Category</h4>
                                <ul class="list cat-list">
                                    @foreach ($categories as $cat)
                                        <li>
                                            <a href="{{ route('public.posts', ['c_id' => $cat->id]) }}" class="d-flex">
                                                <p {!! request('c_id') == $cat->id ? 'style="color: #fc3f00"' : '' !!}>
                                                    {{ $cat->name }} &nbsp;</p>
                                                <p>({{ $cat->posts_count }})</p>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================Blog Area =================-->
    </main>
@endsection
