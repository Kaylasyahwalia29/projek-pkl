@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Data Keranjang
                    <a href="{{ route('keranjang.index') }}" class="btn btn-sm btn-primary"
                        style="float: right">Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('keranjang.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                            <label for="id_produk">Name Produk</label>
                            <select name="id_produk" class="form-control @error('id_produk') is-invalid @enderror">
                                <option value="" disabled selected>Pilih produk</option>
                                @foreach ($produk as $data)
                                <option value="{{ $data->id }}">{{ $data->name_produk }}</option>
                                @endforeach
                            </select>
                            @error('id_produk')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="jumlah">Stok keranjang</label>
                            <input type="number" placeholder="jumlah"
                                class="form-control @error('jumlah') is-invalid @enderror" name="jumlah">
                            @error('jumlah')
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