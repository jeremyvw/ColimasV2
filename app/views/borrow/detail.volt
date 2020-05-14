{% extends 'template/layout.volt' %}
{% block content %}
<div class="container">
    <div class="page-header" style="text-align: center;">
        <h2>Request Detail</h2>
    </div>
    <br>
    <form method="POST" autocomplete="off" action="{{url('/borrow/update/'~borrow.BORROW_ID)}}" enctype="multipart/form-data" class="ui form">
        <div class="form-group row">
            <label for="id">ID</label>
            <div class="col-sm-10">
                <input type="text" class="" name="title" value="{{borrow.BORROW_ID}}" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="bookid">Book ID</label>
            <div class="col-sm-10">
                <input type="text" name="bookid" required value="{{borrow.BOOK_ID}}" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="userid">User ID</label>
            <div class="col-sm-10">
                <input type="text" name="userid" required value="{{borrow.USER_ID}}" readonly>
            </div>
        </div>
        <div class="form-group row">
                <label for="startdate">Start Date</label>
                <div class="col-sm-10">
                    <input type="date" name="startdate" required value="{{borrow.BORROW_STARTDATE}}" readonly>
                </div>
        </div>
        <div class="form-group row">
            <label for="expectedreturndate">Expected Return Date</label>
            <div class="col-sm-10">
                <input type="date" name="expectedreturndate" required value="{{borrow.BORROW_EXPECTEDRETURNDATE}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="returndate">Return Date</label>
            <div class="col-sm-10">
                <input type="text" name="returndate" value="{{borrow.BORROW_RETURNDATE}}" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="status">Status</label>
            <select name="status" class="form-control">
                <option value="Pending">Pending</option>
                <option value="Accepted">Accepted</option>
                <option value="Finished">Finished</option>
            </select>
        </div>
        <input type="submit" value="Save changes" class="btn btn-success">
    </form>
</div>
{% endblock %}