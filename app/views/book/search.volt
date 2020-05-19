{% extends 'template/layout.volt' %}
{% block content %}
<div class="container-fluid">
    <div class="page-header" style="text-align: center;">
        <h2>Collections</h2>
    </div>
    <div class="page-header">
        <form class="form-inline">
            <a href="{{url('/book')}}" class="btn btn-secondary">Back</a>
        </form>
    </div>
    <br>
    <div class="page-header" style="text-align: center;">
        <form class="form-inline" method="POST" action="{{url('book/search')}}">
            <input class="form-control mr-sm-2" type="search" placeholder="Search Books" aria-label="Search"
                name="searchKey">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
    <br>
    {% if session.get('auth') %}
    {% if session.get('auth')['category'] == 0 %}
    <div class="page-header">
        <a href="{{url('book/create')}}" class="btn btn-primary">Add New Book into Collection</a>
        <br>
    </div>
    {% endif %}
    {% endif %}
    <div>
        {{ flashSession.output() }}
        <br>
    </div>
    <table class="table table-hover">
        <thead>
            <tr class="text-center">
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
            <tr class="text-center">
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
                {% if session.get('auth')['category'] == 0 %}
                <td>
                    <a href="{{url('/book/edit/'~result.BOOK_ID)}}" class="btn btn-primary">Edit</a>
                    <a href="{{url('/book/destroy/'~result.BOOK_ID)}}" class="btn btn-danger">Delete</a>
                </td>
                {% elseif session.get('auth') %}
                {% if result.BOOK_COUNT == 0 %}
                <td>
                    <a href="{{url('borrow/add/'~result.BOOK_ID) }}" class="btn btn-success btn-sm disabled">Pinjam</a>
                </td>
                {% else %}
                <td>
                    <a href="{{url('borrow/add/'~result.BOOK_ID) }}" class="btn btn-success btn-sm">Pinjam</a>
                </td>
                {% endif %}
                {% else %}
                {% endif %}
                {% endif %}
            </tr>
            {% endfor %}
        </tbody>
    </table>
</div>
{% endblock %}