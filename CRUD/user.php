<?php 
	include 'connection.php';

    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $password = mysqli_real_escape_string($con, $_POST['password']);

        $sql = "INSERT INTO crud (name, email, phone, password)
            VALUES('$name', '$email', '$phone', '$password')";

        $result = mysqli_query($con, $sql);

        if($result){
            header('location: display.php');
            exit();
        }else{
            die(mysqli_error($con));
        }
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user</title>
    <link rel="stylesheet" type="text/css" href="styles/user.css"> 
</head>
<body>
    <div class="container">
        <div id="title">
            <h1>Entre com os dados</h1>
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="item" id="name">
                <label for="inputName">Nome:</label>
                <input type="text" name="name" placeholder="Entre com o Nome" id="name-input">
            </div>
            <div class="item" id="email">
                <label for="inputEmail">E-mail:</label>
                <input type="text" name="email" placeholder="Entre com o E-mail" id="email-input">
            </div>
            <div class="item" id="phone">
                <label for="inputPhone">Telefone:</label>
                <input type="text" name="phone" placeholder="Entre com o Cartão" id="phone-input">
            </div>
            <div class="item" id="password">
                <label for="inputPassword">Senha:</label>
                <input type="password" name="password" placeholder="Entre com a Senha" id="password-input">
            </div>
            <div id="button">
                <button name="submit" type="submit">Enviar</button>
            </div>
        </form>

        <div class="btn">
            <a href="display.php"><button>Acessar Clientes Cadastrados</button></a>
        </div>
    </div>
</body>
</html>