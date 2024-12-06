@extends('layouts.admin-dashboard')

{{-- Customize layout sections --}}
{{-- @section('title', 'Kategori') --}}
@section('subtitle', 'Kategori')

@section('content_header_title', 'Semua Kategori')
@section('content_header_subtitle', 'Tambah')

{{-- Content body: main page content --}}
@section('content_body')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <x-adminlte-card>
                    <form action="{{ route('category.store') }}" method="POST">
                        @csrf

                        <x-adminlte-input name="name" label="Nama" placeholder="Nama Kategori" />

                        <x-adminlte-button type="submit" label="Simpan" class="btn-sm" theme="primary" />
                    </form>
                </x-adminlte-card>
            </div>
        </div>
    </div>
@stop
