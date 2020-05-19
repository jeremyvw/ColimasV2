{% extends 'template/layout.volt' %}
{% block content %}
<div class="container-fluid">
    <div class="page-header" style="text-align: center;">
        <h2>Borrow Requests</h2>
    </div>
    <br>
    <div class="page-header">
        <!-- <form class="form-inline"> -->
        <a href="{{url('/borrow')}}" class="btn btn-secondary">Back</a>
        <!-- </form> -->
    </div>
    <div>
        {{ flashSession.output() }}
    </div>
    <table class="table table-hover">
        <thead>
            <tr class="text-center">
                <th>ID</th>
                <th>Book</th>
                <th>Member</th>
                <th>Member Category</th>
                <th>Start Date</th>
                <th>Expected Return</th>
                <th>Return Date</th>
                <th>Status</th>
                <th>Denda</th>
                {% if session.get('auth')['category'] == 0 %}
                <th>Action</th>
                {% endif %}
            </tr>
        </thead>
        <tbody>
            {% for filt in filters %}
            <tr class="text-center">
                <td>{{filt.BORROW_ID}}</td>
                <td>{{filt.books.BOOK_TITLE}}</td>
                <td>{{filt.users.USER_NAME}}</td>
                <td>{{filt.users.USER_CATEGORY}}</td>
                <td>{{filt.BORROW_STARTDATE}}</td>
                <td>{{filt.BORROW_EXPECTEDRETURNDATE}}</td>
                <td>{{filt.BORROW_RETURNDATE}}</td>
                <td>{{filt.BORROW_STATUS}}</td>
                <td>{{filt.BORROW_PENALTY}}</td>

                {% if session.get('auth')['category'] == 0 %}
                <td>
                    <a href="{{url('/borrow/detail/'~borrow.BORROW_ID)}}" class="btn btn-info">View Detail</a>
                </td>
                {% endif %}
            </tr>
            {% endfor %}
        </tbody>
    </table>
</div>
{% endblock %}