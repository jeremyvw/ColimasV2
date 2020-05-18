<!DOCTYPE html>
<html lang="en">
{{ assets.outputCss() }}

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colimas</title>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgba(150, 180, 255, 1);">
        <a href="{{url('/')}}" class="navbar-brand"><img src="/img/logo-small-navbar-resize.png" width="120" height="50"
                alt=""></a>
        <button class="navbar-toggler" data-toogle="collapse" data-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="{{url('/book')}}" class="nav-link">Collections</a>
                </li>
                {% if session.get('auth')['category'] == 0 %}
                <li class="nav-item">
                    <a href="{{url('/user/manage')}}" class="nav-link">Members</a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/borrow')}}" class="nav-link">Requests</a>
                </li>
                {% endif %}
            </ul>
        </div>
        <div class="collapse navbar-collapse">
            {% if session.get('auth') %}
            <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link active dropdown-toggle" data-toggle="dropdown"><strong>Welcome,
                            {{session.get('auth')['name']}}</strong></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="{{url('/user/profile')}}" class="dropdown-item">Profile</a>
                        <a href="{{url('/borrow')}}" class="dropdown-item">Requests</a>
                        <a href="#" class="dropdown-item">Upgrade</a>
                        <div class="dropdown-divider"></div>
                        <a href="{{url('/session/logout')}}" class="dropdown-item">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </li>
            </ul>
            {% else %}
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="{{url('/user/login')}}" class="nav-link">Login</a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/user/register')}}" class="nav-link">Register</a>
                </li>
            </ul>
            {% endif %}
        </div>
    </nav>
</head>

{% block title %}
{% endblock %}

<body>
    {% block content %}
    {% endblock %}
</body>

</html>