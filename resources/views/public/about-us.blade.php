@extends('public.layout')

@section('title', 'Tentang Kami')

@section('content')
    <main>
        <div class="about-area">
            <div class="container">
                <!-- Hot Aimated News Tittle-->
                {{-- <div class="row">
                    <div class="col-lg-12">
                        <div class="trending-tittle">
                            <strong>Trending now</strong>
                            <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                            <div class="trending-animated">
                                <ul id="js-news" class="js-hidden">
                                    <li class="news-item">Bangladesh dolor sit amet, consectetur adipisicing elit.</li>
                                    <li class="news-item">Spondon IT sit amet, consectetur.......</li>
                                    <li class="news-item">Rem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Trending Tittle -->
                        <div class="about-right mb-90">
                            <div class="about-img">
                                <img src="{{ asset('images/banner-logo.png') }}" alt="">
                            </div>
                            <div class="section-tittle mb-30 pt-30">
                                <h3>Winnicode Garuda Teknologi | About Us</h3>
                            </div>
                            <div class="about-prea">
                                <p class="about-pera1 mb-25 text-lg">
                                    Sistem Jurnalistik Terpadu merupakan sebuah inovasi yang bertujuan untuk menyatukan
                                    berbagai
                                    aspek dalam dunia jurnalisme, mulai dari pengumpulan informasi, proses penyuntingan,
                                    hingga
                                    publikasi konten. Platform ini dirancang untuk menjadi wadah yang komprehensif bagi para
                                    jurnalis dan penerbit dalam menjalankan tugas mereka dengan lebih efektif dan efisien
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endSection
