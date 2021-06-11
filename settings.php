<?php 

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

if(!empty($_POST['host'])) {
    $host = $_POST['host'];
    $user_bd = $_POST['user_bd'];
    $pass_bd = $_POST['pass_bd'];
    $name_bd = $_POST['name_bd'];

    $connect = mysqli_connect($host, $user_bd, $pass_bd, $name_bd);
    mysqli_query($connect, "SET NAMES 'utf8'");

    $content = '<?php $connect = mysqli_connect('. "'$host'" .', '. "'$user_bd'" .', '. "'$pass_bd'" .', '. "'$name_bd'" .');'. 'mysqli_query($connect, "SET NAMES \'utf8\'");';

    if(!$connect) {
        die('Ошибка при создании соединения' . mysqli_connect_error());   
    } else {
        $create_users = "CREATE TABLE users (
            id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, 
            login VARCHAR(55), 
            pass VARCHAR(20), 
            phone VARCHAR(12),
            email VARCHAR(55),
            status VARCHAR(20)
        )";

        mysqli_query($connect, $create_users) or die(mysqli_error($connect));

        $create_products = "CREATE TABLE products (
            id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
            product_sku VARCHAR(20), 
            product_name VARCHAR(100),
            product_manufactory VARCHAR(100),  
            product_shipping VARCHAR(20),
            product_price INT(20),
            product_order VARCHAR(10),
            product_quantity INT(20)
        )";
        if(mysqli_query($connect, $create_products)) {
            file_put_contents('base_connect.php', $content);
            header('Location: admin_register.php');

        } else {
            echo "Ошибка";
        }
    }
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
                <h5 class="text-center">Подключение к базе данных</h5>
                <p>Для того, чтобы подключиться к базе данных, Вам необходимо знать <b>имя БД</b>, <b>имя пользователя БД</b>, <b>пароль от БД</b></p>
                <form action="" method="POST">
                    <div class="mb-3">
                        <input type="text" name="host" class="form-control" placeholder="Хост">
                    </div>
                    <div class="mb-3">
                        <input type="text" name="user_bd" class="form-control" placeholder="Пользователь БД">
                    </div>
                    <div class="mb-3">
                        <input type="text" name="pass_bd" class="form-control" placeholder="Пароль БД">
                    </div>
                    <div class="mb-3">
                        <input type="text" name="name_bd" class="form-control" placeholder="Имя БД">
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-primary" value="Отправить">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>