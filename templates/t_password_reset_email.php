<form method="POST">
    <section class="gradient-custom">
        <div class="container py-4 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-light text-dark" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase">Recover Password</h2>
                                <p class="text-dark fw-bold my-5">Provide your email so we can give you a password recovery link!</p>
                                <div class="form-outline form-white mb-4">
                                    <input type="email" name="email" id="email" class="form__data"
                                    value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } ?>" autofocus/>
                                    <label class="form-label" for="typeEmailX">Email</label>
                                </div>
                                <button class="bttn btn_lg btn-green-600" type="submit" name="recover_password">Send Recovery Link</button>
                            </div
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>