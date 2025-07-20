@extends('layouts.dashboard')

@section('title')
    Konfigurasi Halaman Website
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <i class="fas fa-pen-alt    "></i> Update
                            </span>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <form method="POST" action="{{ route('backend.configs.update', $config->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Judul Utama:</label>
                                        <textarea class="form-control" name="title" cols="30" rows="3">{{ $config->title }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Selogan:</label>
                                        <textarea class="form-control" name="subtitle" cols="30" rows="3">{{ $config->subtitle }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Alamat:</label>
                                        <textarea class="form-control" name="address" cols="30" rows="3">{{ $config->address }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Handphone:</label>
                                        <input type="tel" class="form-control" name="mobile"
                                            value="{{ $config->mobile }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email:</label>
                                        <input type="email" class="form-control" name="email"
                                            value="{{ $config->email }}">
                                        <small class="text-muted">contoh: mail@mail.com</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Facebook:</label>
                                        <input type="text" class="form-control" name="facebook"
                                            value="{{ $config->facebook }}">
                                        <small class="text-muted">contoh: https://facebook.com/tokosaya</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Youtube:</label>
                                        <input type="text" class="form-control" name="youtube"
                                            value="{{ $config->youtube }}">
                                        <small class="text-muted">contoh: https://youtube.com/@tokosaya</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Instagram:</label>
                                        <input type="text" class="form-control" name="instagram"
                                            value="{{ $config->instagram }}">
                                        <small class="text-muted">contoh: https://instagram.com/tokosaya</small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Mengapa Harus Memilih Kami:</label>
                                        <textarea class="form-control" name="why" cols="30" rows="3">{{ $config->why }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-check-circle" aria-hidden="true"></i> Simpan Perubahan
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
