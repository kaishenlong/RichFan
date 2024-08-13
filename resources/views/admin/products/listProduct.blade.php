@extends('admin.layouts.default')

@section('title')
    @parent
    Danh sách sản phẩm
@endsection


@push('style')

@endpush

@section('content')
<div class="d-flex">
                    <div id="kt_app_content_container" class="app-container container-fluid">
                        @if (session('message'))
                            <div class="alert alert-primary" role="alert">
                                {{session('message')}}
                            </div>
                        @endif
                        
                        <div class="col-xl-12 mb-5 mb-xl-10">
                            <div class="card card-flush h-xl-100">
                                <div class="card-header pt-5 w-100">
                                    <div class="d-flex justify-content-between mb-10 w-100">
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label fw-bold text-gray-800">
                                                Quản lý sản phẩm
                                            </span>
                                        </h3>
                                        <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#addProduct">Thêm Mới</a>
                                    </div>
                                </div>

                                <div class="card-body pt-2">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="kt_stats_widget_16_tab_1">
                                            <div class="table-responsive">
                                                <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                                                    <thead>
                                                        <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                                            <th class="p-0 pb-3 min-w-100px">
                                                                STT
                                                            </th>
                                                            <th class="p-0 pb-3 min-w-100px pe-13">
                                                                Category 
                                                            </th>
                                                            <th class="p-0 pb-3 min-w-100px pe-13">
                                                                Name 
                                                            </th>
                                                            <th class="p-0 pb-3 w-150px pe-7">
                                                                Price
                                                            </th>
                                                            <th class="p-0 pb-3 w-150px pe-7">
                                                                Description
                                                            </th>
                                                            <th class="p-0 pb-3 w-150px pe-7">
                                                                Image
                                                            </th>
                                                            <th class="p-0 pb-3 w-100px">ACTIONS</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($listProduct as $key => $value)
                                                        <tr>
                                                            <td>{{$key +1}}</td>
                                                            <td>{{$value -> category->name}}</td>
                                                            <td>{{$value -> name}}</td>
                                                            <td>{{number_format($value -> price)}}vnd</td>
                                                            <td>{{$value->description}}</td>  
                                                            <td>
                                                                @foreach ( $value ->ProductImage as $image )
                                                                <img src="{{asset($image->image_url)}}" width="100px" height="70px" alt="">
                                                                @endforeach
                                                                
                                                            </td>  
                                                            <td>
                                                                <button data-id="{{$value->id}}" class="btn btn-warning"  data-bs-toggle="modal" 
                                                                     data-bs-target="#modalEdit">Sửa</button>
                                                                <button data-bs-id="{{$value->id}}" class="btn btn-danger"  data-bs-toggle="modal"
                                                                     data-bs-target="#modelDelete">Xóa</button>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
</div>


        <!-- Modal addProduct-->
<div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="addProductLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addProductLabel">Thêm mới Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div> 
      <form action="{{route('admin.product.addProduct')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
        <div class="mt-3">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id" class="form-control">
                    <option value="">Select Category</option>
                    @foreach ($listCategory as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-3">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-3">
                <label for="price">Price</label>
                <input type="price" name="price" id="price" class="form-control">
                @error('price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-3">
            <label for="description">Description</label>
            <input type="description" name="description" id="description" class="form-control">
                @error('description')
                        <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="imageProduct" class="form-label">Image</label>
                <input class="form-control"  type="file" id="imageProduct" multiple
                 name="imageProduct[]" >
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
            <button type="submit" class="btn btn-primary">Thêm mới</button>
        </div>
      </form>
    </div>
  </div>
</div>

    <!-- Modal modalEdit-->
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditLabel">Chỉnh sửa Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div> 
      <form action="{{route('admin.product.updateProduct')}}" method="post" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="modal-body">
            <input type="hidden"  value="" id="idProduct" name="idProduct">
            <div class="mt-3">
                <label for="category_idProduct">Category</label>
                <select name="category_id" id="category_idProduct" class="form-control">
                    <option value="">Select Category</option>
                    @foreach ($listCategory as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-3">
                <label for="nameProduct">Name</label>
                <input type="text" name="name" id="nameProduct" class="form-control">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-3">
                <label for="priceProduct">Price</label>
                <input type="price" name="price" id="priceProduct" class="form-control">
                @error('price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-3">
            <label for="descriptionProduct">Description</label>
            <input type="description" name="description" id="descriptionProduct" class="form-control">
                @error('description')
                        <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input class="form-control"  type="file" id="imageProduct" multiple
                name="imageProduct[]" >
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
            <button type="submit" class="btn btn-primary">Lưu lại</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal modelDelete -->
<div class="modal fade" id="modelDelete" tabindex="-1" aria-labelledby="modelDeleteLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modelDeleteLabel">Cảnh báo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Bạn có muốn xóa không 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <form action="" id="confirmDelete" method="post">
            @method ('delete')
            @csrf
            <button class="btn btn-danger">Xác nhận xóa</button>
            
        </form>
      </div>
    </div>
  </div>
</div>


@endsection
@push('script')
<script>
    var modelDelete = document.getElementById('modelDelete')
    modelDelete.addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget
    var idProduct = button.getAttribute('data-bs-id')
    let confirmDelete =document.querySelector('#confirmDelete')
    confirmDelete.setAttribute('action','{{route('admin.product.deleteProduct')}}?id=' + idProduct)
    
})



    var modalEdit = document.getElementById('modalEdit')
    modalEdit.addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget
    var idProduct = button.getAttribute('data-id')
    let url = "{{ route('admin.product.detailProduct') }}?id= " + idProduct;
    fetch(url, {
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        })
    .then((response) => response.json())
    .then((data)=>{
        document.querySelector('#idProduct').value = data.id
        document.querySelector('#category_idProduct').value = data.category_id
        document.querySelector('#nameProduct').value = data.name
        document.querySelector('#priceProduct').value = data.price
        document.querySelector('#descriptionProduct').value = data.description
        document.querySelector('#image').value = data.image
    })

})
</script>
@endpush