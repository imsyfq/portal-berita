<div class="weekly-news-area pt-50">
    <div class="container">
        <div class="weekly-wrapper">
            <!-- section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle mb-30">
                        <h3>Weekly Top News</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="weekly-news-active dot-style d-flex dot-style">
                        @foreach ($weeklyTopPosts as $i => $top)
                            <div class="weekly-single {{ $i == 0 ? 'active' : '' }}">
                                <div class="weekly-img">
                                    <img src="{{ asset($top->image) }}" alt="" />
                                </div>
                                <div class="weekly-caption">
                                    @if ($top->categories->count() > 0)
                                        <span class="color1">{{ $top->categories->random()->name }}</span>
                                    @endif
                                    <h4><a href="#">{{ $top->title }}</a></h4>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
