{% extends 'template/layout.volt' %}
{% block content %}
<div class="container-fluid">
    <div class="page-header" style="text-align: center;">
        <h2>Members</h2>
    </div>
    <div class="card-header">
        <form class="form-inline" method="POST" action="{{url('user/search')}}">
            <input class="form-control mr-sm-2" type="search" placeholder="Search Member" aria-label="Search"
                name="searchKey">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
    <br>
    <table class="table table-hover">
        <thead>
            <tr class="text-center">
                <th>ID</th>
                <th>Name</th>
                <th>Birthdate</th>
                <th>Gender</th>
                <th>Category</th>
            </tr>
        </thead>
        <tbody>
            {% for user in users %}
            {% if user.USER_CATEGORY!=0 %}
            <tr class="text-center">
                <th>{{user.USER_ID}}</th>
                <th>{{user.USER_NAME}}</th>
                <th>{{user.USER_BIRTHDATE}}</th>
                <th>{{user.USER_GENDER}}</th>
                <th>{{user.USER_CATEGORY}}</th>
            </tr>
            {% endif %}
            {% endfor %}
        </tbody>
    </table>
</div>
{% endblock %}