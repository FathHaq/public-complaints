@extends('layouts.mazer')

@section('title', 'Page List Complaints')
@section('page-heading', 'Page List Complaints')
@section('content')
    <section class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">List Pengaduan</h4>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('complaints.create') }}" class="btn btn-primary">Create</a>
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
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="text-bold-500">{{ $item->guest_name ?? $item->user->name }}</td>
                                            <td>{{ $item->guest_email ?? $item->user->email }}</td>
                                            <td>{{ $item->guest_telp ?? ($item->user->no_telp ?? 'Tidak ada nomor') }}</td>
                                            <td class="text-bold-500">{{ $item->title }}</td>
                                            <td><a href="{{ route('complaints.response.create', $item->id) }}"><i
                                                        class="badge-circle badge-circle-light-secondary font-medium-1"
                                                        data-feather="mail"></i></a></td>
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
