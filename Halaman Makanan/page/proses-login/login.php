<?php include '_component/header.php'; ?>
<link rel="stylesheet" href="../style1.css">

<!-- content home -->
<div class="content">
    <div class="container background-content" style="width: 50%">
        <!-- menu -->
        <!-- makanan -->
        <div class="judul text-center" style="padding-top: 50px;">
            <h1 class="lobster-regular" style="font-size: 50px; text-align: center; color: #fff; padding-bottom: 50px;">
                Login
            </h1>
        </div>
        <div class="login">
            <form id="loginForm" action="proses-login/proses-login.php" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label" style="font-size: 20px; color: #fff;">
                        Email address
                    </label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="email" style="width: 100%;" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label"
                        style="font-size: 20px; color: #fff; width: 100%; text-align: left;">
                        Password
                    </label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password"
                        style="width: 100%;" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<!-- end content -->
<?php include '_component/footer.php'; ?>