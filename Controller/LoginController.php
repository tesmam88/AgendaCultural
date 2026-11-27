<?php
// Controller/LoginController.php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'] ?? '';
    $senha = $_POST['senha'] ?? '';

    // Mock: Simulando um banco de dados
    $usuariosMock = [
        'admin@agenda.com' => [
            'senha' => '123',
            'perfil' => 'admin',
            'redirecionamento' => '../View/admin/dashboard.php'
        ],
        'curador@agenda.com' => [
            'senha' => '123',
            'perfil' => 'curador',
            'redirecionamento' => '../View/curador/pendentes.php'
        ],
        'organizador@agenda.com' => [
            'senha' => '123',
            'perfil' => 'organizador',
            'redirecionamento' => '../View/organizador/dashboard.php'
        ]
    ];

    // Verifica se o usuário existe no array e se a senha está correta
    if (array_key_exists($login, $usuariosMock) && $usuariosMock[$login]['senha'] === $senha) {
        
        // Salva dados na sessão (opcional, mas recomendado no MVC)
        $_SESSION['usuario_logado'] = $login;
        $_SESSION['perfil'] = $usuariosMock[$login]['perfil'];

        // Redireciona para a página específica do perfil
        header("Location: " . $usuariosMock[$login]['redirecionamento']);
        exit;
    } else {
        // Retorna para a View de login exibindo o erro
        $erro = "E-mail ou senha inválidos.";
        include '../View/auth/login.php';
        exit;
    }
} else {
    // Se não for POST, apenas carrega a View de login
    include '../View/auth/login.php';
}
?>