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
</head>




<body>
    
<!-- <h1>Welcome to Our Library</h1> -->
<style>
    h1 {
        font-weight: 400;
        text-transform: uppercase;
        font-size: 28px;
    }

    .main-text {
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        width: 100%;
        
        /* You need to define an explicit height! */
        height: 0vh;
    }

    .button{
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        width: 100%;
        height: 20vh;
        transition-duration: 0.4s;
    }

    .btn{
        border: 2px solid #008CBA;
        padding: 10px 30px;
        text-decoration: none;
        font-size: 13px;
        text-transform: uppercase;
        background-color: white;
    }
    
    .btn:hover{
        background-color: cornflowerblue;
    }



</style>
<img src="/img/logo-large-resize.png" style="display: block; margin-left: auto; margin-right: auto; margin-top: 0px;" alt="">
    <div class="main-text">
        <h1>Welcome to our Library</h1>
    </div>
            <div class="button">
                <a href="/book/manage" class="btn btn-hover">View Collections</a>
            </div>


</body>

</html>