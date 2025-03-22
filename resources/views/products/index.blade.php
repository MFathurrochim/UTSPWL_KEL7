@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Daftar Produk</div>
    <div class="card-body">
        @can('create-product')
        <a href="{{ route('products.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Tambah Produk</a>
        @endcan
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <div class="table-container" style="max-height: 500px; overflow-y: auto; border: 1px solid #dee2e6; border-radius: 4px;">
            <table class="table table-striped table-bordered mb-0">
                <thead>
                    <tr>
                        <th scope="col" style="width: 5%; position: sticky; top: 0; background-color: white; z-index: 10;">No</th>
                        <th scope="col" style="width: 20%; position: sticky; top: 0; background-color: white; z-index: 10;">Nama</th>
                        <th scope="col" style="width: 30%; position: sticky; top: 0; background-color: white; z-index: 10;">Deskripsi</th>
                        <th scope="col" style="width: 15%; position: sticky; top: 0; background-color: white; z-index: 10;">Jumlah Stok</th>
                        <th scope="col" style="width: 30%; position: sticky; top: 0; background-color: white; z-index: 10;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $key => $product)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->jumlah_stok }}</td>
                        <td>
                            <form action="{{ route('products.destroy', $product->id) }}" method="post">
                                @csrf
                                @method('DELETE')

                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-eye"></i> Lihat
                                </a>

                                @can('edit-product')
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                @endcan

                                @can('delete-product')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Do you want to delete this product?');">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                                @endcan
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">
                            <span class="text-danger">
                                <strong>Produk tidak ditemukan!</strong>
                            </span>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-2 text-muted">
            <small>Menampilkan total {{ count($products) }} produk</small>
        </div>
    </div>
</div>

<style>
    /* Memperbaiki tampilan header saat scroll */
    .table-container thead th {
        position: sticky;
        top: 0;
        background-color: white;
        z-index: 10;
        border-top: none;
    }

    /* Tambahkan sedikit shadow untuk header */
    .table-container thead th::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100%;
        border-bottom: 2px solid #dee2e6;
    }

    /* Pastikan tabel mengambil lebar penuh container */
    .table-container table {
        width: 100%;
    }

    /* Responsiveness */
    @media (max-width: 768px) {
        .table-container {
            max-height: 400px;
        }
    }
</style>
@endsection