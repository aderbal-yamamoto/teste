<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php foreach($data as $dados){
       echo 'Nome: '.$dados['username'] . "<br>\n"; 
       echo 'Senha: '.$dados['password']. "<br>\n";
        }?>
</body>
</html>