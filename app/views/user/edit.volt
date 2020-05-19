{% extends 'template/layout.volt' %}
{% block title %}
<title>Daftar Buku</title>
{%endblock%}
{% block content %}
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            <strong>Edit Profil</strong>
        </div>
        <div class="card-header">
            <a href="{{url('/user/profile')}}" class="btn btn-secondary">Back</a>
        </div>
        <div class="card-body">

            <form autocomplete="off" method="post" action="{{ url('user/update/') }}" enctype="multipart/form-data">
                <div style="padding-bottom: 20px;">
                    <label for="coverimage">Upload Profile Picture</label>
                    <input type="file" class="form-control-file" name="profile">
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" autocomplete="off" name="username" class="form-control" placeholder="Username"
                        value="{{user.USER_USERNAME}}">
                </div>
                <div class="form-group">
                    <label>Fullname</label>
                    <input type="text" name="name" class="form-control" placeholder="Fullname"
                        value="{{user.USER_NAME}}">
                </div>
                <div class="form-group">
                    <label>Birthdate</label>
                    <input type="date" class="form-control" name="birthdate" value="{{user.USER_BIRTHDATE}}">
                </div>
                <div class="form-group">
                    <span>Jenis Kelamin</span><br>
                    <input type="radio" id="male" name="gender" value="Male" style="display: inline;" required>
                    <label for="laki" style="margin: 0;padding: 5pt 20pt 0 5pt;">Laki-Laki</label>
                    <!-- padding-right: 10pt;padding-bottom: 0; -->
                    <input type="radio" id="female" name="gender" value="Female" required>
                    <label for="perempuan" style="margin: 0;padding: 5pt 25pt 0 5pt;">Perempuan</label>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Simpan">
                </div>
            </form>
        </div>
    </div>
</div>
{% endblock %}