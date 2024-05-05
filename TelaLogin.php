<?php
//conexão com Banco de dados
include("conexao.php");

//verificação se o campo foi preenchido 
if(isset($_POST["submit"])){
if(isset($_POST["email"]) && isset($_POST["senha"])){

    if(empty($_POST["email"] )){
        echo "Preencha o email";
    }else if(empty($_POST["senha"])){
        echo "Preencha a senha";
    } else{

        //fazer proteçao contraataques de injeção SQL
        $email = $mysqli->real_escape_string($_POST["email"]);
        $senha = $mysqli->real_escape_string($_POST["senha"]);
        //codigo em SQL para fazer a consulta
        $sql_code = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";
        $sql_querey = $conexao->query($sql_code) or die("Falha na execução do codigo SQL: ".$conexao->error);
        //ver a quantidade de LINHAS
        $quantidade = $sql_querey->num_rows;
        //se tiver  tudo certo vai para a proxima tela  
        if($quantidade == 1){
            header("Location: home.php");
            exit(); 
    //senao vai dar esse erro
    }else{
        echo "Falha ao logar! Verifique suas credenciais e tente novamente";
    }
  }
}
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

<div>
<form method="post" action="TelaLogin.php">
   
<h1>LOGIN</h1>
        <label for="email"></label><br>
        <input type="email" id="email" name="email" placeholder="Digite seu email"><img id="imgEmail" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAlRJREFUSEvt1j2IE0EYBuD32yRmN4eQzM6FaxRRsTiQE6zsVBC0sFAObAQV9AQR7A5BS0UOOxX8ac5KBVEQBAsLrbQQRAW9SvxDCCSzCehl11yyn26Sg3iXZGY14Szcdt55n53d2R/CCh20Qi5iw8xs+Z43ScB4dNIMvHOEuEtEHGcRseCqUtsIuAlg0xJkLmQ+NCLlC1PcGPZLpZ0gegRgVY/yeQZ2ZVz3uQluBHOhMBKkUp8BCE3pF1uIjURU0+FGsK/UMQA3dGXtez6Zcd17uqwpfA3AcV1ZNE7ARdt1p3VZU/g6gCldWXOc+aoj5Qld1gwulc6A6JyurOkSnc4IMaPLGsE/lBoPgbe6suZjnUhscLLZD7qsERyV+ErNAjjcr5CBSxnXPaVD23vBJBbdOk77SkVvqL09ZszaQhwlotCk0XjFrX3DFCh1kIj2MXPrmSYqWMy301I+MAEXM7HgOMW67L8NV5VaYwH7GdgMYB2Yk7+tiKj+a+N9JObXIXA/I+XXv1pxrVyeaIThBQB7dEWd48z8MAFMp6Wc6zWv56UOPG+Kma8ASMVBO7I1EB1xhLjVbX5XuKrUAQLu/CHYOS0kYLftuo+Xdi2DvxUK+WQq9QmAPQA4qvDshYW1NDY239m3DK563mViPjkgtFXDfNaR8nxf2FeqCEAOEiail7YQW3vCQaWynhuN94NEF7vsRmM15fPfu7652j9zz4YBW0QTaSHedIX9YnE7LOvJMGCE4Q5ndPRpV7hcLmften3LMOAgmXyVy+Uq/z8Sw7i6fTt/AuAwuh+/dV6LAAAAAElFTkSuQmCC"/><br>
        <label for="password"></label><br>
        <input type="password" id="password" name="password" placeholder="Digite sua senha" />
        <img id="imgSenha" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAfdJREFUSEvtlkFr1FAUhc9JpmPSgSmTl1QRFFEQt1bdKdRF3dUfIIJbcaHQhaC4EroUdSUuRfoDBEEEQWldFoo7FwoKhZZJXuyibYI1uZqhhUHTyZuO0EUnu8c793z33vdyE2KfHu4TF32DRaS2qfVZ27LOFUlnWbY46vtLJLN+ijAGiwhTre8JeZfAWDeEwI8ceDiq1BNTuDE4iaKXIK/3Mv6T0GNHqRkTuBE4ieNrEJnbNvwuIjO/6vX5Yl3b2pok8AjA8WJNkSnH999Vwc3AWn8FcLJo6c+RkdPNZjPqNl5vt4/Ytv0FQAPAR1epSwOD07W1U5JlhSkg8sD1/dky0ySOZyFyH0DuZNkYx8fXK46ld26bcXyRIgudNpLTjue9LotIw/CqWNarYi/P8wuNIFgcCJyE4SQs633HJM8vu0HwobRiQ91ObOUZHxzwRhhO0LavUOQMgBvbLXoB4NsuZ3eiWyfkZyHfNlqtpTJ9aatTre8IYDyFel4i8qbjec//1pSCkyhqgwyq3kXD/WVXqWNmYK3F0NRI5ir1T4HlFQ/BRg3dXTRsdWful87d4eU6CJdrFcDhAQvdCV9xlTpqNDLTKLot5NP/ASZ5y/G8Z0bgQrQRhuctcgrkob0kIGRaI9/UW61Pxp/FvYD6jan89enX0FT/GwfD2h9sTumdAAAAAElFTkSuQmCC"/>

        <br>

        <p><a href="https://www.seusite.com">Esqueceu sua senha?</a></p>
        <input type="submit" value="Entrar">

        <div class="register-link">
            <p>Não tem uma conta? <a href="https://www.seusite.com">cadastre-se</a></p>
          
    </form>
    </div>


      </table>
    </form>
</body>
</html>