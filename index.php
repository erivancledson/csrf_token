<?php

session_start();
//gera o token aleatorio
if(!isset($_SESSION['csrf_token'])){
    $_SESSION['csrf_token'] = md5(time().rand(0, 999));
    
}

if(!empty($_POST['email'])){
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    
    if($_POST ['csrf_token'] == $_SESSION['csrf_token']){
        if($email == 'teste@hotmail.com' && $senha == '123'){
        echo "ACESSO OK!";
    }else{
     
        
        echo "Senha errada! Tentativas: ";
    }
    }else{
        echo "este form foi enviado de outro site";
    }
    
    
    
    echo "<hr/>";
}
?>

<form method="POST">
    
    Email:<br/>
    <input type="email" name="email" /><br/><br/>
     
    Senha:<br/>
    <input type="senha" name="senha" /><br/><br/>
    
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>" />
    
    <input type="submit" value="Enviar" />
    
</form>