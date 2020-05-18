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
                        <a href="#" class="dropdown-item">Upgrade</a>
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
</head>




<body>
    
<div class="container-fluid">
    <div class="page-header" style="text-align: center;">
        <h2>Borrow Requests</h2>
    </div>
    <br>
    <div>
        <?= $this->flashSession->output() ?>
    </div>
    <table class="table">
        <thead>
            <tr class="center aligned">
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
            <?php foreach ($borrows as $borrow) { ?>
            <tr class="center aligned">
                <td><?= $borrow->BORROW_ID ?></td>
                <td><?= $borrow->books->BOOK_TITLE ?></td>
                <td><?= $borrow->users->USER_NAME ?></td>
                <td><?= $borrow->users->USER_CATEGORY ?></td>
                <td><?= $borrow->BORROW_STARTDATE ?></td>
                <td><?= $borrow->BORROW_EXPECTEDRETURNDATE ?></td>
                <td><?= $borrow->BORROW_RETURNDATE ?></td>
                <td><?= $borrow->BORROW_STATUS ?></td>
                <td><?= $borrow->BORROW_PENALTY ?></td>

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

</body>

</html>