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
                    <a href="{{url('/user/login')}}" class="nav-link">Login</a>
                </li>
            </ul>
            {% endif %}
        </div>
    </nav>
</head>

<body>
<div class="limiter">
    <div class="container-register100">
        <form method="POST" autocomplete="off" action="{{url('/session/register')}}" enctype="multipart/form-data" class="login100-form validate-form">
            <span class="register100-form-title">Register</span>
            <div class="wrap-input100 validate-input p-bp10">
                {{ flashSession.output() }}
            </div>
            <div class="wrap-input100 validate-input p-bp10">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Ex: myusername" required>
            </div>
            <div class="wrap-input100 validate-input p-bp10">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <div class="wrap-input100 validate-input p-bp10">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Ex: 123@example.com" required>
            </div>
            <div class="wrap-input100 validate-input p-bp10">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Victor Delacroix" required>
            </div>
            <div class="wrap-input100 validate-input p-bp10">
                <label for="birthdate">Birthdate</label>
                <input type="date" class="form-control" name="birthdate" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label><br>
                <input type="radio" name="gender" id="male" value="Male">
                <label for="gender">Male</label><br>
                <input type="radio" name="gender" id="female" value="Female">
                <label for="gender">Female</label><br>
            </div>
            <div class="wrap-input100 validate-input p-bp10">
                <label for="category">Category</label>
                <input type="text" class="form-control" name="category" placeholder="Ex: 0" required>
            </div>
            <div class="wrap-input100 validate-input p-bp10">
                <label for="profile">Profile</label>
                <input type="file" class="form-control-file" name="profile">
            </div>
            <div class="container-login100-form-btn">
                <!-- <input type="submit" value="Register" class="btn btn-success"> -->
                <button type="submit" class="login100-form-btn">Register</button>
            </div>
        </form>
    </div>
</div>
</body>>
</html>