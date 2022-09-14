<?php 

$usuario = $_POST["usuario"];
$email = $_POST["email"];
$pin = $_POST["pin"];
$senha = $_POST["senha"];
$confirmacao = $_POST["confirmacao"];

$email = str_replace (" ", "", $email);
$email = str_replace ("/", "", $email);
$email = str_replace ("@.", "@", $email);
$email = str_replace (".@", "@", $email);
$email = str_replace (",", ".", $email);
$email = str_replace (";", ".", $email);
$erro=0;

if(empty($usuario))
{
    $erro=1;
    $msg ="Por favor, digite o nome de usuário corretamente.";
}

elseif (strlen($email)<8 || substr_count($email, "@")!=1  || substr_count($email, ".")==0)
{
    $erro=1;
    $msg ="Por favor, digite seu e-mail corretamente.";
}

elseif(strlen($pin)<5 || strlen($pin)>15)
{
    $erro=1;
    $msg = "O pin deve ter entre 5 e 15 caracteres.";
}

elseif (strstr ($pin, ' ')!=FALSE)
{
    $erro=1;
    $msg = "O pin do usuário não pode conter espaços em branco.";
}

elseif(strlen($senha)<5 || strlen($senha)>15)
{
    $erro=1;
    $msg = "A senha deve ter entre 5 e 15 caracteres.";
}

elseif (strstr ($senha, ' ')!=FALSE)
{
    $erro=1;
    $msg = "A senha do usuário não pode conter espaços em branco.";
}

elseif ($senha != $confirmacao)
{
    $erro=1;
    $msg = "Você digitou duas senhas diferentes.";
}

if($erro)
{
    echo "<html><body>";
    echo "<p align=center>$msg</p>";
    echo "<p align=center><a href='javascript:history.back()'>Voltar</a></p>";
    echo "</body></html>";
}
else
{
    echo "<html><body>";
    echo "<p align=center>Seu cadastro foi realizado com sucesso!</p>";
    echo "</body></html>";
}

?>