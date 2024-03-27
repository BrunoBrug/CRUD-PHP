<?php 
	include 'connection.php';

    
    $id = (isset($_GET['updateid'])) ? $_GET['updateid'] : die("Update ID not provided");

    //mostra os dados atuais
    $selectQuery = "SELECT * FROM crud WHERE id = $id";
    $selectResult = mysqli_query($con, $selectQuery);

    if($selectResult) {
        $row = mysqli_fetch_assoc($selectResult);
        $name = $row['name'];
        $email = $row['email'];
        $phone = $row['phone'];
        $password = $row['password'];
    } else {
        die(mysqli_error($con));
    }

    //quando update é clicado, os dados são atualizados
    if(isset($_POST['submit'])){
        
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $password = mysqli_real_escape_string($con, $_POST['password']);

        $sql = "UPDATE crud SET name='$name', email='$email', phone='$phone', password='$password' 
        WHERE id=$id";

        $result = mysqli_query($con, $sql);

        if($result){
            header('location: display.php');
            exit();
        } else {
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
            <h1>Atualize os dados</h1>
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?updateid=' . $id; ?>" method="POST">
            <div class="item" id="name">
                <label for="inputName">Nome:</label>
                <input type="text" name="name" placeholder="Entre com o Nome" id="name-input" value="<?php echo $name; ?>">
            </div>
            <div class="item" id="email">
                <label for="inputEmail">E-mail:</label>
                <input type="text" name="email" placeholder="Entre com o E-mail" id="email-input" value="<?php echo $email; ?>">
            </div>
            <div class="item" id="phone">
                <label for="inputPhone">Telefone:</label>
                <input type="text" name="phone" placeholder="Entre com o Telefone" id="phone-input" value="<?php echo $phone; ?>">
            </div>
            <div class="item" id="password">
                <label for="inputPassword">Senha:</label>
                <input type="password" name="password" placeholder="Entre com a Senha" id="password-input" value="<?php echo $password; ?>">
            </div>
            <div id="button">
                <button name="submit" type="submit">Atualizar</button>
            </div>
        </form>

        <div class="btn">
            <a href="display.php"><button>Acessar Clientes Cadastrados</button></a>
        </div>
    </div>
</body>
</html>
