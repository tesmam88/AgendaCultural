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
                <img class="logo-padrao" src="../assets/img/icons/logo_alone.png" alt="Logo Agenda Cultural">
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
                <span class="saudacao">RECUPERAR ACESSO</span>
                <h2>Esqueci minha senha</h2>
                <p>Digite o e-mail cadatrado na sua conta. Enviaremos as instruções para redefinir sua senha.</p>

                <?php if (!empty($erro)): ?>
                    <div class="alerta-erro">
                        <?= htmlspecialchars($erro, ENT_QUOTES, 'UTF-8') ?>
                    </div>
                <?php endif; ?>

                <form action="../../Controller/LoginController.php" method="POST">
                    <div class="grupo-input">
                        <label for="login">E-mail</label>
                        <input type="text" id="login" name="login" placeholder="Digite seu e-mail cadastrado" required>
                    </div>

                    <button type="submit" class="btn-entrar">Enviar instruções</button>

                    <div class="divisor">ou</div>

                    <a href="login.php" class="btn-criar-conta">Voltar para o login</a>
                </form>

            </div>
        </div>

    </div>
</body>
</html>