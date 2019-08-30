<?php

echo "<h1>Ops a página não foi encontrada</h1>";

$error = substr($_GET['route'],0,6) == '/oops/' ? substr($_GET['route'],6) : $_GET['route'];

echo '<h2>'.$error.'</h2>';



