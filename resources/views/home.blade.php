@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
                    <a class="btn btn-danger" href="{{ route('roles.index') }}">
                        <i class="bi bi-person-fill-gear"></i> Kelola Roles</a>
                    @endcanany

                    @canany(['create-user', 'edit-user', 'delete-user'])
                    <a class="btn btn-primary" href="{{ route('users.index') }}">
                        <i class="bi bi-people"></i> Kelola Users</a>
                    @endcanany

                    @canany(['create-product', 'edit-product', 'delete-product'])
                    <a class="btn btn-dark" href="{{ route('products.index') }}">
                        <i class="bi bi-bag"></i> Kelola Produk</a>
                    @endcanany
                    <p>&nbsp;</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Informasi Pengguna') }}</div>
                <div class="card-body">
                    <h5>Status Pengguna</h5>
                    <p>Nama Pengguna : {{ Auth::user()->name ?? 'Status tidak tersedia' }} <br>
                        Role : {{ $role->name ?? 'Tidak ada role' }} <br>
                        Email : {{ Auth::user()->email ?? 'email tidak tersedia' }} <br>
                        Perizinan :
                        @if ($role && $role->name == 'Super Admin')
                        <span class="badge bg-primary">All</span>
                        @else
                        @if ($rolePermissions->isEmpty())
                        <span>Tidak ada perizinan</span>
                        @else
                        @foreach ($rolePermissions as $permission)
                        <span class="badge bg-primary">{{ $permission->name }}</span>
                        @endforeach
                        @endif
                        @endif
                    </p>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection