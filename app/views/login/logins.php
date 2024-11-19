<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <!-- Link para o Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Tela de Login -->
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card" style="width: 100%; max-width: 400px;">
            <div class="card-body">
                <h5 class="card-title text-center mb-4">Login</h5>
                  <form action="./login/login" method="POST">
                  <div class="mb-3">
                        <label for="username" class="form-label">Nome de Usuário:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                       
                  </div>
                  <div class="mb-3"> 
                    <label for="password" class="form-label">Senha:</label>
                    <input type="password"  class="form-control" id="password" name="password" required>
                  </div>

                   <button type="submit"  class="btn btn-primary w-100">Entrar</button>
                  </form>
                <form>
                                 <div class="text-center mt-3">
                    <a href="#">Esqueceu a senha?</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>