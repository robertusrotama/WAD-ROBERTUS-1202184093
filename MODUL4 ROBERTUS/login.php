<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body style="background-color:azure;">
    <!-- navigation bar -->
    <nav class="navbar navbar-expand-sm navbar-light justify-content-center">
        <a class="navbar-brand" href="#" style="margin-right:1090px;">WAD Beauty</a>
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="login.php">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="register.php">Register</a>
            </li>
        </ul>
    </nav>

    <!-- PHP -->
    <?php
    include("connect.php");

    if (isset($_POST['login'])) {

        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        $sql = "SELECT * FROM user WHERE email=email";
        $stmt = $conn->prepare($sql);

        $params = array(":email" => $email);

        $stmt->execute($params);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        //pengondisian
        //jika user terdaftar
        if ($user) {
            //verif password
            if (password_verify($password, $user['password'])) {
                session_start();
                $_SESSION["user"] = $user;

                //remember me
                if (isset($_POST['remember'])) {
                    setcookie('login', 'true', time() + 60);
                }

                //login sukses akan diarahkan ke halaman utama wad beauty
                echo '<div class="alert alert-success">Login Berhasil</div>';
                header("Location: index.php");
            } else {
                echo '<div class="alert alert-success">Login Gagal</div>';
            }
        }
    }
    ?>
    <!-- FORM LOGIN -->
    <div class="d-flex justify-content-center" style="margin-top:20px">
        <div class="shadow bg-white rounded">
            <div class="card">
                <form action="login.php" method="POST">
                    <div class="card-body" style="width: 500px;">
                        <h3 style="text-align:center; margin-top: 10px;">Login</h3>
                        <hr style="width: 80%;">
                        <div class="form-group" style="width: 300px; margin-left: 80px;">
                            <label for="nama">Email</label>
                            <input type="text" class="form-control" name="email">
                        </div>
                        <div class="form-group" style="width: 300px; margin-left: 80px;">
                            <label for="password">Kata Sandi</label>
                            <input type="password" class="form-control" name="password" />
                        </div>
                        <div class="form-check-inline" style="margin-left: 80px;">
                            <label class="form-check-label">
                                <input type="checkbox" name="remember" class="form-check-input" value="remember">Remember Me
                            </label>
                        </div>
                        <br><br>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" name="login">Login</button>
                        </div><br>
                        <p style="text-align: center;">Belum punya akun? <a href="register.php">Registrasi</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>