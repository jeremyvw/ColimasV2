<!DOCTYPE html>
<html lang="en">
    {{ assets.outputCss() }}
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colimas</title>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgba(150, 180, 255, 1);">
        <a href="{{url('/')}}" class="navbar-brand"><img src="/img/logo-small-navbar-resize.png" width="120" height="50" alt=""></a>
        <button class="navbar-toggler" data-toogle="collapse" data-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="{{url('/')}}" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/book/manage')}}" class="nav-link">Collections</a>
                </li>
                <!-- <li class="nav-item">
                    <a href="{{url('/user/login')}}" class="nav-link">Login</a>
                </li> -->
            </ul>
        </div>
        <div class="collapse navbar-collapse">
            {% if session.get('auth') %}
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <span class="nav-link">Welcome, {{session.get('auth')['name']}}</span>
                </li>
                <li class="nav-item">
                    <a href="{{url('/user/manage')}}" class="nav-link">Members</a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/session/logout')}}" class="nav-link"></a>
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </li>
            </ul>
            {% else %}
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="{{url('/user/register')}}" class="nav-link">Register</a>
                </li>
            </ul>
            {% endif %}
        </div>
    </nav>
</head>
<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="POST" autocomplete="off" action="{{url('/session/login')}}">
                    <span class="login100-form-title">Login</span><br>
                    <div class="wrap-input 100 validate-input">
                        {{ flashSession.output() }}
                    </div>
                    <div class="wrap-input100 validate-input">
                        <label for="email">E-mail</label>
                        <input class="input10" type="email" name="email" placeholder="123@example.com" required>
                        <span class="symbol-input100"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                    </div>
                    <div class="wrap-input100 validate-input">
                        <label for="password">Password</label>
                        <input class="input10" type="password" name="password" required>
                        <span class="symbol-input100"><i class="fa fa-lock" aria-hidden="true"></i></span>
                    </div>
                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">Sign In</button>
                    </div>
                    <div class="text-center p-t-23 p-b-70">
                        <span class="txt3">Don't have an account yet?</span>
                        <a class="txt3" href="{{url('user/register')}}">
                            Create your account
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>