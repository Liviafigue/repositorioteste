<?php
$username = "root"; 
$password = "";
$database = "usuarios_prova";
$server = "localhost";

require "prova_usuario.class.php";

    $usuario = new Usuario ($_POST['nome'], $_POST['senha']);

    $nome = $usuario->getNome();

    $username = "root";
    $password = "";

  try {

    $conexao = new PDO('mysql:host=localhost;dbname=lista', $username, $password);

    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "ALTER TABLE usuarios_prova MODIFY COLUMN id INT auto_increment";

    $stmt = $conexao->prepare('SELECT * FROM usuarios_prova (nome, senha) WHERE 
         :nome, 
         :senha');

                $stmt->bindValue(":nome", $usuario->getNome());

                $stmt->bindValue(":senha", $usuario->getSenha());


    $stmt->execute();

    $resultado = $stmt->fetchAll();

if (count($resultado)) {

    foreach($resultado as $row) {

        print_r($row);
}

} else {
    echo "Nenhum resultado retornado.";
}

    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
}


    $mostrar_nome = "$nome \n"; 
    $criptografia = md5($usuario->getSenha());

session_start();

//usando isset pra saber se a variavel ja foi definida no sistema, retorna true ou false

if (!isset ($SESSION['$nome'])) {

    $_SESSION['$nome'] = 0;

} else {

    $_SESSION['$nome']++;

}

     echo "Você foi cadastrado";

?>
