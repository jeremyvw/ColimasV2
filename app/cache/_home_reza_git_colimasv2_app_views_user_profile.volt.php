<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <link rel="stylesheet" href="/css/profil.css">
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
                    <a href="<?= $this->url->get('/borrow/manage') ?>" class="nav-link">Requests</a>
                </li>
                <li class="nav-item">
                    <!-- <span class="nav-link">Welcome, <?= $this->session->get('auth')['name'] ?></span> -->
                    <a href="<?= $this->url->get('/user/profile') ?>" class="nav-link">
                        <span>Welcome, <?= $this->session->get('auth')['name'] ?></span>
                    </a>
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

<body>
    <div class="container emp-profile">
        <form method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <?php if ($user->USER_PHOTO) { ?>
                        <img src="<?= $this->url->get($user->USER_PHOTO) ?>" />
                        <?php } else { ?>
                        <img src="/img/profiles/basicpict.png" />
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <h5>
                            <?= $user->USER_USERNAME ?>
                        </h5>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                    aria-controls="home" aria-selected="true">About</a>
                            </li>
                        </ul>
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="row ">
                                <div class="col-md-3">
                                    <label>Username</label>
                                </div>
                                <div class="col-md-4">
                                    <p><?= $user->USER_NAME ?></p>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-3">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-4">
                                    <p><?= $user->USER_EMAIL ?></p>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-3">
                                    <label>Gender</label>
                                </div>
                                <div class="col-md-4">
                                    <!-- <?php if ($user->USER_GENDER == 'L') { ?>
                                        <p>Laki-Laki</p>
                                        <?php } else { ?>
                                        <p>Perempuan</p>
                                        <?php } ?> -->
                                    <p><?= $user->USER_GENDER ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Member</label>
                                </div>
                                <div class="col-md-4">
                                    <?php if ($user->USER_CATEGORY == 1) { ?>
                                    <p>Bronze</p>
                                    <?php } elseif ($user->USER_CATEGORY == 2) { ?>
                                    <p>Silver</p>
                                    <?php } elseif ($user->USER_CATEGORY == 3) { ?>
                                    <p>Gold</p>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <a href="<?= $this->url->get('/user/edit') ?>" class="profile-edit-btn">Edit Profile</a>
                    <!-- <input class="profile-edit-btn" name="btnAddMore" value="Edit Profile"
                            onclick="<?= $this->url->get('/users/edit') ?>" /> -->
                    <a href="<?= $this->url->get('/upgrade') ?>" class="profile-edit-btn">Upgrade Member</a>
                </div>
            </div>
            <!-- <div class="container">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            
                        </div>
                    </div>
                </div> -->
        </form>
    </div>
</body>

</html>