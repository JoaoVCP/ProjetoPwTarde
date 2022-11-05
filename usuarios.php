<?php
$titulo = "Lista de usuarios";

include "cabecalho.php";

include "conexao.php";
$query = "select id, nome, login, ativo from usuarios";
$resultado = mysqli_query($conexao, $query);

?>

<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Login</th>
            <th>Ativo</th>
            <th></th>
        </tr>
    </thead>
</table>

<?php include "rodape.php"; ?>