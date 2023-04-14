<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-8 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block mt-5">
                            <img src="<?= base_url('assets/img/joni.png') ?>" alt="" width="110%" height="80%">
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-dark font-weight-bold mb-4">Dashboard PAV</h1>
                                    <?= $this->session->flashdata('message') ?>
                                </div>
                                <form class="user" method="POST" action="<?= base_url('auth') ?>">
                                    <div class="form-group">
                                        <input type="text"
                                            class="form-control form-control-user font-weight-bold text-primary"
                                            id="USER_NAME" name="USER_NAME" aria-describedby="usernamelHelp"
                                            placeholder="Username..." value="<?= set_value('USER_NAME') ?>"
                                            autocomplete="off">
                                        <?= form_error('USER_NAME', '<small class="text-danger ml-3">', '</small>') ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password"
                                            class="form-control form-control-user font-weight-bold text-primary"
                                            id="myInput" name="PASSWORD" placeholder="Password">
                                        <?= form_error('PASSWORD', '<small class="text-danger ml-3">', '</small>') ?>
                                    </div>
                                    <div class="form-group ml-2">
                                        <small>
                                            <input type="checkbox" onclick="myFunction()"> Show Password
                                        </small>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block font-weight-bold">
                                        LOGIN
                                    </button>
                                    <!-- <a href="<?= base_url('admin') ?>">Login</a> -->
                                </form>
                                <hr>
                                <div class="text-center">
                                    <p class="small text-primary font-weight-bold">Lupa Password?
                                        <a class="text-danger font-italic font-weight-bold"
                                            href="<?= base_url('auth/lupa_password') ?>">Login Pav</a>
                                    </p>
                                </div>
                                <!-- <div class="text-center">
                                    <a class="small" href="<?= base_url('auth/register') ?>">Create an Account!</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>