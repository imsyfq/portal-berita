@extends('adminlte::page')

{{-- Extend and customize the browser title --}}

@section('title')
    {{ config('adminlte.title') }}
    @hasSection('subtitle')
        | @yield('subtitle')
    @endif
@stop

{{-- Extend and customize the page content header --}}

@section('content_header')
    @hasSection('content_header_title')
        <h1 class="text-muted">
            @yield('content_header_title')

            @hasSection('content_header_subtitle')
                <small class="text-dark">
                    <i class="fas fa-xs fa-angle-right text-muted"></i>
                    @yield('content_header_subtitle')
                </small>
            @endif
        </h1>
    @endif
@stop

{{-- Rename section content to content_body --}}

@section('content')
    @yield('content_body')
@stop

{{-- Create a common footer --}}

@section('footer')
    <div class="float-right">
        {{-- Version: {{ config('app.version', '1.0.0') }} --}}
        <p><small>Handcrafted and made with <strike>tear</strike> <i class="fas fa-heart text-danger"></i></small></p>
    </div>

    <strong>
        <a href="{{ config('app.company_url', '#') }}">
            {{ config('app.company_name', 'Portal Berita - Kelompok 5') }}
        </a>
    </strong>
@stop

{{-- Add common Javascript/Jquery code --}}

@push('js')
@endpush

{{-- Add common CSS customizations --}}

@push('css')
    {{-- You can add AdminLTE customizations here --}}
    <style type="text/css">
        .card-tools {
            float: left !important;
        }

        .alert {
            padding: 10px !important;
        }

        .alert p {
            margin-bottom: 0 !important;
        }
    </style>
@endpush
