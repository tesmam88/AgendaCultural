<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesse sua conta - Agenda Cultural</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/login.css">
</head>
<body>
    <div class="container">

        <!-- COLUNA ESQUERDA -->
        <div class="coluna-esquerda">
            <div class="logo">
                <img class="logo-padrao" src="../assets/img/logo_alone.png" alt="Logo Agenda Cultural">
                <div class="logo-texto">
                    <span class="logo-nome">Agenda Cultural</span>
                    <span class="logo-cidade">Campo Grande · MS</span>
                </div>
            </div>

            <div class="texto-destaque">
                <h1>A cidade acontece.<br>Viva cada momento.</h1>
                <p>Descubra, participe e compartilhe a cultura de Campo Grande.</p>
            </div>
        </div>

        <!-- COLUNA DIREITA -->
        <div class="coluna-direita">
            <div class="formulario-container">
                <span class="saudacao">Bem-vindo de volta</span>
                <h2>Acesse sua conta</h2>
                <p>Entre com seus dados para continuar.</p>

                <?php if (!empty($erro)): ?>
                    <div class="alerta-erro">
                        <?= htmlspecialchars($erro, ENT_QUOTES, 'UTF-8') ?>
                    </div>
                <?php endif; ?>

                <form action="login.php" method="POST">
                    <div class="grupo-input">
                        <label for="login">E-mail ou CPF</label>
                        <input type="text" id="login" name="login" placeholder="Digite seu e-mail ou CPF" required>
                    </div>

                    <div class="grupo-input">
                        <label for="senha">Senha</label>
                        <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
                    </div>

                    <div class="opcoes-extras">
                        <label>
                            <input type="checkbox" name="lembrar" value="1"> Lembrar de mim
                        </label>
                        <a href="recuperar_senha.php">Esqueci minha senha</a>
                    </div>

                    <button type="submit" class="btn-entrar">Entrar</button>

                    <div class="divisor">ou</div>

                    <a href="cadastro.php" class="btn-criar-conta">Criar conta</a>
                </form>

                <p class="rodape-visitante">É visitante? Você pode consultar a agenda sem criar uma conta.</p>
            </div>
        </div>

    </div>
</body>
</html>