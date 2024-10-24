@extends('layouts.mazer')

@section('title', 'Page Create Complaints')
@section('page-heading', 'Create Complaints')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Pengaduan</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('complaints.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Pelapor</label>
                            <input type="text" class="form-control" id="nama" placeholder="Masukan Nama Anda"
                                name="guest_name">
                        </div>
                        @error('guest_name')<span class="text-danger">{{ $message }}</span>@enderror
                        <x-inputs.basic-input label="Email Pelapor" id="email" placeholder="Masukan Email"
                            name="guest_email" />
                        @error('guest_email')<span class="text-danger">{{ $message }}</span>@enderror
                        <x-inputs.basic-input label="Nomor Pelapor" id="no_telp" placeholder="Masukan Nomor Telepon"
                            name="guest_telp" />
                        @error('guest_telp')<span class="text-danger">{{ $message }}</span>@enderror
                        <x-inputs.basic-input type="file" label="Photo complaint" id="photo" placeholder="Masukan Gambar Komplain-nya"
                            name="image" />
                        @error('image')<span class="text-danger">{{ $message }}</span>@enderror
                        <x-inputs.basic-input label="Judul Pengaduan" id="title" placeholder="Masukan Judul"
                            name="title" />
                        @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                        <x-inputs.textarea label="Deskripsi" id="desc" name="description"></x-inputs.textarea>
                        @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                        <br>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
