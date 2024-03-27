<?php 
  require 'connection.php';
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>display</title>
    <link rel="stylesheet" type="text/css" href="styles/display.css">
</head>
<body>
  <div class="container">
    <div class="btn">
      <a href="user.php"><button>Adicionar Cliente</button></a>
    </div>
    <table id="customers">
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Telefone</th>
        <th>Senha</th>
        <th>Operações</th>
      </tr>

      <?php 
      $sql = "SELECT * FROM crud";
      $result = mysqli_query($con, $sql);
      
      if($result){
        while($row = mysqli_fetch_assoc($result)){
          $id = $row['id'];
          $name = $row['name'];
          $email = $row['email'];
          $phone = $row['phone'];
          $password = $row['password'];

          echo '<tr>
          <td>'.$id.'</td>
          <td>'.$name.'</td>
          <td>'.$email.'</td>
          <td>'.$phone.'</td>
          <td>'.$password.'</td>
          <td>
          <button><a href="update.php?updateid='.$id.'">Update</a></button>
          <button><a href="delete.php?deleteid='.$id.'">Delete</a></button>
      </td>
        </tr>';
        }
      }
      ?>

    </table>
  </div>
</body>
</html>