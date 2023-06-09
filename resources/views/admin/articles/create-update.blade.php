@extends('layouts.admin')

@section('title')
    {{ isset($article) ? "Makale Düzenle" : "Makale Ekle" }}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}" >
    <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-lite.min.css') }}" >
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            <h3>{{ isset($article) ? "Makale Düzenle" : "Makale Ekle" }}</h3>
        </div>
        <div class="card-body">
            <div class="example-container">
                <div class="example-content">
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif
                    <form 
                        action="{{ isset($article) ? route('admin.articles.edit', ['id' => $article->id]) : route('admin.articles.create') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <input type="text" class="form-control form-control-solid-bordered m-b-sm " placeholder="Makale Başlık" name="name" value="{{ isset($article) ? $article->name : '' }}" required>
                        @if($errors->has('name'))
                            <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                        @endif

                        <input type="text" class="form-control form-control-solid-bordered m-b-sm " placeholder="Makale Slug" name="slug" value="{{ isset($article) ? $article->slug : '' }}" required>
                        @if($errors->has('slug'))
                            <div class="alert alert-danger">{{ $errors->first('slug') }}</div>
                        @endif

                        <input type="text" class="form-control form-control-solid-bordered m-b-sm " placeholder="Etiketler" name="tags" value="{{ isset($article) ? $article->tags : '' }}" required>

                        <select class="form-select form-control" name="category_id">
                            <option value="{{ null }}">Kategori Seçimi</option>
                            @foreach($categories as $item)
                                <option value="{{ $item->id }}" value="{{ isset($article) && $article->category_id == $item->id ? 'selected' : '' }}" >
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                        <br>

                        <textarea name="body" id="summernote">İçerik</textarea>
                        <br>

                        <input type="text" class="form-control form-control-solid-bordered m-b-sm " placeholder="SEO Kelimeleri" name="seo_keywords" value="{{ isset($article) ? $article->seo_keywords : '' }}" required>
                        @if($errors->has('seo_keywords'))
                            <div class="alert alert-danger">{{ $errors->first('seo_keywords') }}</div>
                        @endif

                        <input type="text" class="form-control form-control-solid-bordered m-b-sm " placeholder="SEO Açıklaması" name="seo_description" value="{{ isset($article) ? $article->seo_description : '' }}" required>
                        @if($errors->has('seo_description'))
                            <div class="alert alert-danger">{{ $errors->first('seo_description') }}</div>
                        @endif

                        <input class="form-control flatpickr2" id="publish_date" name="publish_date" type="text" placeholder="Ne zaman yayınlansın?">
                        <br>

                        <input type="file" name="image" id="image" class="form-control" accept="image/png, image/jpeg, image/jpg">

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="status" value="1" id="status"  {{ isset($article) && $article->status ? 'checked' : '' }}>
                            <label class="form-check-label">Makale sitede görünsün mü?</label>
                        </div>


                        
                        <br>
                        <hr>
                        <button class="btn btn-outline-success">{{ isset($article) ? "Düzenle" : "Ekle" }}</button>

                    </form>


                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
<script>
    $("#publish_date").flatpickr({
        enableTime: true,
        dateFormat: "Y-m-d H:i"
    });
</script>

<script src="{{ asset('assets/js/pages/datepickers.js') }}"></script>
<script src="{{ asset('assets/plugins/flatpickr/flatpickr.js') }}"></script>
<script src="{{ asset('assets/plugins/summernote/summernote-lite.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/text-editor.js') }}"></script>
@endsection