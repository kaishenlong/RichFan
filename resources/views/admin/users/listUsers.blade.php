    @extends('admin.layouts.default')

    @section('title')
        @parent
        Danh sách người dùng
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
                                                    Quản lý người dùng
                                                </span>
                                            </h3>
                                            <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#addUser">Thêm Mới</a>
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
                                                                <th class="p-0 pb-3 w-150px pe-7">
                                                                    Email
                                                                </th>
                                                                <th class="p-0 pb-3 w-150px pe-7">
                                                                    Role
                                                                </th>
                                                                <th class="p-0 pb-3 w-100px">ACTIONS</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($listUsers as $key => $value)
                                                            <tr>
                                                                <td>{{$key +1}}</td>
                                                                <td>{{$value -> name}}</td>
                                                                <td>{{$value -> email}}</td>
                                                                <td>
                                                                    @if($value-> role == '1')
                                                                        Admin
                                                                    @elseif($value->role == '2')
                                                                        User
                                                                    @endif
                                                                </td>
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
    <!-- Modal addUser-->
<div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addUserLabel">Thêm mới User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div> 
      <form action="{{route('admin.user.addUsers')}}" method="post">
        @csrf
        <div class="modal-body">
            <div class="mt-3">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control">
                @error('name')
                                     <span class="text-danger">{{ $message }}</span>
                                @enderror
            </div>
            <div class="mt-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control">
                @error('email')
                                     <span class="text-danger">{{ $message }}</span>
                                @enderror
            </div>
            <div class="mt-3">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-3">
                <label for="role">Role</label>
                <select name="role" id="role" class="form-control">
                    <option value="1">Admin</option>
                    <option value="2">User</option>
                </select>
                @error('role')
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
        <h5 class="modal-title" id="modalEditLabel">Chỉnh sửa User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div> 
      <form action="{{route('admin.user.updateUsers')}}" method="post">
        @method('PATCH')
        @csrf
        <div class="modal-body">
            <input type="hidden"  value="" id="idUserUpdate" name="idUser">
            <div class="mt-3">
                <label for="nameUpdate">Name</label>
                <input type="text" name="name" id="nameUpdate" class="form-control">
                @error('name')
                        <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-3">
                <label for="emailUpdate">Email</label>
                <input type="email" name="email" id="emailUpdate" class="form-control">
                @error('email')
                        <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-3">
                <label for="roleUpdate">Role</label>
                <select name="role" id="roleUpdate" class="form-control">
                    <option value="1">Admin</option>
                    <option value="2">User</option>
                </select>
                @error('role')
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
        var idUser = button.getAttribute('data-id')

        let confirmDelete =document.querySelector('#confirmDelete')
        confirmDelete.setAttribute('action','{{route('admin.user.deleteUsers')}}?id=' + idUser)
        
    })


    
    var modalEdit = document.getElementById('modalEdit')
    modalEdit.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget
        var idUser = button.getAttribute('data-id')

        let url = "{{ route('admin.user.detailUsers') }}?id= " + idUser;
        fetch(url, {
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        })
        .then((response) => response.json())
        .then((data)=>{
            document.querySelector('#idUserUpdate').value = data.id
            document.querySelector('#nameUpdate').value = data.name
            document.querySelector('#emailUpdate').value = data.email
            document.querySelector('#roleUpdate').value = data.role
        })

    })
    </script>
    @endpush