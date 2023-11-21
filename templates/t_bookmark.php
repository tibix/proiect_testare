<form method="POST">
    <section class="gradient-custom">
        <div class="container py-2 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-light text-dark" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase">Add a new bookmark</h2>

                                <div class="form-outline form-white mb-4">
                                    <input type="text" name="title" id="title" class="form-control form-control-lg"
                                           value="<?php if(isset($_POST['title'])) { echo $_POST['title']; } ?>" />
                                    <label class="form-label" for="title">Bookmark Title</label>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <input type="text" name="url" id="url" class="form-control form-control-lg"
                                           value="<?php if(isset($_POST['url'])) { echo $_POST['url']; } ?>" />
                                    <label class="form-label" for="url">URL</label>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <textarea name="description" id="description" class="form-control form-control-lg" rows="4"></textarea><?php if(isset($_POST['title'])) { echo $_POST['title']; } ?></textarea>
                                    <label class="form-label" for="description">Bookmark Title</label>
                                </div>

                                <button class="btn btn-outline-dark btn-lg px-5" type="save_bookmark" name="autentificare">Save Bookmark</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
