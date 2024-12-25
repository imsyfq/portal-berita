@extends('public.layout')

@section('title', 'Kategori')

@section('content')
    <main>
        <!-- Whats New Start -->
        <section class="whats-news-area pt-50 pb-20">
            <div class="container">
                @if (request()->filled('q'))
                    <p>Menampilkan hasil pencarian kategori "{{ request('q') }}"</p>
                @endif

                <div class="row">
                    @include('public.components.index.whats-new')
                </div>
            </div>
        </section>
        <!-- Whats New End -->
    </main>
@endsection
