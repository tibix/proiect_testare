<div class="container bootstrap snippets bootdey">
    <div class="row">
        <div class="profile-nav col-md-3">
            <div class="panel">
                <div class="user-heading round">
                    <img src="https://cdn1.iconfinder.com/data/icons/ninja-things-1/1772/ninja-512.png" alt="" class="img-thumbnail rounded">
                    <h1 class="text-center"><?=$_SESSION['first_name'].' '.$_SESSION['last_name']?></h1>
                    <p class="text-center"><?=$_SESSION['email']?></p>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row input_fields">
                <div class="col mb-2">
                    <button type="button" id="enable_form" class="btn btn-block btn-secondary">Enable Form</button>
                    <a class="btn btn-danger float-end" href="password_reset.php">Reset Password</a>
                </div>
                <form method="POST">
                <div class="col mb-4">
                    <div class="form-floating">
                        <input type="text" id="user_name" name="user_name" class="form-control"
                               value="<?php if(isset($_SESSION['username'])) { echo $_SESSION['username']; } ?>" autofocus required/>
                        <label class="form-label" for="user_name">Username</label>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="form-floating">
                        <input type="text" id="first_name" name="first_name" class="form-control"
                               value="<?php if(isset($_SESSION['first_name'])) {echo($_SESSION['first_name']);}?>" required/>
                        <label class="form-label" for="first_name">First Name</label>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="form-floating">
                        <input type="text" id="last_name" name="last_name" class="form-control"
                               value="<?php if(isset($_SESSION['last_name'])) {echo($_SESSION['last_name']);}?>" required/>
                        <label class="form-label" for="last_name">Last Name</label>
                    </div>
                </div>
                <div class="col mb-4 pb-2">
                    <div class="form-floating">
                        <input type="email" id="email" name="email" class="form-control"
                               value="<?php if(isset($_SESSION['email'])) {echo($_SESSION['email']);} ?>" required/>
                        <label class="form-label" for="email">Email</label>
                    </div>
                </div>
                <div class="col mb-4 pb-2">
                    <div class="form-floating">
                        <select class="form-control" name="language" id="language">
                            <option value="no_language" disabled selected class="text-muted"> ... select your language ...</option>
                            <option value="en" <?php  if($_SESSION['lang'] == 'en') { echo "selected"; }?>>English</option>
                            <option value="ro" <?php  if($_SESSION['lang'] == 'ro') { echo "selected"; }?>>Romanian</option>
                            <option value="hu" <?php  if($_SESSION['lang'] == 'hu') { echo "selected"; }?>>Hungarian</option>
                            <option value="fr" <?php  if($_SESSION['lang'] == 'fr') { echo "selected"; }?>>French</option>
                            <option value="de" <?php  if($_SESSION['lang'] == 'de') { echo "selected"; }?>>German</option>
                        </select>
                        <label class="form-label" for="language">Preffered Language</label>
                    </div>
                </div>
                <div class="col mb-4 pb-2">
                    <div class="form-floating">
                        <input id="date_created" class="form-control" disabled value="to be added">
                        <label class="form-label" for="date_created">Date Created</label>
                    </div>
                </div>
                <div class="col-md-6 mb-4 pb-2">
                    <button type="submit" id="save_data" name="update_profile" class="btn btn-primary mb-2">Save User Data</button>
                </div>
                </form>
<<<<<<< HEAD

=======
>>>>>>> 9445849 (Profile update functionality done)
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header bg-primary text-light fw-bold">
                    Latest bookmarks added
                </div>
                <div class="card-body">
                    <ul>
<<<<<<< HEAD
                        <?php if(sizeof($latest_bms) > 0 && sizeof($latest_bms < 5)):?>
                            <?php foreach($latest_bms as $lbm):?>
                                <li><a href="<?=$lbm['URL']?>" class="text-dark" target="_blank"><?=$lbm['title'];?></a></li>
                            <?php endforeach;?>
                            <li><a href="new_bookmark.php"><i class="fa fa-plus"></i> Add New Bookmark</a></li>
                        <?php else:?>
                            <?php foreach($latest_bms as $lbm):?>
                                <li><a href="<?=$lbm['URL']?>" class="text-dark" target="_blank"><?=$lbm['title'];?></a></li>
                            <?php endforeach;?>
                        <?php endif; ?>
=======
                        <?php foreach($latest_bms as $lbm):?>
                            <li><a href="<?=$lbm['URL']?>" class="text-dark" target="_blank"><?=$lbm['title'];?></a></li>
                        <?php endforeach;?>
>>>>>>> 9445849 (Profile update functionality done)
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header bg-primary text-light fw-bold">
                    Latest vavorites
                </div>
                <div class="card-body">
                    <ul>
                        <li>1</li>
                        <li>2</li>
                        <li>3</li>
                        <li>4</li>
                        <li>5</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card">
                <h5 class="card-header">Featured</h5>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <h5 class="card-header">Featured</h5>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <h5 class="card-header">Featured</h5>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const input_fields = Array.from(document.querySelector(".input_fields").getElementsByTagName("input"));
    const select_list = document.getElementById('language');
    const submit = document.getElementById('save_data');
    const enable_form = document.getElementById("enable_form");
<<<<<<< HEAD
    const select_list = document.getElementById("language");
    const submit = document.getElementById("save_data");
=======
>>>>>>> 9445849 (Profile update functionality done)

    let total_inputs = input_fields.length;
    let index = 0;

    while(total_inputs){
        input_fields[index++].disabled = true;
        total_inputs--;
    }
<<<<<<< HEAD

=======
>>>>>>> 9445849 (Profile update functionality done)
    select_list.disabled = true;
    submit.disabled = true;

    enable_form.addEventListener("click", () => {
        input_fields.forEach((input) => {
            input.disabled = false;
            console.log("Clicked");
            console.log(input.name + " is now Enabled");
            select_list.disabled=false;
            submit.disabled=false;
        });
    });
</script>
