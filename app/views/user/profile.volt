{% extends 'template/layout.volt' %}
{% block title %}
<title>Profile</title>
{%endblock%}
{% block content %}
<style>
    body {
        background: -webkit-linear-gradient(left, #3931af, #00c6ff);
    }

    .emp-profile {
        padding: 3% 0.5%;
        margin-top: 3%;
        margin-bottom: 3%;
        border-radius: 0.5rem;
        background: #fff;
    }

    .profile-img {
        text-align: center;
    }

    .profile-img img {
        width: 70%;
        height: 100%;
    }

    .profile-head h5 {
        color: #333;
    }

    .profile-head h6 {
        color: #0062cc;
    }

    .profile-head .nav-tabs {
        margin-bottom: 5%;
    }

    .profile-head .nav-tabs .nav-link {
        font-weight: 600;
        border: none;
    }

    .profile-head .nav-tabs .nav-link.active {
        border: none;
        border-bottom: 2px solid #0062cc;
    }

    .profile-edit-btn {
        border: none;
        border-radius: 1.5rem;
        width: 70%;
        padding: 2%;
        font-weight: 600;
        color: #6c757d;
        cursor: pointer;
    }
</style>
<div class="container emp-profile">
    <!-- <form method="post"> -->
    <div class="row">
        <div class="col-md-4">
            <div class="profile-img">
                {% if user.USER_PHOTO %}
                <img src="{{url(user.USER_PHOTO)}}" />
                {% else %}
                <img src="/img/profiles/basicpict.png" />
                {% endif %}
            </div>
        </div>
        <div class="col-md-5">
            <div class="profile-head">
                <h5>
                    {{ user.USER_USERNAME }}
                </h5><br>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                            aria-controls="home" aria-selected="true">About</a>
                    </li>
                </ul>
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="row" style="padding-bottom: 5pt;">
                        <div class="col-md-4">
                            <label>Username</label>
                        </div>
                        <div class="col-md-4">
                            <p>{{ user.USER_NAME }}</p>
                        </div>
                    </div>
                    <div class="row " style="padding-bottom: 5pt;">
                        <div class="col-md-4">
                            <label>Email</label>
                        </div>
                        <div class="col-md-4">
                            <p>{{ user.USER_EMAIL }}</p>
                        </div>
                    </div>
                    <div class="row " style="padding-bottom: 5pt;">
                        <div class="col-md-4">
                            <label>Gender</label>
                        </div>
                        <div class="col-md-4">
                            <p>{{ user.USER_GENDER }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Member</label>
                        </div>
                        <div class="col-md-4">
                            {% if user.USER_CATEGORY  == 1 %}
                            <p>Bronze</p>
                            {% elseif user.USER_CATEGORY  == 2 %}
                            <p>Silver</p>
                            {% elseif user.USER_CATEGORY  == 3 %}
                            <p>Gold</p>
                            {% endif %}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <a href="{{url('/user/edit') }}" class="profile-edit-btn">Edit Profile</a><br>
            <a href="{{url('/upgrade/request') }}" class="profile-edit-btn">Upgrade Member</a><br>
        </div>
    </div>
</div>
{% endblock %}