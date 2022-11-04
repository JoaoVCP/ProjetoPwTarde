<?php

$titulo = "Cadastro de usuario";
include "cabecalho.php";
include "conexao.php"; //abrindo conexao com o banco

if( isset($_POST) && !empty($_POST) )
{
    $nome = $_POST["nome"];
    $login = $_POST["login"];
    $senha = hash("sha512",$_POST["senha"]);
    if(isset($_POST["ativo"]) && $_POST["ativo"] == "on")
    {
        $ativo = 1;
    } else {
        $ativo = 0;
    }

    $query = "insert into usuarios (nome, login, senha, ativo) values('$nome', '$login', '$senha', $ativo)"; //asplas simples pra nao conflitar com as duplas do começo do projeto
    $resultado = mysqli_query($conexao, $query);
    if($resultado){
        ?>
        <div class="alert alert-success">
            Cadastrado com sucesso
        </div>
        <?php
    } else{
        ?>
        <div class="alert alert-danger">
            Ocorreu algum erro na query
            <?php echo $query; ?>
        </div>
        <?php
    }
}

?>

<div class="row"> <!--offset 4 quer dizer que ira pular 4 linhas no começo-->
    <div class="col-md-4 offset-4">
        <form action="./usuarioCreate.php" method="post">
            <div class="form-group">
                <label>Nome</label>
                <input type="text" name="nome" class="form-control"/>
            </div>
            <div class="form-group">
                <label>Login</label>
                <input type="text" name="login" class="form-control"/>
            </div>
            <div class="form-group">
                <label>Senha</label>
                <input type="password" name="senha" class="form-control"/>
            </div>
            <div class="form-group">
                <label>Ativo</label>
                <input type="checkbox" name="ativo" checked class="form-check" />
            </div>
            <div class="form-group mt-3">
                <button class="btn btn-success" type="submit">
                    Enviar dados
                </button>
            </div>
        </form>
    </div>
</div>

<?php 
    include "rodape.php"; 
?>
