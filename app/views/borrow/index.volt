{% extends 'template/layout.volt' %}
{% block content %}
<div class="container-fluid">
    <div class="page-header" style="text-align: center;">
        <h2>Borrow Requests</h2>
    </div>
    <br>
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
            {% for borrow in borrows %}
            <tr class="text-center">
                <td>{{borrow.BORROW_ID}}</td>
                <td>{{borrow.books.BOOK_TITLE}}</td>
                <td>{{borrow.users.USER_NAME}}</td>
                <td>{{borrow.users.USER_CATEGORY}}</td>
                <td>{{borrow.BORROW_STARTDATE}}</td>
                <td>{{borrow.BORROW_EXPECTEDRETURNDATE}}</td>
                <td>{{borrow.BORROW_RETURNDATE}}</td>
                <td>{{borrow.BORROW_STATUS}}</td>
                <td>{{borrow.BORROW_PENALTY}}</td>

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