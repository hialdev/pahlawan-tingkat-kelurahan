@extends('layout.app')
@section('section')
<div class="container mt-5 mb-5">
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
                    <h2>Tambah data Warga Baru</h2>
                    <form action="{{ route('warga.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="number" class="form-control @error('nik') is-invalid @enderror"
                                name="nik" value="{{ old('nik') }}" required>

                            <!-- error message untuk title -->
                            @error('nik')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                name="nama" value="{{ old('nama') }}" required>

                            <!-- error message untuk content -->
                            @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="lahir">Tanggal Lahir</label><br>
                            <input type="datetime-local" id="lahir" name="lahir" value="{{ old('lahir', date('Y-m-d')) }}"required>

                            <!-- error message untuk content -->
                            @error('lahir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea
                                name="alamat" id="alamat"
                                class="form-control @error('alamat') is-invalid @enderror"
                                rows="5"
                                required>{{ old('alamat') }}</textarea>

                            <!-- error message untuk content -->
                            @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-md btn-primary">Save</button>
                        <a href="{{ route('warga.index') }}" class="btn btn-md btn-secondary">back</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection