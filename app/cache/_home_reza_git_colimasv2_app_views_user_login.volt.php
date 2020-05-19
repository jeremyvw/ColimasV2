<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colimas</title>
    <link rel="stylesheet" href="/css/logreg.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row no-gutter">
            <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
            <div class="col-md-8 col-lg-6">
                <div class="login d-flex align-items-center py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 col-lg-8 mx-auto">
                                <h3 class="login-heading mb-4">Welcome back!</h3>
                                <form method="POST" action="<?= $this->url->get('/session/login') ?>">
                                    <div>
                                        <?= $this->flashSession->output() ?>
                                    </div>
                                    <div class="form-label-group">
                                        <input type="email" name="email" class="form-control"
                                            placeholder="Email address" required autofocus>
                                    </div>
                                    <div class="form-label-group">
                                        <input type="password" name="password" class="form-control"
                                            placeholder="Password" required>
                                    </div>
                                    <button
                                        class="btn btn-lg btn-success btn-block btn-login text-uppercase font-weight-bold mb-2"
                                        type="submit">Login</button>
                                    <div class="text-center">
                                        <span class="small">Don't have an account?</span>
                                        <a class="small" href="<?= $this->url->get('/user/register') ?>">Register</a></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>