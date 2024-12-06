@if ($trendingNow->count() > 0)
    <div class="row">
        <div class="col-lg-12">
            <div class="trending-tittle">
                <strong>Trending now</strong>
                <div class="trending-animated">
                    <ul id="js-news" class="js-hidden">
                        @foreach ($trendingNow as $t)
                            <li class="news-item">{{ $t->title }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endif
