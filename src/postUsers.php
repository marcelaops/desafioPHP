<?php
  switch ($_REQUEST["action"]) {
    // 1. Create
    case 'post':
      $name = $_POST["name"];
      $email = $_POST["email"];

      $sql = "INSERT INTO users (name, email) VALUES ('{$name}', '{$email}')";

      // resultado da query:
      $res = $conn -> query($sql);

      if ($res == true) {
        echo "Cadastrado";
        echo "<script>location.href='?page=list';</script>";
      } else {
        echo "Não foi possível cadastrar";
        echo "<script>location.href='?page=list';</script>";
      }

      // location.href='?page=list'; -> p redirecionar Acho que tem que ser dentro do <script>

      break;

    // 2. Update
    case 'update':
      $name = $_POST["name"];
      $email = $_POST["email"];

      $sql = "UPDATE users SET 
                name='{$name}',
                email= '{$email}'
              WHERE id_user=".$_REQUEST["id_user"]
      ;

      $res = $conn -> query($sql);

      if ($res == true) {
        echo "Editado com sucesso";
        echo "<script>location.href='?page=list';</script>";
      } else {
        echo "Não foi possível editar";
        echo "<script>location.href='?page=list';</script>";
      }

      break;

    // 3. Delete
    case 'delete':
      $sql = "DELETE FROM users WHERE id_user=".$_REQUEST["id_user"];

      $res = $conn -> query($sql);

      if ($res == true) {
        echo "Deletado com sucesso";
        echo "<script>location.href='?page=list';</script>";
      } else {
        echo "Não foi possível deletar";
        echo "<script>location.href='?page=list';</script>";
      } 

      break;
  }