{{-- asad --}}
@extends('layouts.admin-dashboard')

{{-- Customize layout sections --}}
{{-- @section('title', 'Kategori') --}}
@section('subtitle', 'Kategori')

@section('content_header_title', 'Semua Kategori')
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
                        <a href="{{ route('category.create') }}" class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-plus"></i>
                            Tambah</a>
                    </x-slot>

                    @php
                        $config = [
                            'ajax' => route('category.index'),
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
                                ['data' => 'name', 'name' => 'name'],
                                [
                                    'data' => 'action',
                                    'name' => 'action',
                                    'orderable' => false,
                                    'searchable' => false,
                                    'width' => 150,
                                ],
                            ],
                            'order' => [],
                            'heads' => ['No', 'Name', 'Aksi'],
                        ];
                    @endphp
                    <x-adminlte-datatable id="category" :heads="$config['heads']" head-theme="" :config="$config">
                    </x-adminlte-datatable>
                </x-adminlte-card>
            </div>
        </div>

        <x-adminlte-modal id="deleteModal" title="Hapus Kategori" theme="danger">
            <p>Apakah anda yakin ingin menghapus kategori ini?</p>
            <x-slot name="footerSlot">
                <form action="" method="POST" id="deleteForm">
                    @method('DELETE')
                    @csrf
                </form>
                <x-adminlte-button theme="danger" label="Hapus" class="btn-sm" data-dismiss="modal"
                    onclick="$('#deleteForm').submit()" />
            </x-slot>
        </x-adminlte-modal>
    </div>
@stop

@push('js')
    <script>
        function handleDelete(id) {
            $('#deleteModal').modal('show');
            $('#deleteForm').attr('action', '{{ route('category.index') }}/' + id);
        }
    </script>
@endpush
