@extends('layouts.mazer')

@section('title', 'List Response Complaints')
@section('page-heading', 'Page List Response Complaints')
@section('content')
    <section class="container">
        @if (session('errorMessage'))
            <div class="alert alert-danger" role="alert">{{ session('errorMessage') }}</div>
        @endif
        @if (session('successMessage'))
            <div class="alert alert-success" role="alert">{{ session('successMessage') }}</div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">List Pengaduan yang sudah di response</h4>
                    </div>
                    <div class="card-body">
                        <!-- table hover -->
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>NAME</th>
                                        <th>EMAIL</th>
                                        <th>NOMOR</th>
                                        <th>JUDUL PENGADUAN</th>
                                        {{-- <th>ACTION</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="text-bold-500">{{ $item->complaint?->guest_name ?? $item->complaint?->user?->name }}</td>
                                            <td>{{ $item->complaint?->guest_email ?? $item->complaint?->user?->email }}</td>
                                            <td>{{ $item->complaint?->guest_telp ?? ($item->complaint?->user?->no_telp ?? 'Tidak ada nomor') }}</td>
                                            <td class="text-bold-500">{{ $item->complaint?->title }}</td>
                                            {{-- <td><a href="{{ route('complaints.response.create', $item->id) }}"><i
                                                        class="badge-circle badge-circle-light-secondary font-medium-1"
                                                        data-feather="mail"></i></a></td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
