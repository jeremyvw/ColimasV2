{% extends 'template/layout.volt' %}
{% block content %}
<!-- <h1>Welcome to Our Library</h1> -->
<style>
    h1 {
        font-weight: 400;
        text-transform: uppercase;
        font-size: 28px;
    }

    .main-text {
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        width: 100%;
        
        /* You need to define an explicit height! */
        height: 0vh;
    }

    .button{
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        width: 100%;
        height: 20vh;
        transition-duration: 0.4s;
    }

    .btn{
        border: 2px solid #008CBA;
        padding: 10px 30px;
        text-decoration: none;
        font-size: 13px;
        text-transform: uppercase;
        background-color: white;
    }
    
    .btn:hover{
        background-color: cornflowerblue;
    }



</style>
<img src="/img/logo-large-resize.png" style="display: block; margin-left: auto; margin-right: auto; margin-top: 0px;" alt="">
    <div class="main-text">
        <h1>Welcome to our Library</h1>
    </div>
            <div class="button">
                <a href="/book/manage" class="btn btn-hover">View Collections</a>
            </div>

{% endblock %}