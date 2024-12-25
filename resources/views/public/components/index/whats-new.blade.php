<div class="col-lg-12">
    <div class="row d-flex justify-content-between">
        <div class="col-lg-3 col-md-3">
            <div class="section-tittle mb-30">
                <h3>Whats New</h3>
                @if ($categories->count() === 0)
                    <p>Tidak ada data untuk ditampilkan</p>
                @endif
            </div>
        </div>
        <div class="col-lg-9 col-md-9">
            <div class="properties__button">
                <!--Nav Button  -->
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        @foreach ($categories as $i => $category)
                            <a class="nav-item nav-link {{ $i == 0 ? 'active' : '' }}" id="cat-{{ $category->id }}-tab"
                                data-toggle="tab" href="#cat-{{ $category->id }}" role="tab"
                                aria-controls="cat-{{ $category->id }}"
                                aria-selected="{{ $i == 0 ? 'true' : 'false' }}">
                                {{ $category->name }}
                            </a>
                        @endforeach
                    </div>
                </nav>
                <!--End Nav Button  -->
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <!-- Nav Card -->
            <div class="tab-content" id="nav-tabContent">
                <!-- card one -->
                @foreach ($categories as $i => $cat)
                    <div class="tab-pane fade show {{ $i === 0 ? 'active' : '' }}" id="cat-{{ $cat->id }}"
                        aria-labelledby="cat-{{ $cat->id }}-tab" role="tabpanel">
                        <div class="whats-news-caption">
                            <div class="row">
                                @foreach ($cat->posts as $post)
                                    <div class="col-lg-6 col-md-6">
                                        <div class="single-what-news mb-100">
                                            <div class="what-img">
                                                <img src="{{ asset($post->image) }}" alt="" />
                                            </div>
                                            <div class="what-cap">
                                                <span class="color{{ rand(1, 3) }}">{{ $cat->name }}</span>
                                                <h4>
                                                    <a
                                                        href="{{ route('public.detail', $post->slug) }}">{{ $post->title }}</a>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- End Nav Card -->

            @if (!$categories instanceof Illuminate\Database\Eloquent\Collection && $categories->hasPages())
                {{ $categories->withQueryString()->links('vendor.pagination.custom') }}
            @endif
        </div>
    </div>
</div>
