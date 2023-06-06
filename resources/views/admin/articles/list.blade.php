@extends('layouts.admin')

@section('title')
    Dashboard
@endsection

@section('css')
@endsection

@section('content')
<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Makale Listesi</h1>
            <br>
            <a href=" {{ route('admin.articles.create') }} " class="btn btn-outline-primary">Yeni Ekle</a>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection