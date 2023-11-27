<div class="container bootstrap snippets bootdey">
    <div class="row">
        <div class="profile-nav col-md-3">
            <div class="panel">
                <div class="user-heading round">
                    <a href="#">
                        <img src="https://cdn1.iconfinder.com/data/icons/ninja-things-1/1772/ninja-512.png" alt="" class="img-thumbnail rounded">
                    </a>
                    <h1 class="text-center"><?=$_SESSION['first_name'].' '.$_SESSION['last_name']?></h1>
                    <p class="text-center"><?=$_SESSION['email']?></p>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                <button type="button" class="btn btn-lg btn-outline-primary btn-block mb-2">Enable Edit</button>

                <div class="col-md-6 mb-4">
                    <div class="form-outline">
                        <input type="text" id="user_name" name="user_name" class="form-control form-control-lg"
                               value="<?php if(isset($_SESSION['username'])) { echo $_SESSION['username']; }?>" autofocus />
                        <label class="form-label" for="user_name">Username</label>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="form-outline">
                        <input type="text" id="first_name" name="first_name" class="form-control form-control-lg"
                               value="<?php if(isset($_SESSION['first_name'])) { echo($_SESSION['first_name']);}?>" />
                        <label class="form-label" for="first_name">First Name</label>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="form-outline">
                        <input type="text" id="last_name" name="last_name" class="form-control form-control-lg"
                               value="<?php if(isset($_SESSION['last_name'])) {echo($_SESSION['last_name']);}?>" />
                        <label class="form-label" for="last_name">Last Name</label>
                    </div>
                </div>
                <div class="col-md-6 mb-4 pb-2">
                    <div class="form-outline">
                        <input type="email" id="email" name="email" class="form-control form-control-lg"
                               value="<?php if(isset($_SESSION['email'])) {echo($_SESSION['email']);} ?>" />
                        <label class="form-label" for="email">Email</label>
                    </div>
                </div>
                <div class="col-md-6 mb-4 pb-2">
                    <select class="form-control form-control-lg" name="language" id="language">
                        <option value="no_language" disabled selected class="text-muted"> ... select your language ...</option>
                        <option value="en">English</option>
                        <option value="ro">Romanian</option>
                        <option value="hu">Hungarian</option>
                        <option value="fr">French</option>
                        <option value="de">German</option>
                    </select>
                    <label class="form-label" for="language">Preffered Language</label>
                </div>
                <div class="col-md-6 mb-4 pb-2">
                    <input id="date_created" class="form-control form-control-lg" disabled value="to be added">
                    <label class="form-label" for="date_created">Date Created</label>
                </div>
                <button type="submit" class="btn btn-lg btn-primary btn-block mb-2">Save User Data</button>
                <a href="password_reset.php" class="btn btn-lg btn-dark btn-block mb-2">Reset Password</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header bg-outline-primary">
                    Latest bookmarks added
                </div>
                <div class="card-body">
                    <ul>
                        <li class="item">1</li></hr>
                        <li>2</li></hr>
                        <li>3</li></hr>
                        <li>4</li></hr>
                        <li>5</li></hr>

                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header bg-danger text-light">
                    Latest vavorites
                </div>
                <div class="card-body">
                    <ul>
                        <li>1</li></hr>
                        <li>2</li></hr>
                        <li>3</li></hr>
                        <li>4</li></hr>
                        <li>5</li></hr>
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