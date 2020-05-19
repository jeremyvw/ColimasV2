<!DOCTYPE html>
<html lang="en">
<?= $this->assets->outputCss() ?>
<!-- <?= $this->assets->outputJs() ?> -->

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
                    <a href="<?= $this->url->get('/book') ?>" class="nav-link">Collections</a>
                </li>
                <?php if ($this->session->get('auth')) { ?>
                <?php if ($this->session->get('auth')['category'] == 0) { ?>
                <li class="nav-item">
                    <a href="<?= $this->url->get('/user/manage') ?>" class="nav-link">Members</a>
                </li>
                <li class="nav-item">
                    <a href="<?= $this->url->get('/borrow') ?>" class="nav-link">Requests</a>
                </li>
                <li class="nav-item">
                    <a href="<?= $this->url->get('/upgrade') ?>" class="nav-link">Upgrades</a>
                </li>
                <?php } ?>
                <?php } ?>
            </ul>
        </div>
        <div class="collapse navbar-collapse">
            <?php if ($this->session->get('auth')) { ?>
            <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link active dropdown-toggle" data-toggle="dropdown"><strong>Welcome,
                            <?= $this->session->get('auth')['name'] ?></strong></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <?php if ($this->session->get('auth')) { ?>
                        <?php if ($this->session->get('auth')['category'] > 0) { ?>
                        <a href="<?= $this->url->get('/user/profile') ?>" class="dropdown-item">Profile</a>
                        <a href="<?= $this->url->get('/borrow') ?>" class="dropdown-item">Requests</a>
                        <a href="<?= $this->url->get('/upgrade/') ?>" class="dropdown-item">Upgrade</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php } ?>
                        <a href="<?= $this->url->get('/session/logout') ?>" class="dropdown-item">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                    </div>
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
    <style>
        .cont {
            margin-top: 10pt;
        }
    </style>
</head>


<title>Daftar Buku</title>


<body>
    <div class="cont">
        
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            <strong>Edit Profil</strong>
        </div>
        <div class="card-header">
            <a href="<?= $this->url->get('/user/profile') ?>" class="btn btn-secondary">Back</a>
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
                <div class="form-group">
                    <label>Fullname</label>
                    <input type="text" name="name" class="form-control" placeholder="Fullname"
                        value="<?= $user->USER_NAME ?>">
                </div>
                <div class="form-group">
                    <label>Birthdate</label>
                    <input type="date" class="form-control" name="birthdate" value="<?= $user->USER_BIRTHDATE ?>">
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

    </div>
</body>

</html>