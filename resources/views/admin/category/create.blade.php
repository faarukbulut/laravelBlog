<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<br>

<div class="container">

    <form action="{{route('admin.category.create')}}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Category Name</label>
            <input type="text" class="form-control" name="name" id="name">
            <br>
            @if($errors->has('name'))
                <div class="alert alert-danger">{{$errors->first('name')}}</div> 
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Slug Name</label>
            <input type="text" class="form-control" name="slug" id="slug">
            <br>
            @if($errors->has('slug'))
                <div class="alert alert-danger">{{$errors->first('slug')}}</div> 
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Description Area</label>
            <input type="text" class="form-control" name="description" id="description">
        </div>

        <div class="mb-3">
            <label class="form-label">Parent Category</label>
            <select class="form-select" name="parentCategory" id="parentCategory">
                <option selected value="{{null}}">Parent Category Select</option>
                @foreach($parentCategories as $parentValues)
                    <option value="{{ $parentValues->id }}">{{ $parentValues->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <input class="form-check-input" type="checkbox" checked="false" id="status" name="status">
        </div>

        <div class="mb-3">
            <label class="form-label">Feature Status</label>
            <input class="form-check-input" type="checkbox" checked="false" id="feature_status" name="feature_status">
        </div>

        <div class="mb-3">
            <label class="form-label">Order</label>
            <input type="text" class="form-control" name="order" id="order">
            <br>
            @if($errors->has('order'))
                <div class="alert alert-danger">{{$errors->first('order')}}</div> 
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">SEO Keywords</label>
            <input type="text" class="form-control" name="seo_keywords" id="seo_keywords">
        </div>

        <div class="mb-3">
            <label class="form-label">SEO Description</label>
            <input type="text" class="form-control" name="seo_description" id="seo_description">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>