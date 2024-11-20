<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
    <!-- Link para o Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Lista de Usuários</h2>
    
    <!-- Tabela com Bootstrap -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Endereço</th>
                <th scope="col">Bairro</th>
                <th scope="col">Telefone</th>

            </tr>
        </thead>
        <tbody>
            <?php if (!empty($data)): ?>
                <?php foreach ($data as $dado): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($dado['id']); ?></td>
                        <td><?php echo htmlspecialchars($dado['nome']); ?></td>
                        <td><?php echo htmlspecialchars($dado['endereco']); ?></td>
                        <td><?php echo htmlspecialchars($dado['bairro']); ?></td>
                        <td><?php echo htmlspecialchars($dado['telefone']); ?></td>
                        <td>
                            <!-- Ícone de atualização -->
                            <a href="../user/userUpdate/<?php echo $dado['id']; ?>">
                                <img src="icon-update.png" alt="Atualizar" title="Atualizar">
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center">Nenhum usuário encontrado</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Link para o Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>