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




<body>
    <div class="cont">
        
<div class="container">
    <div class="page-header" style="text-align: center;">
        <h2>Upgraded Requests</h2>
    </div>
    <br>
    <div>
        <?= $this->flashSession->output() ?>
    </div>
    <table class="table table-hover">
        <thead>
            <tr class="text-center">
                <th>ID</th>
                <th>Username</th>
                <th>Upgrade Date</th>
                <th>Upgrade Accept Date</th>
                <th>Upgrade Status</th>
                <?php if ($this->session->get('auth')) { ?>
                <?php if ($this->session->get('auth')['category'] == 0) { ?>
                <th>Action</th>
                <?php } ?>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($upgrades as $upgrade) { ?>
            <tr class="text-center">
                <td><?= $upgrade->UPGRADE_ID ?></td>
                <td><?= $upgrade->users->USER_NAME ?></td>
                <td><?= $upgrade->UPGRADE_REQUESTDATE ?></td>
                <td><?= $upgrade->UPGRADE_RESPONDEDTIME ?></td>
                <?php if ($upgrade->UPGRADE_STATUS == 1) { ?>
                <td>Accepted</td>
                <?php } else { ?>
                <td>Pending</td>
                <?php } ?>
                <?php if ($this->session->get('auth')) { ?>
                <?php if ($this->session->get('auth')['category'] == 0) { ?>
                <td>
                    <a href="<?= $this->url->get('/upgrade/update/' . $upgrade->UPGRADE_ID) ?>" class="btn btn-info">Accept</a>
                </td>
                <?php } ?>
                <?php } ?>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

    </div>
</body>

</html>