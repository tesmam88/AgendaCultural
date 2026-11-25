<?php

require_once __DIR__ . '/Core/Session.php';

Session::iniciar();

Session::definir('usuario_logado', 'admin@agenda.com');
Session::definir('perfil', 'admin');

echo "Usuário: " . Session::obter('usuario_logado');
echo PHP_EOL;

echo "Perfil: " . Session::obter('perfil');
echo PHP_EOL;

var_dump(Session::existe('perfil'));

Session::remover('perfil');

var_dump(Session::existe('perfil'));

Session::encerrar();

var_dump($_SESSION);