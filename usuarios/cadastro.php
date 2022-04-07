<?php
include ("../conexao.php");

if($_POST){
  $nome = $_POST["nome"];
  $email = $_POST["email"];
  $senha = $_POST["senha"];
  $sql = "insert into usuarios (nome,email,senha) values (?,?,?)";
  $params = array($nome,$email,$senha);  
	$resultado = sqlsrv_query($con,$sql,$params);
  if ($resultado) {  
	  header("Location: /cecpa/usuarios/listar.php");
  } else {  
    die(print_r(sqlsrv_errors(), true));  
  }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>CECPA - Centralizadora de Compras</title>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
        <h1>CECPA - Centralizadora de Compras</h1>
        <?php include("../menu.php");?>
            <h1>Função</h1>
            <form method="post" action="cadastro.php">
            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input type="text" class="form-control" name="nome">
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" name="email">
            </div>
            <div class="mb-3">
                <label class="form-label">Senha</label>
                <input type="password" class="form-control" name="senha">
            </div>
            <input type="submit" class="form-control" value="Salvar">
        </form>
    </div>
  </body>
</html>