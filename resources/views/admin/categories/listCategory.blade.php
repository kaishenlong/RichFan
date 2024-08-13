@extends('admin.layouts.default')

@section('title')
    @parent
    Danh sách danh mục
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
                                                Quản lý danh mục
                                            </span>
                                        </h3>
                                        <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#addCategory">Thêm Mới</a>
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
                                                                Name 
                                                            </th>
                                                            <th class="p-0 pb-3 w-100px">ACTIONS</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($listCategory as $key => $value)
                                                        <tr>
                                                            <td>{{$key +1}}</td>
                                                            <td>{{$value -> name}}</td>
                                                            <td>
                                                                <button data-id="{{$value->id}}" class="btn btn-warning"  data-bs-toggle="modal" 
                                                                     data-bs-target="#modalEdit">Sửa</button>
                                                                <button data-id="{{$value->id}}" class="btn btn-danger"  data-bs-toggle="modal"
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
<!-- Modal addCategory-->
<div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="addCategoryLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="addCategoryLabel">Thêm mới danh mục</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  </div> 
  <form action="{{route('admin.category.addCategory')}}" method="post">
    @csrf
    <div class="modal-body">
        <div class="mt-3">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control">
            @error('name')
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
    <h5 class="modal-title" id="modalEditLabel">Chỉnh sửa danh mục</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  </div> 
  <form action="{{route('admin.category.updateCategory')}}" method="post">
    @method('PATCH')
    @csrf
    <div class="modal-body">
        <input type="hidden"  value="" id="idCategoryUpdate" name="idCategory">
        <div class="mt-3">
            <label for="nameUpdate">Name</label>
            <input type="text" name="name" id="nameUpdate" class="form-control">
            @error('name')
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
    var idCategory = button.getAttribute('data-id')

    let confirmDelete =document.querySelector('#confirmDelete')
    confirmDelete.setAttribute('action','{{route('admin.category.deleteCategory')}}?id=' + idCategory)
    
})



var modalEdit = document.getElementById('modalEdit')
modalEdit.addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget
    var idCategory = button.getAttribute('data-id')

    let url = "{{ route('admin.category.detailCategory') }}?id= " + idCategory;
    fetch(url, {
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        })
    .then((response) => response.json())
    .then((data)=>{
        document.querySelector('#idCategoryUpdate').value = data.id
        document.querySelector('#nameUpdate').value = data.name
    })

})
</script>
@endpush