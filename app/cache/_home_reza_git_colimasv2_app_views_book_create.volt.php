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
    
<div class="container">
        <div class="page-header" style="text-align: center;">
            <h2>Register New Book</h2>
        </div>
        <br>
        <form method="POST" action="<?= $this->url->get('/book/add') ?>" enctype="multipart/form-data" class="">
            <div>
                <?= $this->flashSession->output() ?>
            </div>
            <div class="form-group row">
                <label for="title">Title</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" placeholder="Ex: Nectar of Pain" required>
                    </div>
            </div>
            <div class="form-group row">
                <label for="year">Year</label>
                    <div class="col-sm-10">
                        <input type="text" name="year" placeholder="Ex: 2015" required>
                    </div>
            </div>
            <div class="form-group row">
                <label for="shelf">Shelf</label>
                <div class="col-sm-10">
                    <input type="text" name="shelf" placeholder="Ex: 1" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="description">Description</label><br>
            </div>
            <div class="form-group row">
                <textarea class="form-control" rows="2" name="description" placeholder="Ex: This book can help us understanding...">    
                </textarea>
            </div>
            <div class="form-group row">
                <label for="pagecount">Number of pages</label>
                <div class="col-sm-10">
                    <input type="text" name="pagecount" placeholder="Ex: 299" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="status">Status</label>
                <select name="status" class="form-control">
                    <option value="Available">Available</option>
                    <option value="Not Available">Not Available</option>
                </select>
            </div>
            <div class="form-group row">
                <label for="count">Count</label>
                <div class="col-sm-10">
                    <input type="text" name="count" placeholder="Ex: 2" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="coverimage">Cover Image</label>
                <input type="file" class="form-control-file" name="coverimage" required>
            </div>
            <div class="form-group row">
                <label for="authorid">Author</label>
                <!-- <input type="text" name="authorid" placeholder="Ex: 4" required> -->
                <select name="authorid" class="form-control">
                    <?php foreach ($authors as $author) { ?>
                        <option value="<?= $author->AUTHOR_ID ?>"><?= $author->AUTHOR_NAME ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group row">
                <label for="categoryid">Category</label>
                <select name="categoryid" class="form-control">
                    <?php foreach ($categories as $category) { ?>
                        <option value="<?= $category->CATEGORY_ID ?>"><?= $category->CATEGORY_NAME ?></option>
                    <?php } ?>
                </select>
            </div>
            
            <input type="submit" value="Add Book to Collections" class="btn btn-primary">
        </form>
</div>

</body>

</html>