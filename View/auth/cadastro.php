
<?php
// feat05 - Tela "Crie sua conta" (View)
// Escopo apenas visual: a lógica de cadastro fica para outra feature.
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crie sua conta | Agenda Cultural</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Montserrat:wght@600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/cadastro.css">
</head>
<body>

  <main class="auth">

    <!-- Painel esquerdo: capa -->
    <section class="auth__cover" aria-hidden="false">
      <div class="brand">
        <img class="brand__logo" src="../assets/img/logo.png" alt="Logo Agenda Cultural">
        <div class="brand__text">
          <span class="brand__name">Agenda Cultural</span>
          <span class="brand__city">CAMPO GRANDE · MS</span>
        </div>
      </div>

      <div class="cover__content">
        <h2 class="cover__title">Compartilhe o que acontece na cidade.</h2>
        <p class="cover__subtitle">Cadastre-se como organizador e divulgue seus eventos.</p>
      </div>
    </section>

    <!-- Painel direito: formulário -->
    <section class="auth__form-wrapper">
      <div class="auth__form-box">

        <span class="auth__eyebrow">JUNTE-SE À COMUNIDADE</span>
        <h1 class="auth__title">Crie sua conta</h1>
        <p class="auth__subtitle">Preencha os dados para começar.</p>

        <form id="form-cadastro" class="form" action="#" method="post" novalidate>

          <div class="form__group">
            <label class="form__label" for="nome">Nome completo</label>
            <input class="form__input" type="text" id="nome" name="nome"
                   placeholder="Digite seu nome" autocomplete="name" required>
            <span class="form__error" data-error-for="nome"></span>
          </div>

          <div class="form__group">
            <label class="form__label" for="email">E-mail</label>
            <input class="form__input" type="email" id="email" name="email"
                   placeholder="voce@exemplo.com" autocomplete="email" required>
            <span class="form__error" data-error-for="email"></span>
          </div>

          <div class="form__group">
            <label class="form__label" for="documento">CPF ou CNPJ</label>
            <input class="form__input" type="text" id="documento" name="documento"
                   placeholder="Digite seu CPF ou CNPJ" inputmode="numeric" maxlength="18" required>
            <span class="form__error" data-error-for="documento"></span>
          </div>

          <div class="form__group">
            <label class="form__label" for="tipo_usuario">Tipo de usuário</label>
            <div class="form__select-wrapper">
              <select class="form__input form__select" id="tipo_usuario" name="tipo_usuario" required>
                <option value="" selected disabled>Selecione seu perfil</option>
                <option value="participante">Participante</option>
                <option value="organizador">Organizador</option>
              </select>
              <svg class="form__select-icon" width="16" height="16" viewBox="0 0 24 24" fill="none"
                   stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <polyline points="6 9 12 15 18 9"></polyline>
              </svg>
            </div>
            <span class="form__error" data-error-for="tipo_usuario"></span>
          </div>

          <div class="form__group">
            <label class="form__label" for="senha">Senha</label>
            <input class="form__input" type="password" id="senha" name="senha"
                   placeholder="Crie uma senha (mínimo 6 caracteres)" autocomplete="new-password" minlength="6" required>
            <span class="form__error" data-error-for="senha"></span>
          </div>

          <div class="form__group">
            <label class="form__label" for="confirmar_senha">Confirmar senha</label>
            <input class="form__input" type="password" id="confirmar_senha" name="confirmar_senha"
                   placeholder="Digite a senha novamente" autocomplete="new-password" required>
            <span class="form__error" data-error-for="confirmar_senha"></span>
          </div>

          <button type="submit" class="btn-primary form__submit">Criar conta</button>

          <p class="form__footer">
            Já tem uma conta? <a href="login.php">Entrar</a>
          </p>
        </form>

      </div>
    </section>

  </main>

  <script src="../assets/js/cadastro.js"></script>
</body>
</html>