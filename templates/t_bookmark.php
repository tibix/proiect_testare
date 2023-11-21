<form method="POST">
    <section class="gradient-custom">
        <div class="container py-2 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-light text-dark" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase"><?=$form_title?> Bookmark</h2>

                                <div class="form-outline form-white mb-4">
                                    <input type="text" name="title" id="title" class="form-control form-control-lg"
                                           value="<?php if(isset($title)) { echo $title; } ?>" />
                                    <label class="form-label" for="title">Bookmark Title</label>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <input type="text" name="url" id="url" class="form-control form-control-lg"
                                           value="<?php if(isset($url)) { echo $url; } ?>" />
                                    <label class="form-label" for="url">URL</label>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <textarea name="description" id="description" class="form-control form-control-lg" rows="4"><?php if(isset($description)) { echo $description; } ?></textarea>
                                    <label class="form-label" for="description">Bookmark Description</label>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <select class="form-control form control-lg" name="category" id="category">
                                        <option value="0" disabled selected> ... select a category ...</option>
                                        <option value="1">Categ 1</option>
                                        <option value="2">Categ 2</option>
                                        <option value="3">Categ 3</option>
                                        <option value="4">Categ 4</option>
                                    </select>
                                    <label class="form-label" for="category">Bookmark Category</label>
                                </div>

                                <button class="btn btn-outline-dark btn-lg px-5" type="submit" name="save">Save</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
