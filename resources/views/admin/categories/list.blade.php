@extends('layouts.admin')

@section('title')
    Kategori Listesi
@endsection

@section('css')
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            <h3>Kategori Listesi</h3>
            <a href=" {{ route('admin.categories.create') }} " class="btn btn-outline-primary">Yeni Ekle</a>
            <br><br>
        </div>
        <div class="card-body">

            <form action="">
                <div class="row">
                    <div class="col-3 my-1">
                        <input type="text" class="form-control" placeholder="Kategori Adı" name="name" value="{{ request()->get('name') }}">
                    </div>
                    <div class="col-3 my-1">
                        <input type="text" class="form-control" placeholder="Slug" name="slug" value="{{ request()->get('slug') }}">
                    </div>
                    <div class="col-3 my-1">
                        <input type="text" class="form-control" placeholder="Açıklama" name="description" value="{{ request()->get('description') }}">
                    </div>
                    <div class="col-3 my-1">
                        <input type="text" class="form-control" placeholder="Sıralama" name="order" value="{{ request()->get('order') }}">
                    </div>
                    <div class="col-3 my-1">
                        <select class="form-select" name="parent_id">
                            <option value="{{ null }}">Üst Kategori</option>
                            @foreach($parentCategories as $parent)
                                <option value="{{ $parent->id }}"  {{ request()->get('parent_id') == $parent->id ? "selected" : "" }} >{{ $parent->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3 my-1">
                        <select class="form-select" name="status">
                            <option selected>Durum</option>
                            <option value="0" {{ request()->get('status') == 0 ? "selected" : "" }} >Pasif</option>
                            <option value="1" {{ request()->get('status') == 1 ? "selected" : "" }} >Aktif</option>
                        </select>
                    </div>
                    <div class="col-3 my-1">
                        <select class="form-select" name="feature_status">
                            <option selected>Feature Durum</option>
                            <option value="0" {{ request()->get('feature_status') == 0 ? "selected" : "" }} >Pasif</option>
                            <option value="1" {{ request()->get('feature_status') == 1 ? "selected" : "" }} >Aktif</option>
                        </select>
                    </div>
                </div>
                <hr>
                <div class="mx-auto mb-2">
                    <button class="btn btn-primary" type="submit">Filtrele</button>
                    <button class="btn btn-primary" type="submit">Temizle</button>
                </div>
                
            </form>

            <br>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
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
                                    <a href="javascript:void(0)" data-id="{{$item->id}}" class="btn btn-outline-success btnChangeStatus">Aktif</a>
                                @else
                                    <a href="javascript:void(0)" data-id="{{$item->id}}" class="btn btn-outline-danger btnChangeStatus">Pasif</a>
                                @endif

                            </td>
                            <td>
                                @if($item->feature_status)
                                    <a href="javascript:void(0)" data-id="{{$item->id}}" class="btn btn-outline-success btnChangeFeatureStatus">Aktif</a>
                                @else
                                    <a href="javascript:void(0)" data-id="{{$item->id}}" class="btn btn-outline-danger btnChangeFeatureStatus">Pasif</a>
                                @endif

                            </td>
                            <td>{{$item->order}}</td>
                            <td>
                                <span>
                                    <a href="{{ route('admin.categories.edit', ['id' => $item->id ]) }}" class=""><i class="material-icons ms-0">edit</i></a>
                                    <a href="javascript:void(0)" data-name="{{$item->name}}" data-id="{{$item->id}}" class="btnDelete"><i class="material-icons ms-0">delete</i></a>
                                </span>
                            </td>
                        </tr>

                    @endforeach

                </table>

                {{ $list->appends(request()->all())->links() }}
            </div>
        </div>
    </div>


    <form action="" method="POST" id="statusChange">
        @csrf
        <input type="hidden" name="id" id="inputStatus" value="">
    </form>

@endsection

@section('js')
    <script>
        $(document).ready(function (){
            
            $('.btnChangeStatus').click(function(){
                let categoryID = $(this).data('id');
                $('#inputStatus').val(categoryID);

                Swal.fire({
                    title: 'Durumunu değiştirmek istediğine emin misin?',
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Evet',
                    denyButtonText: `Hayır`,
                    cancelButtonText: 'İptal',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#statusChange').attr("action", "{{ route('admin.categories.changeStatus') }}");
                        $('#statusChange').submit();
                    } else if (result.isDenied) {
                        Swal.fire('İşlemden vazgeçildi.', '', 'info')
                    }
                });
                
            });

            $('.btnChangeFeatureStatus').click(function() {
                let categoryID = $(this).data('id');
                $('#inputStatus').val(categoryID);

                Swal.fire({
                    title: 'Feature durumunu değiştirmek istediğine emin misin?',
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Evet',
                    denyButtonText: `Hayır`,
                    cancelButtonText: 'İptal',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#statusChange').attr("action", "{{ route('admin.categories.changeFeatureStatus') }}");
                        $('#statusChange').submit();
                    } else if (result.isDenied) {
                        Swal.fire('İşlemden vazgeçildi.', '', 'info')
                    }
                });
            });

            $('.btnDelete').click(function() {
                let categoryID = $(this).data('id');
                let categoryName = $(this).data('name');
                $('#inputStatus').val(categoryID);

                Swal.fire({
                    title: categoryName + ' kategorisini silmek istediğine emin misin?',
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Evet',
                    denyButtonText: `Hayır`,
                    cancelButtonText: 'İptal',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#statusChange').attr("action", "{{ route('admin.categories.delete') }}");
                        $('#statusChange').submit();
                    } else if (result.isDenied) {
                        Swal.fire('İşlemden vazgeçildi.', '', 'info')
                    }
                });
            });
        });
    </script>
@endsection