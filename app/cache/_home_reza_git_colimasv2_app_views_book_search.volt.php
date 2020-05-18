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
        <h2>Collections</h2>
    </div>
    <div class="page-header" style="text-align: center;">
        <form class="form-inline" method="POST" action="<?= $this->url->get('book/search') ?>">
            <input class="form-control mr-sm-2" type="search" placeholder="Search Member" aria-label="Search"
                name="searchKey">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
    <br>
    <?php if ($this->session->get('auth')) { ?>
    <div class="page-header">
        <a href="<?= $this->url->get('book/create') ?>" class="btn btn-primary">Add New Book into Collection</a>
        <br>
    </div>
    <?php } ?>
    <div>
        <?= $this->flashSession->output() ?>
        <br>
    </div>
    <table class="ui sortable selectable inverted brown celled table">
        <thead>
            <tr>
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
            <tr>
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
                <td>
                    <a href="<?= $this->url->get('/book/edit/' . $result->BOOK_ID) ?>" class="btn btn-primary"><span
                            class="fas fa-plus"></span>Edit</a>
                    <a href="<?= $this->url->get('/book/destroy/' . $result->BOOK_ID) ?>" class="btn btn-danger"><span
                            class="fas fa-plus"></span>Delete</a>
                </td>
                <?php } ?>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

</body>

</html>