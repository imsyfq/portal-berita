@extends('layouts.admin-dashboard')

{{-- Customize layout sections --}}
@section('subtitle', 'Berita')

@section('content_header_title', 'Semua Berita')
@section('content_header_subtitle', 'Tambah')

{{-- Plugins --}}
@section('plugins.Summernote', true)
@section('plugins.BsCustomFileInput', true)
@section('plugins.Select2', true)
{{-- End Plugins --}}

{{-- Content body: main page content --}}
@section('content_body')
<div class="container">
    <div class="row">
        <div class="col-12">
            <x-adminlte-card>
                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <x-adminlte-input name="title" label="Judul" placeholder="Judul" />

                    <div class="mb-3">
                        <x-adminlte-input-file
                            name="image"
                            label="Gambar"
                            placeholder="Choose a file..."
                            accept="image/*"
                            id="imageInput"
                        />
                        <img
                            id="preview"
                            src=""
                            class="d-none img-fluid"
                            style="max-height: 500px"
                            alt="Gambar Berita"
                        />
                    </div>

                    @php
                        $config = [
                            'placeholder' => 'Select multiple options...',
                            'allowClear' => true,
                        ];
                    @endphp

                    <x-adminlte-select2
                        id="sel2Category"
                        name="category_ids[]"
                        label="Kategori"
                        igroup-size="sm"
                        :config="$config"
                        multiple
                    >
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </x-adminlte-select2>

                    @php
                        $config = [
                            'id' => 'summernote',
                            'name' => 'content',
                            'height' => 300,
                            'toolbar' => [
                                'style',
                                ['style', ['bold', 'italic', 'underline', 'clear']],
                                ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                                ['fontsize', ['fontsize']],
                                ['color', ['color']],
                                ['para', ['ul', 'ol', 'paragraph']],
                                ['height', ['height']],
                                ['table', ['table']],
                                ['insert', ['link', 'picture', 'video']],
                                ['view', ['fullscreen', 'codeview']],
                                ['help', ['help']],
                            ],
                        ];
                    @endphp
                    <x-adminlte-text-editor :config="$config" name="content" label="Isi Berita" />

                    <x-adminlte-button type="submit" label="Simpan" class="btn-sm" theme="primary" />
                </form>
            </x-adminlte-card>
        </div>
    </div>
</div>
@stop

@push('js')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
                $('#preview').removeClass('d-none');
            } else {
                $('#preview').addClas('d-none');
            }
        }

        $(document).ready(function () {
            $('#imageInput').on('change', function () {
                const fileName = $(this).val().split('\\').pop();
                $('#preview').attr('alt', fileName);

                readURL(this);
            });
        });
    </script>
@endpush
