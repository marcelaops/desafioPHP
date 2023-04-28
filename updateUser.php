<h1>Editar Usuário</h1>

<?php
  $sql = "SELECT * FROM users WHERE id_user=".$_REQUEST["id_user"];
  $res = $conn->query($sql);

  // não foi necessário usar o while aqui (igual no userList) pois não foi repetido dados, vai apenas fazer uma array de objetos, trazendo essa sinfos
  $row = $res -> fetch_object();
?>

<form action="?page=save" method="POST">
  <input type="hidden" name="action" value="update">

<!-- mandando oculto o id_user para conseguir mandar o usuário correto e sua chave primária -->
  <input type="hidden" name="id_user" 
    value="<?php echo $row->id_user ?>"
  >

  <div class="mb-3">
    <label>Nome</label>
    <input 
      type="text" name="name" class="form-control" 
      value="<?php echo "$row->name"; ?>"
    >
  </div>
  <div class="mb-3">
    <label>Email</label>
    <input 
      type="email" name="email" class="form-control"
      value="<?php echo "$row->email"; ?>"
    >
  </div>
  <form>
  <div class="mb-3">
    <button type="submit" class="btn btn-primary">Enviar</button>
  </div>
</form>
</form>