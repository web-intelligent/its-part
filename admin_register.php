<?php 
    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);

    require_once 'base_connect.php';

    if(!empty($_POST['login'])) {
        $login = $_POST['login'];
        $pass = $_POST['pass'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $status = 'admin';

        mysqli_query($connect, "INSERT INTO users SET login='$login', pass='$pass', phone='$phone', email='$email', status='$status'");

        header('Location: authorize.php');
    }


?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<style>
.form-container {
    display: flex;
    justify-content:center;
    /* align-items:center; */
    flex-direction:column;
    height:100vh;
}
</style>

<div class="container">
    <div class="row">
        <div class="col-sm-12 col-lg-6 offset-sm-0 offset-lg-3">
            <div class="form-container">
                <h5 class="text-center">Регистрация администратора</h5>
                <p>Вам необходимо ввести данные администратора сайта</p>
                <form action="" method="POST">
                    <div class="mb-3">
                        <input type="text" name="login" class="form-control" placeholder="Логин">
                    </div>
                    <div class="mb-3">
                        <input type="password" name="pass" class="form-control" placeholder="Пароль">
                    </div>
                    <div class="mb-3">
                        <input type="text" name="phone" class="form-control" placeholder="Номер телефона">
                    </div>
                    <div class="mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-success" value="Регистрация">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>