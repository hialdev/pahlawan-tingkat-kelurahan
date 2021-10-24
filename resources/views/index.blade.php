@extends('layout.app')
@section('section')
<div class="container mt-5">
    <h1>Data Warga yang Akan Dinobatkan Menjadi Pahlawan Tingkat Kelurahan</h1>
    <div class="row">
        <div class="col-md-12">

            <!-- Notifikasi menggunakan flash session data -->
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if (session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
            @endif

            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <a href="{{ route('warga.create') }}" class="btn btn-md btn-success mb-3 float-right">New
                        Warga</a>

                    <table class="table table-bordered mt-1">
                        <thead>
                            <tr>
                                <th scope="col">NIK</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Tanggal Lahir</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($wargas as $warga)
                            <tr>
                                <td>{{ $warga->nik }}</td>
                                <td>{{ $warga->nama }}</td>
                                <td>{{ $warga->lahir }}</td>
                                <td>{{ $warga->alamat }}</td>
                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                        action="{{ route('warga.destroy', $warga->id) }}" method="POST">
                                        <a href="{{ route('warga.edit', $warga->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center text-mute" colspan="4">Data warga tidak tersedia</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection