{% extends 'template/layout.volt' %}
{% block content %}
<div class="container">
    <div class="page-header" style="text-align: center;">
        <h2>Collections</h2>
    </div>
    <div class="page-header" style="text-align: center;">
        <form class="form-inline" method="POST" action="{{url('book/search')}}">
            <input class="form-control mr-sm-2" type="search" placeholder="Search Member" aria-label="Search"
                name="searchKey">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
    <br>
    {% if session.get('auth') %}
    <div class="page-header">
        <a href="{{url('book/create')}}" class="btn btn-primary">Add New Book into Collection</a>
        <br>
    </div>
    {% endif %}
    <div>
        {{ flashSession.output() }}
        <br>
    </div>
    <table class="ui sortable selectable inverted brown celled table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Year</th>
                <th>Shelf</th>
                <th>Pages</th>
                <th>Status</th>
                <th>Count</th>
                <th>Author</th>
                <th>Category</th>
                {% if session.get('auth') %}
                <th>Action</th>
                {% endif %}
            </tr>
        </thead>
        <tbody>
            {% for result in results %}
            <tr>
                <td>{{result.BOOK_ID}}</td>
                <td>{{result.BOOK_TITLE}}</td>
                <td>{{result.BOOK_YEAR}}</td>
                <td>{{result.BOOK_SHELF}}</td>
                <td>{{result.BOOK_PAGECOUNT}}</td>
                <td>{{result.BOOK_STATUS}}</td>
                <td>{{result.BOOK_COUNT}}</td>
                <td>{{result.authors.AUTHOR_NAME}}</td>
                <td>{{result.categories.CATEGORY_NAME}}</td>
                {% if session.get('auth') %}
                <td>
                    <a href="{{url('/book/edit/'~result.BOOK_ID)}}" class="btn btn-primary"><span
                            class="fas fa-plus"></span>Edit</a>
                    <a href="{{url('/book/destroy/'~result.BOOK_ID)}}" class="btn btn-danger"><span
                            class="fas fa-plus"></span>Delete</a>
                </td>
                {% endif %}
            </tr>
            {% endfor %}
        </tbody>
    </table>
</div>
{% endblock %}