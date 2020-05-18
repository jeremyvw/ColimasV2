<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colimas</title>
    <link rel="stylesheet" href="/css/logreg.css">
    <style>
        body {
            background-image: url('/img/aset/bg.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }

        .diva {
            width: 35%;
            min-height: 50vh;
            padding-top: 20px;
            border-radius: 2%;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="login d-flex align-items-center py-5">
            <div class="container diva" style="background-color:white">
                <div class="col-lg-11 cols-lg-11 mx-auto">
                    <h3 class="login-heading mb-4" style="text-align: center;">Register</h3>
                    <form method="post" action="<?= $this->url->get('/session/register') ?>" enctype="multipart/form-data">
                        <div class="form-label-group">
                            <input type="email" name="email" placeholder="Email address" required autofocus
                                class="form-control">
                        </div>
                        <div class="form-label-group">
                            <input type="text" name="username" class="form-control" placeholder="Username" required>
                        </div>
                        <div class="form-label-group">
                            <input type="password" name="password" autocomplete="off" class="form-control"
                                placeholder="Password" required>
                        </div>
                        <!-- <div class="form-label-group">
                            <input type="password" name="pass2" autocomplete="off" class="form-control"
                                placeholder="Confirm Password" required>
                        </div> -->
                        <div class="form-label-group">
                            <input type="text" name="name" class="form-control" placeholder="Fullname" required>
                        </div>
                        <div class="form-label-group">
                            <input type="date" class="form-control" name="birthdate" required>
                        </div>
                        <div class="form-label-group">
                            <span>Jenis Kelamin</span><br>
                            <input type="radio" id="male" name="gender" value="Male" style="display: inline;" required>
                            <label for="laki" style="margin: 0;padding: 5pt 20pt 0 5pt;">Laki-Laki</label>
                            <!-- padding-right: 10pt;padding-bottom: 0; -->
                            <input type="radio" id="female" name="gender" value="Female" required>
                            <label for="perempuan" style="margin: 0;padding: 5pt 25pt 0 5pt;">Perempuan</label>
                        </div>
                        <div style="padding-bottom: 30px;">
                            <label for="coverimage">Profile Picture (Optional)</label>
                            <input type="file" class="form-control-file" name="profile">
                        </div>
                        <button class="btn btn-lg btn-success btn-block btn-login text-uppercase font-weight-bold mb-2"
                            type="submit" value="Login">Register</button>
                        <div class="text-center" style="padding-bottom: 20px;">
                            <span class="small">Already have an account?</span>
                            <a class="small" href="<?= $this->url->get('user/login') ?>">Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="limiter">
        <div class="container-register100">
            <form method="POST" autocomplete="off" action="<?= $this->url->get('/session/register') ?>" enctype="multipart/form-data"
                class="login100-form validate-form">
                <span class="register100-form-title">Register</span>
                <div class="wrap-input100 validate-input p-bp10">
                    <?= $this->flashSession->output() ?>
                </div>
                <div class="wrap-input100 validate-input p-bp10">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Ex: myusername" required>
                </div>
                <div class="wrap-input100 validate-input p-bp10">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <div class="wrap-input100 validate-input p-bp10">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Ex: 123@example.com" required>
                </div>
                <div class="wrap-input100 validate-input p-bp10">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Victor Delacroix" required>
                </div>
                <div class="wrap-input100 validate-input p-bp10">
                    <label for="birthdate">Birthdate</label>
                    <input type="date" class="form-control" name="birthdate" required>
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label><br>
                    <input type="radio" name="gender" id="male" value="Male">
                    <label for="gender">Male</label><br>
                    <input type="radio" name="gender" id="female" value="Female">
                    <label for="gender">Female</label><br>
                </div>
                <div class="wrap-input100 validate-input p-bp10">
                    <label for="profile">Profile</label>
                    <input type="file" class="form-control-file" name="profile">
                </div>
                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">Register</button>
                </div>
            </form>
        </div>
    </div> -->
</body>

</html>