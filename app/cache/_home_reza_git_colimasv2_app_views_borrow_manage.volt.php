<!DOCTYPE html>
<html lang="en">
    <?= $this->assets->outputCss() ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colimas</title>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgba(150, 180, 255, 1);">
        <a href="<?= $this->url->get('/') ?>" class="navbar-brand"><img src="/img/logo-small-navbar-resize.png" width="120" height="50" alt=""></a>
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




<body>
    
<div class="container">
    <div class="page-header" style="text-align: center;">
        <h2>Borrow Requests</h2>
    </div>
    <br>
    <div>
        <?= $this->flashSession->output() ?>
    </div>
    <table class="ui sortable selectable inverted brown celled table">
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
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($borrows as $borrow) { ?>
            <tr class="center aligned">
                <th><?= $borrow->BORROW_ID ?></th>
                <th><?= $borrow->books->BOOK_TITLE ?></th>
                <th><?= $borrow->users->USER_NAME ?></th>
                <th><?= $borrow->users->USER_CATEGORY ?></th>
                <th><?= $borrow->BORROW_STARTDATE ?></th>
                <th><?= $borrow->BORROW_EXPECTEDRETURNDATE ?></th>
                <th><?= $borrow->BORROW_RETURNDATE ?></th>
                <th><?= $borrow->BORROW_STATUS ?></th>
                <td>
                    <a href="<?= $this->url->get('/borrow/detail/' . $borrow->BORROW_ID) ?>" class="btn btn-info">View Detail</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

</body>
</html>
