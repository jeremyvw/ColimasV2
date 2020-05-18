<!DOCTYPE html>
<html lang="en">
<?= $this->assets->outputCss() ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colimas</title>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgba(150, 180, 255, 1);">
        <a href="<?= $this->url->get('/') ?>" class="navbar-brand"><img src="/img/logo-small-navbar-resize.png" width="120" height="50"
                alt=""></a>
        <button class="navbar-toggler" data-toogle="collapse" data-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="<?= $this->url->get('/') ?>" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="<?= $this->url->get('/book/manage') ?>" class="nav-link">Collections</a>
                </li>
                <!-- <li class="nav-item">
                    <a href="<?= $this->url->get('/user/login') ?>" class="nav-link">Login</a>
                </li> -->
            </ul>
        </div>
        <div class="collapse navbar-collapse">
            <?php if ($this->session->get('auth')) { ?>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="<?= $this->url->get('/user/manage') ?>" class="nav-link">Members</a>
                </li>
                <li class="nav-item">
                    <a href="<?= $this->url->get('/borrow') ?>" class="nav-link">Requests</a>
                </li>
                <li class="nav-item">
                    <span class="nav-link">Welcome, <?= $this->session->get('auth')['name'] ?></span>
                </li>
                <li class="nav-item">
                    <a href="<?= $this->url->get('/session/logout') ?>" class="nav-link">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
            <?php } else { ?>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="<?= $this->url->get('/user/login') ?>" class="nav-link">Login</a>
                </li>
                <li class="nav-item">
                    <a href="<?= $this->url->get('/user/register') ?>" class="nav-link">Register</a>
                </li>
            </ul>
            <?php } ?>
        </div>
    </nav>
</head>


<title>Daftar Buku</title>


<body>
    
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center" style="background-color:#343A40; color: #FFFFFF;">
            <strong>Edit Profil</strong>
        </div>
        <div class="card-header">
            <a href="<?= $this->url->get('/user/profile') ?>" class="btn btn-secondary">Kembali</a>
        </div>
        <div class="card-body">

            <form autocomplete="off" method="post" action="<?= $this->url->get('user/update/') ?>" enctype="multipart/form-data">
                <div style="padding-bottom: 20px;">
                    <label for="coverimage">Upload Profile Picture</label>
                    <input type="file" class="form-control-file" name="profile">
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" autocomplete="off" name="username" class="form-control" placeholder="Username"
                        value="<?= $user->USER_USERNAME ?>">
                </div>
                <div class="form-label-group">
                    <input type="text" name="name" class="form-control" placeholder="Fullname"
                        value="<?= $user->USER_NAME ?>">
                </div>
                <div class="form-label-group">
                    <input type="date" class="form-control" name="birthdate" value="<?= $user->USER_BIRTHDATE ?>">
                </div>
                <div class="form-label-group">
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

</body>

</html>