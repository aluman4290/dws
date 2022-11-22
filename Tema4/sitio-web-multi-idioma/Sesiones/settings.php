<?php
#Inicia la sesión
session_Start();

#hash MD5 obtenido con PHP-CLI
const HASH_ACCESO = "85ce93e9490c0fe6a6431f45c8837de8";

#formulario para acceso
const PAGINA_LOGIN = "formulario.html";

#página cualquiera, con acceso restringido.
const PAGINA_RESTRINGIDA_POR_DEFECTO = "pagina_de_muestra.php";
