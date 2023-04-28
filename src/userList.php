<h1>Lista de Usuários</h1>
<?php
  $sql = "SELECT * FROM users";

  $res = $conn -> query($sql);

  $counter = $res -> num_rows;

  if($counter > 0){
    echo "<table class = 'table'>";
      echo"<tr>";
      echo "<th>id_user</th>";
      echo "<th>name</th>";
      echo "<th>email</th>";
      echo "<th>Editar/Deletar</th>";
      echo"</tr>";

    while ($row = $res -> fetch_object()) {
      echo"<tr>";
      echo "<td>".$row -> id_user."</td>";
      echo "<td>".$row -> name."</td>";
      echo "<td>".$row -> email."</td>";

      echo "<td>
              <button 
                onclick=\"location.href='?page=update&id_user=".$row->id_user."';\"
                class='btn btn-primary'
              >Editar</buton>

              <button 
                class='btn btn-primary'
                onclick=\"
                  if(confirm('Deseja mesmo deletar?')) 
                    location.href='?page=save&action=delete&id_user=".$row->id_user."';
                  else false;
                \"
              >Deletar</buton>      
          </td>";

      echo"</tr>";
    }
    echo "</table>";
  } else {
    echo "Não foi encontrado usuários cadastrados.";
  }
?>