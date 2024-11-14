@extends('layouts.admin-dashboard')
{{-- Customize layout sections --}}
@section('subtitle', 'Berita')

@section('content_header_title', 'Semua Berita')
@section('content_header_subtitle', 'List')

{{-- Plugins --}}
@section('plugins.Datatables', true)
{{-- End Plugins --}}

{{-- Content body: main page content --}}
@section('content_body')
<div class="container">
    <div class="row">
        <div class="col-12">
            <x-adminlte-card>
                @if (Session::has('message'))
                    <x-adminlte-alert theme="info" title="Info" dismissable>
                        {{ Session::get('message') }}
                    </x-adminlte-alert>
                @endif

                <x-slot name="toolsSlot" class="float-left">
                    <a href="{{ route('post.create') }}" class="btn btn-outline-primary btn-sm">
                        <i class="fas fa-plus"></i>
                        Tambah
                    </a>
                </x-slot>

                @php
                    $config = [
                        'ajax' => route('post.index'),
                        'processing' => true,
                        'serverSide' => true,
                        'searchDelay' => 800,
                        'columns' => [
                            [
                                'data' => 'DT_RowIndex',
                                'name' => 'DT_RowIndex',
                                'orderable' => false,
                                'searchable' => false,
                                'width' => '50',
                            ],
                            ['data' => 'title', 'name' => 'title'],
                            [
                                'data' => 'custom_image',
                                'name' => 'custom_image',
                                'orderable' => false,
                                'searchable' => false,
                                'width' => 100,
                            ],
                            [
                                'data' => 'action',
                                'name' => 'action',
                                'orderable' => false,
                                'searchable' => false,
                                'width' => 150,
                            ],
                        ],
                        'order' => [],
                        'heads' => ['No', 'Judul', 'Gambar', 'Aksi'],
                    ];
                @endphp

                <x-adminlte-datatable
                    id="post"
                    :heads="$config['heads']"
                    head-theme=""
                    :config="$config"
                ></x-adminlte-datatable>
            </x-adminlte-card>
        </div>
    </div>

    <x-adminlte-modal id="deleteModal" title="Hapus Berita" theme="danger">
        <p>Apakah anda yakin ingin menghapus Berita ini?</p>
        <x-slot name="footerSlot">
            <form action="" method="POST" id="deleteForm">
                @method('DELETE')
                @csrf
            </form>
            <x-adminlte-button
                theme="danger"
                label="Hapus"
                class="btn-sm"
                data-dismiss="modal"
                onclick="$('#deleteForm').submit()"
            />
        </x-slot>
    </x-adminlte-modal>
</div>
@stop

@push('js')
    <script>
        function handleDelete(id) {
            $('#deleteModal').modal('show');
            $('#deleteForm').attr('action', '{{ route('post.index') }}/' + id);
        }
    </script>
@endpush
