<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <!-- Link para o Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Tela de Cadastro -->
 <div class="container d-flex justify-content-center align-items-center min-vh-100">    
    <div class="card" style="width: 100%; max-width:600px;">
        <div class="card-body">  
            <h5 class="card-title text-center mb-4">Editar</h5>      
             <form action="/../teste/public/db/update" method="POST">
             <div class="mb-3">   
                <label for="id" class="form-label">Id:</label>
                <input type="text" value="<?= $id?>" class="form-control" id="id" name="id" required>
             </div>
             <div class="mb-3">   
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" value="<?= $nome?>" class="form-control" id="nome" name="nome" required>
             </div>
             <div class="mb-3">
                <label for="endereco" class="form-label">Endereço:</label>
                <input type="text" value="<?= $endereco?>" class="form-control" id="endereco" name="endereco" required>
             </div>
             <div class="mb-3">
                <label for="bairro" class="form-label">Bairro:</label>
                <input type="text"  value="<?= $bairro?>" class="form-control" id="bairro" name="bairro" required>
             </div>
             <div class="mb-3">
                <label for="telefone" class="form-label">Telefone:</label>
                <input type="text" value="<?= $telefone?>"class="form-control" id="telefone" name="telefone" required>
             </div>
             <div class="mb-3">
                <label for="email" class="form-label">Senha:</label>
                <input type="text" value="<?= $email?>" class="form-control" id="email" name="email" required>
             </div>
             <div class="mb-3">
                <label for="id_cidade" class="form-label">id_cidade:</label>
                <input type="text" value="<?= $id_cidade?>" class="form-control" id="id_cidade" name="id_cidade" required>
             </div>
    <button type="submit" class="btn btn-primary w-100">Editar</button>
</form>