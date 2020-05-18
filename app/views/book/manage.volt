{% extends 'template/layout.volt' %}
{% block content %}
<div class="container">
    <div class="page-header" style="text-align: center;">
        <h2>Collections</h2>
    </div>
    <div class="page-header" style="text-align: center;">
        <form class="form-inline" method="POST" action="{{url('book/search')}}">
            <input class="form-control mr-sm-2" type="search" placeholder="Search Books" aria-label="Search" name="searchKey">
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
            {% for book in books %}
            <tr>
                <td>{{book.BOOK_ID}}</td>
                <td>{{book.BOOK_TITLE}}</td>
                <td>{{book.BOOK_YEAR}}</td>
                <td>{{book.BOOK_SHELF}}</td>
                <td>{{book.BOOK_PAGECOUNT}}</td>
                <td>{{book.BOOK_STATUS}}</td>
                <td>{{book.BOOK_COUNT}}</td>
                <td>{{book.authors.AUTHOR_NAME}}</td>
                <td>{{book.categories.CATEGORY_NAME}}</td>
                {% if session.get('auth') %}
                <td>
                    <a href="{{url('/book/edit/'~book.BOOK_ID)}}" class="btn btn-primary"><span class="fas fa-plus"></span>Edit</a>
                    <a href="{{url('/book/destroy/'~book.BOOK_ID)}}" class="btn btn-danger"><span class="fas fa-plus"></span>Delete</a>
                </td>
                {% endif %}
            </tr>
            {% endfor %}
        </tbody>
    </table>
</div>
{% endblock %}