<div class="row">
    <div class="col-lg-8">
        <!-- Trending Top -->
        @if ($trendingPosts->count() > 0)
            @php
                $first = $trendingPosts->shift();
            @endphp
            <div class="trending-top mb-30">
                <div class="trend-top-img">
                    <img src="{{ asset($first->image) }}" alt="post-image" />
                    <div class="trend-top-cap">
                        @foreach ($first->categories as $category)
                            <span>{{ $category->name }}</span>
                        @endforeach
                        <h2>
                            <a href="{{ route('public.detail', $first->slug) }}">{{ $first->title }}</a>
                        </h2>
                    </div>
                </div>
            </div>
        @endif

        <!-- Trending Bottom -->
        <div class="trending-bottom">
            <div class="row">
                @foreach ($trendingPosts->splice(0, 3) as $post)
                    <div class="col-lg-4">
                        <div class="single-bottom mb-35">
                            <div class="trend-bottom-img mb-30">
                                <img src="{{ asset($post->image) }}" alt="" />
                            </div>
                            <div class="trend-bottom-cap">
                                @foreach ($post->categories as $category)
                                    <span class="color1">{{ $category->name }}</span>
                                @endforeach
                                <h4>
                                    <a href="{{ route('public.detail', $post->slug) }}">{{ $post->title }}</a>
                                </h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Right content -->
    <div class="col-lg-4">
        @foreach ($trendingPosts as $post)
            <div class="trand-right-single d-flex">
                <div class="trand-right-img" style="max-width: 120px">
                    <img src="{{ asset($post->image) }}" class="img-fluid" alt="" />
                </div>
                <div class="trand-right-cap">
                    @if ($post->categories->count() > 0)
                        <span class="color{{ rand(1, 4) }}  }}">{{ $post->categories->random()->name }}</span>
                    @endif

                    <h4><a href="{{ route('public.detail', $post->slug) }}">{{ $post->title }}</a></h4>
                </div>
            </div>
        @endforeach
    </div>
</div>
