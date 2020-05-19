{% extends 'template/layout.volt' %}
{% block title %}
<title>Book Detail/title>
{%endblock%}
{% block content %}
<style>
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
                <img src="{{book.BOOK_COVERIMAGE}}" width="" height="150" alt="225">
            </div>
        </div>
        <div class="col-md-5">
            <div class="profile-head">
                <h5>
                    {{ book.BOOK_TITLE }}
                </h5><br>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                            aria-controls="home" aria-selected="true">Detail</a>
                    </li>
                </ul>
                <div class="tab-content profile-tab" id="myTabContent">
                    <!-- <div class="row" style="padding-bottom: 5pt;">
                        <div class="col-md-4">
                            <label>Username</label>
                        </div>
                        <div class="col-md-4">
                            <p>{{ user.USER_NAME }}</p>
                        </div>
                    </div> -->
                    <div class="row " style="padding-bottom: 5pt;">
                        <div class="col-md-4">
                            <label>Year</label>
                        </div>
                        <div class="col-md-4">
                            <p>{{ book.BOOK_YEAR }}</p>
                        </div>
                    </div>
                    <div class="row " style="padding-bottom: 5pt;">
                        <div class="col-md-4">
                            <label>Shelf</label>
                        </div>
                        <div class="col-md-4">
                            <p>{{ book.BOOK_SHELF }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Description</label>
                        </div>
                        <div class="col-md-4">
                            <p>
                                {{ book.BOOK_DESCRIPTION }}
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Total Pages</label>
                        </div>
                        <div class="col-md-4">
                            <p>
                                {{ book.BOOK_PAGECOUNT }}
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Status</label>
                        </div>
                        <div class="col-md-4">
                            <p>
                                {{ book.BOOK_STATUS }}
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Count</label>
                        </div>
                        <div class="col-md-4">
                            <p>
                                {{ book.BOOK_COUNT }}
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Author</label>
                        </div>
                        <div class="col-md-4">
                            <p>
                                {{ book.authors.AUTHOR_NAME }}
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Category</label>
                        </div>
                        <div class="col-md-4">
                            <p>
                                {{ book.categories.CATEGORY_NAME }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <a href="{{url('/borrow/add/'~book.BOOK_ID) }}" class="profile-edit-btn">Pinjam</a><br>

        </div>
    </div>
</div>
{% endblock %}