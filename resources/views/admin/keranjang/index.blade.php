@extends('layouts.admin')
@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
@endsection

@section('content')
<h4 class="py-3 mb-4"><span style="color: white">Tables </span> Keranjang</h4>
<div class="card">
    <div class="card-header">
        <div class="float-start">
            <h5> Keranjang </h5>
        </div>
        <div class="float-end">
            <a href="{{route('keranjang.create')}}" class="btn btn-sm btn-primary">
                Add
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive text-nowrap">
            <table class="table" id="example">
                <thead>
                    <td>No</td>
                    <td>Name Produk</td>
                    <td>Jumlah</td>
                    <td>Action</td>
                </thead>
                @php $no = 1; @endphp
                <tbody>
                    @foreach ($keranjang as $item)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$item->produk->name_produk}}</td>
                        <td>{{$item->jumlah}}</td>
                        <td>
                            <form action="{{route('keranjang.destroy', $item->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <a href="{{route('keranjang.edit', $item->id)}}" class="btn btn-sm btn-success">Edit
                                </a>
                                <a href="{{route('keranjang.show', $item->id)}}" class="btn btn-sm btn-warning">Show
                                </a>
                                <a href="{{ route('keranjang.destroy', $item->id) }}" class="btn btn-sm btn btn-danger"
                                    data-confirm-delete="true">Delete</a>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
<script>
    new DataTable('#example');
</script>
@endpush