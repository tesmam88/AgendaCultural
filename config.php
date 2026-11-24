<?php

// ==========================================
// CONFIGURAÇÕES INICIAIS
// ==========================================

// Define o diretório raiz do projeto
define('BASE_DIR', dirname(__FILE__));

// Define o caminho das Views
define('VIEW', BASE_DIR . '/View');

// Define a URL base do projeto
define('URL_BASE', '/AgendaCultural');


// ==========================================
// CONFIGURAÇÕES DO BANCO DE DADOS
// ==========================================

$_ENV['db']['host'] = 'localhost';
$_ENV['db']['user'] = 'root';
$_ENV['db']['pass'] = '';
$_ENV['db']['database'] = 'agenda_cultural';
