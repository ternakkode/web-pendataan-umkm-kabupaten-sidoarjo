@extends('layout.umkm')
@section('title', 'Ubah Poduk UMKM')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css"
    integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A=="
    crossorigin="anonymous" />
@endsection
@section('content')
<form method="POST" action="{{ url('app/umkm/produk/'.$produk->id) }}">
    @method('PUT')
    @csrf
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Ubah Produk UMKM</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" name="nama" id="form_nama"
                                    value="{{ $produk->nama }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="number" class="form-control" name="harga" id="form_harga"
                                    value="{{ $produk->harga }}">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" id="form_deskripsi"
                                    rows="3">{{ $produk->deskripsi }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <div class="row mb-4 product-image-wrapper">
                                    @foreach($produk->foto as $foto)
                                        <div class="col-md-3 mx-1">
                                            <img src="{{ product_image_link($foto->url) }}" class="img-thumbnail">
                                            <div class="produk-img-cta mt-2 text-center">
                                                @if(!$foto->foto_utama)
                                                <button type="button" class="btn btn-primary btn-sm d-inline btn-set-primary-image mr-1"
                                                 data-id="{{ $foto->id }}"
                                                 data-produk="{{ $produk->id }}"
                                                 >JADIKAN UTAMA</button>
                                                 @endif

                                                <button type="button" class="btn btn-danger btn-sm d-inline btn-delete-image" 
                                                data-id="{{ $foto->id }}"
                                                data-produk="{{ $produk->id }}"
                                                >HAPUS</button>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="needsclick dropzone" id="document-dropzone">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="navigation text-center">
                    <button type="submit" class="btn btn-success w-100 font-weight-bold">SIMPAN</button>
                </div>
            </div>
        </div>
</form>
@endsection
@section('js')
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"
    integrity="sha512-VQQXLthlZQO00P+uEu4mJ4G4OAgqTtKG1hri56kQY1DtdLeIqhKUp9W/lllDDu3uN3SnUNawpW7lBda8+dSi7w=="
    crossorigin="anonymous"></script>
<script>
    CKEDITOR.replace('deskripsi');
    let uploadedDocumentMap = {}
    Dropzone.options.documentDropzone = {
        url: '{{ url('api/umkm/produk/image/upload') }}',
        maxFilesize: 2, // MB
        addRemoveLinks: true,
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        success: function (file, response) {
            $('form').append('<input type="hidden" name="foto[]" value="' + response.name + '">')
            uploadedDocumentMap[file.name] = response.name
        },
        removedfile: function (file) {
            file.previewElement.remove()
            let name = ''
            if (typeof file.file_name !== 'undefined') {
                name = file.file_name
            } else {
                name = uploadedDocumentMap[file.name]
            }
            $('form').find('input[name="foto[]"][value="' + name + '"]').remove()
        }
    }

    function updateDomFoto(fotoProduks) {
        let html = '';
        fotoProduks.forEach(function (foto) {
            html += `<div class="col-md-3 mx-1">
                    <img src="/storage/images/product/${foto.url}" class="img-thumbnail">
                    <div class="produk-img-cta mt-2 text-center">`

            if (!foto.foto_utama) {
                html += `<button type="button" class="btn btn-primary btn-sm d-inline btn-set-primary-image mr-1"
                    data-id="${foto.id}"
                    data-produk="${foto.id_produk}"
                    >JADIKAN UTAMA</button>`;
            }

            html += `<button type="button" class="btn btn-danger btn-sm d-inline btn-delete-image" 
                    data-id="${foto.id}"
                    data-produk="${foto.id_produk}"
                    >HAPUS</button>
                    </div>
                    </div>`;
        });
        
        $('.product-image-wrapper').html(html);
    }

    $('.product-image-wrapper').on('click', '.btn-set-primary-image', function () {
        let idProduk = $(this).data('produk');
        let idFoto = $(this).data('id');

        $.ajax({
            type: 'PATCH',
            url: `/api/umkm/produk/${idProduk}/image/${idFoto}`,
            headers: {
                'X-CSRF-Token': "{{ csrf_token() }}"
            },
            success: function (response) {
                updateDomFoto(response);
            }
        })
    });

    $('.product-image-wrapper').on('click', '.btn-delete-image', function () {
        let idProduk = $(this).data('produk');
        let idFoto = $(this).data('id');

        $.ajax({
            type: 'DELETE',
            url: `/api/umkm/produk/${idProduk}/image/${idFoto}`,
            headers: {
                'X-CSRF-Token': "{{ csrf_token() }}"
            },
            success: function (response) {
                updateDomFoto(response);
            }
        })
    });
</script>
@endsection