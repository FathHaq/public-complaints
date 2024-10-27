@extends('layouts.mazer')

@section('title', 'Create Response Complaints')
@section('page-heading', 'Page Create Response Complaints')
@section('content')
    <div class="container">
        @if (session('errorMessage'))
            <div class="alert alert-danger" role="alert">{{ session('errorMessage') }}</div>
        @endif
        @if (session('successMessage'))
            <div class="alert alert-success" role="alert">{{ session('successMessage') }}</div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Detail Complaint</div>
                    <div class="card-body">

                        <div class="bg-secondary opacity-75 w-100 mb-2 rounded-3 d-flex justify-content-center align-items-center" style="height: 200px">
                            @if ($data->image)
                            <img src="{{ asset("storage/".$data->image) }}" alt="" style="height: 200px">
                            @else
                            <span class="text-warning">Tidak ada Gambar</span>
                            @endif
                        </div>
                        <x-inputs.basic-input label="Nama Pengadu" id="name" disabled="true" value="{{ $data->guest_name ?? $data->user->name }}"/>
                        <x-inputs.basic-input label="Email Pengadu" id="email" disabled="true" value="{{ $data->guest_email ?? $data->user->email }}"/>
                        <x-inputs.basic-input label="Nomor Pengadu" id="no_telp" disabled="true" value="{{ $data->guest_telp ?? $data->user->no_telp ?? 'Tidak ada nomor' }}"/>
                        <x-inputs.basic-input label="Judul Pengaduan" id="title" disabled="true" value="{{ $data->title }}"/>
                        <x-inputs.textarea label="Deskripsi Pengaduan" id="desc" disabled="true">{{ $data->description }}</x-inputs.textarea>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Response Pengaduan</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('complaints.response.store', $data->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <x-inputs.textarea label="Response Text" id="desc" name="response"></x-inputs.textarea>
                            @error('response')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <x-inputs.basic-input type="file" label="Photo response" id="image"
                                placeholder="Masukan Gambar Response-nya" name="image" />
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <br>
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
