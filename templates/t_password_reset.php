<form method="POST" name="reset_password_form">
    <section class="gradient-custom">
        <div class="container py-4 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-light text-dark" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase">Password Reset</h2>
                                <p class="text-dark-50 mb-5">Insert your current password and the new password!</p>
                                <div class="form-outline form-white mb-4">
                                    <input type="password" name="current_password" id="current_password" class="form-control form-control-lg"
                                    value="<?php if(isset($_POST['current_password'])) { echo $_POST['current_password']; } ?>" autofocus />
                                    <label class="form-label" for="current_password">Curent Password</label>
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <input type="password" name="new_password" id="new_password" class="form-control form-control-lg"
                                    value="<?php if(isset($_POST['new_password'])) { echo $_POST['new_password']; } ?>" />
                                    <label class="form-label" for="new_password">New Password</label>
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <input type="password" name="new_password_c" id="new_password_c" class="form-control form-control-lg"
                                    value="<?php if(isset($_POST['new_password_c'])) { echo $_POST['new_password_c']; } ?>" />
                                    <label class="form-label" for="new_password_c">Confirm New Password</label>
                                </div>
                                <button class="btn btn-dark btn-lg px-5" type="submit" name="reset_password">Reset Password</button>
                            </div
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>