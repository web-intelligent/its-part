<?php 
    session_start();
    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);

    require_once 'base_connect.php';

    if(!empty($_POST['login'])) {
        $login = $_POST['login'];
        $pass = $_POST['pass'];

        $get_user = mysqli_query($connect, "SELECT * FROM users WHERE login='$login' AND pass='$pass'");
        $user = mysqli_fetch_assoc($get_user);

        var_dump($user);



        // header('Location: authorize.php');
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
                <h5 class="text-center">Авторизация</h5>
                <form action="" method="POST">
                    <div class="mb-3">
                        <input type="text" name="login" class="form-control" placeholder="Логин">
                    </div>
                    <div class="mb-3">
                        <input type="password" name="pass" class="form-control" placeholder="Пароль">
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-success" value="Регистрация">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>