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
</head>




<body>
    
<div class="container-fluid">
    <div class="page-header" style="text-align: center;">
        <h2>Collections</h2>
    </div>
    <div class="page-header">
        <form class="form-inline">
            <a href="<?= $this->url->get('/book') ?>" class="btn btn-secondary">Back</a>
        </form>
    </div>
    <br>
    <div class="page-header" style="text-align: center;">
        <form class="form-inline" method="POST" action="<?= $this->url->get('book/search') ?>">
            <input class="form-control mr-sm-2" type="search" placeholder="Search Books" aria-label="Search"
                name="searchKey">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
    <br>
    <?php if ($this->session->get('auth')) { ?>
    <?php if ($this->session->get('auth')['category'] == 0) { ?>
    <div class="page-header">
        <a href="<?= $this->url->get('book/create') ?>" class="btn btn-primary">Add New Book into Collection</a>
        <br>
    </div>
    <?php } ?>
    <?php } ?>
    <div>
        <?= $this->flashSession->output() ?>
        <br>
    </div>
    <table class="table table-hover">
        <thead>
            <tr class="text-center">
                <th>ID</th>
                <th>Title</th>
                <th>Year</th>
                <th>Shelf</th>
                <th>Pages</th>
                <th>Status</th>
                <th>Count</th>
                <th>Author</th>
                <th>Category</th>
                <?php if ($this->session->get('auth')) { ?>
                <th>Action</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($results as $result) { ?>
            <tr class="text-center">
                <td><?= $result->BOOK_ID ?></td>
                <td><?= $result->BOOK_TITLE ?></td>
                <td><?= $result->BOOK_YEAR ?></td>
                <td><?= $result->BOOK_SHELF ?></td>
                <td><?= $result->BOOK_PAGECOUNT ?></td>
                <td><?= $result->BOOK_STATUS ?></td>
                <td><?= $result->BOOK_COUNT ?></td>
                <td><?= $result->authors->AUTHOR_NAME ?></td>
                <td><?= $result->categories->CATEGORY_NAME ?></td>
                <?php if ($this->session->get('auth')) { ?>
                <?php if ($this->session->get('auth')['category'] == 0) { ?>
                <td>
                    <a href="<?= $this->url->get('/book/edit/' . $result->BOOK_ID) ?>" class="btn btn-primary">Edit</a>
                    <a href="<?= $this->url->get('/book/destroy/' . $result->BOOK_ID) ?>" class="btn btn-danger">Delete</a>
                </td>
                <?php } elseif ($this->session->get('auth')) { ?>
                <?php if ($result->BOOK_COUNT == 0) { ?>
                <td>
                    <a href="<?= $this->url->get('borrow/add/' . $result->BOOK_ID) ?>" class="btn btn-success btn-sm disabled">Pinjam</a>
                </td>
                <?php } else { ?>
                <td>
                    <a href="<?= $this->url->get('borrow/add/' . $result->BOOK_ID) ?>" class="btn btn-success btn-sm">Pinjam</a>
                </td>
                <?php } ?>
                <?php } else { ?>
                <?php } ?>
                <?php } ?>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

</body>

</html>