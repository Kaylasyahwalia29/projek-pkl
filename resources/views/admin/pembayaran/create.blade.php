@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Data pembayaran
                    <a href="{{ route('pembayaran.index') }}" class="btn btn-sm btn-primary"
                        style="float: right">Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('pembayaran.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                            <label for="alamat">Alamat</label>
                            <input type="text" placeholder="Judul pembayaran"
                                class="form-control @error('alamat') is-invalid @enderror" name="alamat">
                            @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="id_keranjang">Jumlah</label>
                            <select name="id_keranjang" class="form-control @error('id_keranjang') is-invalid @enderror">
                                <option value="" disabled selected>Pilih keranjang</option>
                                @foreach ($keranjang as $data)
                                <option value="{{ $data->id }}">{{ $data->jumlah }}</option>
                                @endforeach
                            </select>
                            @error('id_keranjang')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="id_method">Method</label>
                            <select name="id_method" class="form-control @error('id_method') is-invalid @enderror">
                                <option value="" disabled selected>Pilih keranjang</option>
                                @foreach ($method as $data)
                                <option value="{{ $data->id }}">{{ $data->name_method }}</option>
                                @endforeach
                            </select>
                            @error('id_method')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <button class="btn btn-sm btn-success" type="submit">Simpan</button>
                            <button class="btn btn-sm btn-warning" type="reset">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection