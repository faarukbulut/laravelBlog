@extends('layouts.admin')

@section('title')
    {{ isset($category) ? "Kategori Düzenle" : "Kategori Ekle" }}
@endsection

@section('css')
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            <h3>{{ isset($category) ? "Kategori Düzenle" : "Kategori Ekle" }}</h3>
        </div>
        <div class="card-body">
            <div class="example-container">
                <div class="example-content">
                    <form action="{{ isset($category) ? route('admin.categories.edit', ['id' => $category->id]) : route('admin.categories.create') }}" method="post">
                        @csrf
                        <input type="text" class="form-control form-control-solid-bordered m-b-sm " placeholder="Kategori Adı" name="name" value="{{ isset($category) ? $category->name : '' }}" required>
                        @if($errors->has('name'))
                            <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                        @endif

                        <input type="text" class="form-control form-control-solid-bordered m-b-sm " placeholder="Kategori Slug" name="slug" value="{{ isset($category) ? $category->slug : '' }}" required>
                        @if($errors->has('slug'))
                            <div class="alert alert-danger">{{ $errors->first('slug') }}</div>
                        @endif

                        <textarea cols="30" rows="5" class="form-control form-control-solid-bordered m-b-sm " placeholder="Açıklama" name="description" required>{{ isset($category) ? $category->description : "" }}</textarea>
                        @if($errors->has('description'))
                            <div class="alert alert-danger">{{ $errors->first('description') }}</div>
                        @endif

                        <input type="number" class="form-control form-control-solid-bordered m-b-sm " placeholder="Sıralama" name="order" value="{{ isset($category) ? $category->order : '' }}" required>

                        <select class="form-select form-control">
                            <option value="{{ null }}">Üst Kategori Seçimi</option>
                            @foreach($categories as $item)
                                <option value="{{ $item->id }}" value="{{ isset($category) && $category->id == $item->id ? 'selected' : '' }}" >
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                        <br>

                        <input type="text" class="form-control form-control-solid-bordered m-b-sm " placeholder="SEO Kelimeleri" name="seo_keywords" value="{{ isset($category) ? $category->seo_keywords : '' }}" required>
                        @if($errors->has('seo_keywords'))
                            <div class="alert alert-danger">{{ $errors->first('seo_keywords') }}</div>
                        @endif

                        <input type="text" class="form-control form-control-solid-bordered m-b-sm " placeholder="SEO Açıklaması" name="seo_description" value="{{ isset($category) ? $category->seo_description : '' }}" required>
                        @if($errors->has('seo_description'))
                            <div class="alert alert-danger">{{ $errors->first('seo_description') }}</div>
                        @endif

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="status" value="1" id="status"  {{ isset($category) && $category->status ? 'checked' : '' }}>
                            <label class="form-check-label">Kategori sitede görünsün mü?</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="feature_status" value="1" id="feature_status" {{ isset($category) && $category->feature_status ? 'checked' : '' }}>
                            <label class="form-check-label">Kategori anasayfada öne çıkarılsın mı?</label>
                        </div>

                        <br>
                        <hr>
                        <button class="btn btn-outline-success">{{ isset($category) ? "Düzenle" : "Ekle" }}</button>

                    </form>


                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')

@endsection