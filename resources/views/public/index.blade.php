@extends('public.layout')

@section('content')
    <main>
        <!-- Trending Area Start -->
        <div class="trending-area fix">
            <div class="container">
                <div class="trending-main">
                    <!-- Trending Tittle -->
                    @include('public.components.index.trending-now')
                    <!-- End Trending Tittle -->

                    @include('public.components.index.trending')
                </div>
            </div>
        </div>
        <!-- Trending Area End -->

        <!--   Weekly-News start -->
        @include('public.components.index.weekly-news')
        <!-- End Weekly-News -->

        <!-- Whats New Start -->
        <section class="whats-news-area pt-50 pb-20">
            <div class="container">
                <div class="row">
                    @include('public.components.index.whats-new')
                </div>
            </div>
        </section>
        <!-- Whats New End -->
    </main>
@endsection
