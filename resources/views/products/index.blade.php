@extends('layouts.app')


@section('content')
<div class="card">
    <div class="card-header">Daftar Produk</div>
    <div class="card-body">
        @can('create-product')
        <a href="{{ route('products.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Tambah Produk</a>
        @endcan
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>


                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Jumlah Stok</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->jumlah_stok }}</td>

                    <td>
                        <form action="{{ route('products.destroy', $product->id) }}" method="post">
                            @csrf
                            @method('DELETE')


                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-warning btn-sm"><i
                                    class="bi bi-eye"></i> Lihat</a>


                            @can('edit-product')
                            <a href="{{ route(
                                            'products.edit',
                                       
                                            $product->id,
                                        ) }}" class="btn btn-primary btn-sm"><i
                                    class="bi bi-pencil-square"></i> Edit</a>
                            @endcan


                            @can('delete-product')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Do you want to delete this product?');"><i
                                    class="bi bi-trash"></i> Hapus</button>
                            @endcan
                        </form>
                    </td>
                </tr>
                @empty
                <td colspan="4">
                    <span class="text-danger">
                        <strong>Produk tidak ditemukan!</strong>
                    </span>
                </td>
                @endforelse
            </tbody>
        </table>


        {{ $products->links() }}


    </div>
</div>
@endsection