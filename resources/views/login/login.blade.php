<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{asset('assrret/fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('assrret/css/style.css')}}">
</head>
<body>

    <div class="main">
        

        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="{{asset('assrret/images/signin-image.jpg')}}" alt="sing up image"></figure>
                        <a href="{{route('register')}}" class="signup-image-link">Đăng ký</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Đăng nhập</h2>
                        @if (session('error'))
                            <span class="text-danger">{{session('error')}}</span>
                        @endif
                        <form action="{{ route('postLogin')}}" method="POST" class="register-form" id="login-form">
                            @csrf
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input 
                                @if (isset($_COOKIE['email']))  
                                    value="{{ $_COOKIE['email'] }}"
                                @endif type="email" name="email" id="email" placeholder="Your Email"/>
                                @error('email')
                                     <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input @if (isset($_COOKIE['password']))  
                                    value="{{ $_COOKIE['password'] }}"
                                 @endif
                                type="password" name="password" id="password" placeholder="Password"/>
                                @error('password')
                                     <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember" id="remember" class="agree-term" 
                                @if (isset($_COOKIE['email']))  
                                    checked=""
                                 @endif />
                                <label for="remember" class="label-agree-term"><span><span></span></span>Lưu tài khoản</label>
                                <br><a href="{{route('forgotPass')}}">Quyên mật khẩu</a>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                        <div class="social-login">
                            <span class="social-label">Hoặc đang nhập bằng:</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="{{asset('assrret/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assrret/js/main.js')}}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>