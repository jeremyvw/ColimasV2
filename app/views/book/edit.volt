{% extends 'template/layout.volt' %}
{% block content %}
<div class="container">
    <div class="page-header" style="text-align: center;">
        <h2>Edit Book Information</h2>
    </div>
    <br>
    <form method="POST" autocomplete="off" action="{{url('/book/update/'~book.BOOK_ID)}}" enctype="multipart/form-data"
        class="ui form">
        <div class="form-group row">
            <label for="id">ID</label>
            <div class="col-sm-10">
                <input type="text" class="" name="title" placeholder="Ex: 1" required value="{{book.BOOK_ID}}" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="title">Title</label>
            <div class="col-md-10">
                <input type="text" name="title" placeholder="Ex: Nectar of Pain" required value="{{book.BOOK_TITLE}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="year">Year</label>
            <div class="col-md-10">
                <input type="text" name="year" placeholder="Ex: 2015" required value="{{book.BOOK_YEAR}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="shelf">Shelf</label>
            <div class="col-md-10">
                <input type="text" name="shelf" placeholder="Ex: 1" required value="{{book.BOOK_SHELF}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="description">Description</label>
        </div>
        <div class="form-group row">
            <textarea cols="150" rows="3" name="description" placeholder="Ex: This book can help us understanding..."
                value="{{book.BOOK_DESCRIPTION}}">{{book.BOOK_DESCRIPTION}}
                </textarea>
        </div>
        <div class="form-group row">
            <label for="pagecount">Number of pages</label>
            <div class="col-md-10">
                <input type="text" name="pagecount" placeholder="Ex: 299" required value="{{book.BOOK_PAGECOUNT}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="status">Status</label>
            <select name="status" class="form-control">
                <!-- <option value="{{book.BOOK_STATUS}}">{{book.BOOK_STATUS}}</option> -->
                <option value="Available">Available</option>
                <option value="Not Available">Not Available</option>
            </select>
        </div>
        <div class="form-group row">
            <label for="count">Count</label>
            <div class="col-md-10">
                <input type="text" name="count" placeholder="Ex: 2" required value="{{book.BOOK_COUNT}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="coverimage">Cover Image</label>
        </div>
        <div class="form-group row">
            <img src="{{url(book.BOOK_COVERIMAGE)}}" width="225" height="150" alt="#" />
        </div>
        <div class="form-group row">
            <input type="file" name="coverimage">
        </div>

        <div class="form-group row">
            <label for="authorid">Author</label>
            <select name="authorid" class="form-control">
                <option value="{{book.authors.AUTHOR_ID}}">{{book.authors.AUTHOR_NAME}}</option>
                {% for author in authors %}
                {% if authors.AUTHOR_ID != book.authors.AUTHOR_ID %}
                <option value="{{author.AUTHOR_ID}}">{{author.AUTHOR_NAME}}</option>
                {% endif %}
                {% endfor %}
            </select>
        </div>
        <div class="form-group row">
            <label for="categoryid">Category</label>
            <select name="categoryid" class="form-control">
                <option value="{{book.categories.CATEGORY_ID}}">{{book.categories.CATEGORY_NAME}}</option>
                {% for category in categories %}
                <option value="{{category.CATEGORY_ID}}">{{category.CATEGORY_NAME}}</option>
                {% endfor %}
            </select>
        </div>

        <input type="submit" value="Save changes" class="btn btn-success">
    </form>
</div>
{% endblock %}