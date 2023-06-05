<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<br>

<div class="container">

    <a href="category-create" class="btn btn-outline-primary">Yeni Kategori Ekle</a>
    <br><br>

    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Slug</th>
            <th>Description</th>
            <th>Parent Category</th>
            <th>Status</th>
            <th>Feature Status</th>
            <th>Order</th>
            <th>Actions</th>
        </tr>
        @foreach($list as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->slug}}</td>
            <td>{{substr($item->description,0,20)}}</td>
            <td>
                @if($item->parentCategory)
                    {{$item->parentCategory->name}}
                @else
                    -
                @endif
            </td>
            <td>
                @if($item->status)
                    <a href="javascript:void(0)" data-id="{{$item->id}}" class="btn btn-outline-success changeStatus">Active</a>
                @else
                    <a href="javascript:void(0)" data-id="{{$item->id}}" class="btn btn-outline-danger changeStatus">Passive</a>
                @endif

            </td>
            <td>
                @if($item->feature_status)
                    <a href="javascript:void(0)" data-id="{{$item->id}}" class="btn btn-outline-success changeFeatureStatus">Active</a>
                @else
                    <a href="javascript:void(0)" data-id="{{$item->id}}" class="btn btn-outline-danger changeFeatureStatus">Passive</a>
                @endif

            </td>
            <td>{{$item->order}}</td>
            <td>
                <span>
                    <a href="javascript:void(0)" data-id="{{$item->id}}" class="btn btn-outline-success editCategory">Düzenle</a>
                    <a href="javascript:void(0)" data-id="{{$item->id}}" class="btn btn-outline-success deleteCategory">Sil</a>
                </span>
            </td>
        </tr>
        @endforeach
    </table>
</div>