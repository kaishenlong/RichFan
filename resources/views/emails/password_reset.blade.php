<div style="width: 600px; margin: 0 auto">
    <div style="text-align: center">
        <h2>Xin chào {{$user->name}}</h2>
        <p>Email này là giúp bạn lấy lại mật khẩu</p>
        <p>
            <a href="{{route('getPass',['user'=> $user->id,'token'=>$user->token])}}"
            style="display:inline-block; background: blue; color: #fff; padding: 7px 25px; font-weight:bold">
                Đặt lại mật khẩu
            </a>
        </p>
    </div>
</div>