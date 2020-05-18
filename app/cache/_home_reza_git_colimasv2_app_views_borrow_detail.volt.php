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




<body>
    
<div class="container">
    <div class="page-header" style="text-align: center;">
        <h2>Request Detail</h2>
    </div>
    <br>
    <form method="POST" autocomplete="off" action="<?= $this->url->get('/borrow/update/' . $borrow->BORROW_ID) ?>" enctype="multipart/form-data" class="ui form">
        <div class="form-group row">
            <label for="id">ID</label>
            <div class="col-sm-10">
                <input type="text" class="" name="title" value="<?= $borrow->BORROW_ID ?>" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="bookid">Book ID</label>
            <div class="col-sm-10">
                <input type="text" name="bookid" required value="<?= $borrow->BOOK_ID ?>" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="userid">User ID</label>
            <div class="col-sm-10">
                <input type="text" name="userid" required value="<?= $borrow->USER_ID ?>" readonly>
            </div>
        </div>
        <div class="form-group row">
                <label for="startdate">Start Date</label>
                <div class="col-sm-10">
                    <input type="date" name="startdate" required value="<?= $borrow->BORROW_STARTDATE ?>" readonly>
                </div>
        </div>
        <div class="form-group row">
            <label for="expectedreturndate">Expected Return Date</label>
            <div class="col-sm-10">
                <input type="date" name="expectedreturndate" required value="<?= $borrow->BORROW_EXPECTEDRETURNDATE ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="returndate">Return Date</label>
            <div class="col-sm-10">
                <input type="text" name="returndate" value="<?= $borrow->BORROW_RETURNDATE ?>" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="status">Status</label>
            <select name="status" class="form-control">
                <option value="Pending">Pending</option>
                <option value="Accepted">Accepted</option>
                <option value="Finished">Finished</option>
            </select>
        </div>
        <input type="submit" value="Save changes" class="btn btn-success">
    </form>
</div>

</body>

</html>