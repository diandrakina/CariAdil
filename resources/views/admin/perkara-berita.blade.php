@extends('components/admin-layout')

@section('title', 'Buat Berita Perkara')

@section('content')
    <div class="form-area">
        <h6 style="font-weight: bold">Perkara Berlangsung</h6>
        <p style="font-size: 0.75rem">Buat berita mengenai perkara yang sedang berlangsung</p>

          <div class="mb-3">
            <label for="judulKasus" class="form-label">Judul</label>
            <input type="text" class="form-control" id="judulKasus">
          </div>
          <div class="mb-3">
            <label for="gambarKasus" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="gambarKasus">
          </div>
          <div class="mb-3">
            <label for="isiKasus" class="form-label">Isi</label>
            <textarea class="form-control" id="isiKasus" rows="15"></textarea>
          </div>

          <button class="btn btn-outline-info" type="button">Create</button>
    </div>

@endsection