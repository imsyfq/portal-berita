@extends('public.layout')

@section('title', $post->title)

@section('css')
    <link rel="stylesheet" href="{{ asset('template/assets/css/responsive.css') }}">
    <style>
        li {
            list-style: inside;
        }
    </style>
@endsection

@section('content')
    <main>
        <div class="about-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="about-right mb-90">
                            <div class="about-img">
                                <img src="{{ asset($post->image) }}" alt="post detail">
                            </div>
                            <div class="section-tittle mb-30 pt-30">
                                <h3>{{ $post->title }}</h3>
                            </div>
                            <div class="about-prea">
                                {!! $post->content !!}
                            </div>

                            <div class="social-share pt-30">
                                <div class="section-tittle">
                                    <h3 class="mr-20">Share:</h3>
                                    <ul>
                                        <li><a href="#"><img
                                                    src="{{ asset('template/assets/img/news/icon-ins.png') }}"
                                                    alt=""></a>
                                        </li>
                                        <li><a href="#"><img src="{{ asset('template/assets/img/news/icon-fb.png') }}"
                                                    alt=""></a>
                                        </li>
                                        <li><a href="#"><img src="{{ asset('template/assets/img/news/icon-tw.png') }}"
                                                    alt=""></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('js')
    <script>
        function checkScrollPercent() {
            const scrollPosition = window.scrollY;
            const windowHeight = window.innerHeight;
            const documentHeight = document.documentElement.scrollHeight;
            const scrollPercentage = (scrollPosition / (documentHeight - windowHeight)) * 100;

            return scrollPercentage >= 70;
        }

        function sendView() {
            const url = "{{ route('public.post-view', $post->id) }}";
            $.ajax({
                url: url,
                data: {
                    post_id: {{ $post->id }},
                    hash: '{{ rand(1, 9999999999) }}-{{ microtime() }}-{{ $post->id }}'
                },
                dataType: 'json',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {}
            })
        }

        let waiting = 0;
        window.addEventListener('scroll', () => {
            clearTimeout(waiting);
            waiting = setTimeout(() => {
                // if the scroll is more than 70%, add views to the post
                if (checkScrollPercent()) {
                    sendView()
                }
            }, 1000)
        });
    </script>
@endsection
