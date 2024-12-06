@extends('layouts.admin-dashboard')

{{-- Customize layout sections --}}
{{-- @section('title', 'Kategori') --}}
@section('subtitle', 'Kategori')

@section('content_header_title', 'Semua Kategori')
@section('content_header_subtitle', 'Edit')

{{-- Content body: main page content --}}
@section('content_body')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <x-adminlte-card>
                    <form action="{{ route('category.update', $category) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <x-adminlte-input name="name" label="Nama" placeholder="Nama Kategori"
                            value="{{ $category->name }}" />

                        <x-adminlte-button type="submit" label="Edit" class="btn-sm" theme="warning" />
                    </form>
                </x-adminlte-card>
            </div>
        </div>
    </div>
@stop
