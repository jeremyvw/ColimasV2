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
                        <a href="<?= $this->url->get('/user/profile') ?>" class="dropdown-item">Profile</a>
                        <a href="<?= $this->url->get('/borrow') ?>" class="dropdown-item">Requests</a>
                        <a href="<?= $this->url->get('/upgrade/request') ?>" class="dropdown-item">Upgrade</a>
                        <div class="dropdown-divider"></div>
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




<body>
    <div class="cont">
        
<div class="container-fluid">
    <div class="page-header" style="text-align: center;">
        <h2>Borrow Requests</h2>
    </div>
    <br>
    <div class="page-header">
        <!-- <form class="form-inline"> -->
        <a href="<?= $this->url->get('/borrow') ?>" class="btn btn-secondary">Back</a>
        <!-- </form> -->
    </div>
    <div>
        <?= $this->flashSession->output() ?>
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
                <?php if ($this->session->get('auth')['category'] == 0) { ?>
                <th>Action</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($filters as $filt) { ?>
            <tr class="text-center">
                <td><?= $filt->BORROW_ID ?></td>
                <td><?= $filt->books->BOOK_TITLE ?></td>
                <td><?= $filt->users->USER_NAME ?></td>
                <td><?= $filt->users->USER_CATEGORY ?></td>
                <td><?= $filt->BORROW_STARTDATE ?></td>
                <td><?= $filt->BORROW_EXPECTEDRETURNDATE ?></td>
                <td><?= $filt->BORROW_RETURNDATE ?></td>
                <td><?= $filt->BORROW_STATUS ?></td>
                <td><?= $filt->BORROW_PENALTY ?></td>

                <?php if ($this->session->get('auth')['category'] == 0) { ?>
                <td>
                    <a href="<?= $this->url->get('/borrow/detail/' . $borrow->BORROW_ID) ?>" class="btn btn-info">View Detail</a>
                </td>
                <?php } ?>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

    </div>
</body>

</html>