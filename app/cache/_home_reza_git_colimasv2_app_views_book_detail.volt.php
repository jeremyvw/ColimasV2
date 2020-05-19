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


<title>Book Detail</title>


<body>
    <div class="cont">
        
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
                <img src="<?= $book->BOOK_COVERIMAGE ?>" width="" height="150" alt="225">
            </div>
        </div>
        <div class="col-md-5">
            <div class="profile-head">
                <h5>
                    <?= $book->BOOK_TITLE ?>
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
                            <p><?= $user->USER_NAME ?></p>
                        </div>
                    </div> -->
                    <div class="row " style="padding-bottom: 5pt;">
                        <div class="col-md-4">
                            <label>Year</label>
                        </div>
                        <div class="col-md-4">
                            <p><?= $book->BOOK_YEAR ?></p>
                        </div>
                    </div>
                    <div class="row " style="padding-bottom: 5pt;">
                        <div class="col-md-4">
                            <label>Shelf</label>
                        </div>
                        <div class="col-md-4">
                            <p><?= $book->BOOK_SHELF ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Description</label>
                        </div>
                        <div class="col-md-4">
                            <p>
                                <?= $book->BOOK_DESCRIPTION ?>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Total Pages</label>
                        </div>
                        <div class="col-md-4">
                            <p>
                                <?= $book->BOOK_PAGECOUNT ?>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Status</label>
                        </div>
                        <div class="col-md-4">
                            <p>
                                <?= $book->BOOK_STATUS ?>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Count</label>
                        </div>
                        <div class="col-md-4">
                            <p>
                                <?= $book->BOOK_COUNT ?>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Author</label>
                        </div>
                        <div class="col-md-4">
                            <p>
                                <?= $book->authors->AUTHOR_NAME ?>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Category</label>
                        </div>
                        <div class="col-md-4">
                            <p>
                                <?= $book->categories->CATEGORY_NAME ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <a href="<?= $this->url->get('/borrow/add/' . $book->BOOK_ID) ?>" class="profile-edit-btn">Pinjam</a><br>

        </div>
    </div>
</div>

    </div>
</body>

</html>