@extends('layouts.app')


@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">


        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Add New Product===
                </div>
                <div class="float-end">


                    <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>


                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('products.store') }}" method="post">
                    @csrf


                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                id="name" name="name" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>


                    <div class="mb-3 row">


                        <label for="description"
                            class="col-md-4 col-form-label text-md-end text-start">Description</label>


                        <div class="col-md-6">
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>
                            @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif


                            <div class="mb-4 row">


                                <label for="jumlahstok"
                                    class="col-md-4 col-form-label text-md-end text-start">Jumlah Stok</label>


                                <div class="col-md-7">
                                    <textarea class="form-control @error('jumlah_stok') is-invalid @enderror" id="jumlah_stok" name="Jumlah_stok">{{ old('jumlah_stok') }}</textarea>
                                    @if ($errors->has('jumlah_stok'))
                                    <span class="text-danger">{{ $errors->first('jumlah_stok') }}</span>
                                    @endif
                                </div>
                            </div>


                            <div class="mb-3 row">
                                <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add Product">
                            </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection