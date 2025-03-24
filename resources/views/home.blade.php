@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>


                <div class="card-body ">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif


                    {{ __('kamu berhasil masuk!') }}


                    <p>Selamat datang {{ Auth::user()->name }} sebagai {{ $role->name ?? 'Tidak ada role' }} di dashboard Aplikasi.</p>

                    @canany(['create-role', 'edit-role', 'delete-role'])
                    <a class="btn btn-primary" href="{{ route('roles.index') }}">


                        <i class="bi bi-person-fill-gear"></i> Kelola Roles</a>
                    @endcanany
                    @canany(['create-user', 'edit-user', 'delete-user'])
                    <a class="btn btn-success" href="{{ route('users.index') }}">
                        <i class="bi bi-people"></i> Kelola Users</a>
                    @endcanany


                    @canany([
                    'create-product',
                    'edit-product',
                    'delete-
                    product',
                    ])
                    <a class="btn btn-warning text" href="{{ route('products.index') }}">
                        <i class="bi bi-bag"></i> Kelola Produk</a>
                    @endcanany
                    <p>&nbsp;</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection