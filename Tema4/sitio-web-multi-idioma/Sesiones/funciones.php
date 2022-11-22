<?php
require_once("settings.php");

/**
 * Traigo los datos recibidos por HTTP POST 
 * y retorno el HASH MD5 de ambos
 */

function getPostdata()
{
    $hash = "";
    if (isset($_POST['user']) && isset($_POST['pass'])) {
        $hash = md5($_POST['user'] . $_POST['pass']);
    }
    return $hash;
}

/**
 * Comparo ambos hashes. Si son idénticos, retorno verdadero.
 * 
 */

function validarUserPass()
{
    $userHash = getPostData();
    $systemHash = HASH_ACCESO;
    if ($userHash == $systemHash) {

        return true;
    }
}

/**
 * Función principal, llamada tras enviar el formulario. 
 * Si los datos son válido, redirije a la página restringida.
 */

function login()
{
    $userValido = validarUserPass();
    if ($userValido) {
        $_SESSION['login_date'] = time();
        gotoPage(PAGINA_RESTRINGIDA_POR_DEFECTO);
    }
}

/**
 * Destruye la sesión
 */

function logout()
{
    unset($_SESSION);
    $datosCookie = session_get_cookie_params();
    setcookie(
        session_name(),
        NULL,
        time() - 999999,
        $datosCookie['path'],
        $datosCookie["domain"],
        $datosCookie["secure"],
        $datosCookie["httponly"]
    );
    gotoPage(PAGINA_LOGIN);
}

/**
 *
 * Verifica la variable de sesión login_date. 
 * Obtiene su valor y lo retorna, si no existe retorna 0
 * 
 */

function obtenerUltimoAcceso()
{

    $ultimoAcceso  = 0;
    if (isset($_SESSION['login_date'])) {
        $ultimoAcceso = $_SESSION['login_date'];
    }
    return $ultimoAcceso;
}
/**
 * 
 * Retorna el estado de la sesión.
 * Inactiva, retorna false.
 * Activa, retorna true.
 * Actualiza la variable de sesion login_date, cuando la sesión se encuentre activa.
 * 
 */

function sesionActiva()
{
    $estadoActivo = False;
    $ultimoAcceso = obtenerUltimoAcceso();

    /* Establezco como límite máximo de inactividad (para mantener la sesión activa), media hora (o sea, 1800 segundos). De esta manera, sumando 1800 segundos a login_date, estoy definiendo cual es la marca de tiempo más alta, que puedo permitir al usuario para mantenerle su sesión activa.*/

    $limiteUltimoAcceso = $ultimoAcceso + 1800;

    /* Aquí realizo la comparación. Si el último acceso del usuario, más media hora de gracia que le otorgo para mantenerle activa        la sesión, es mayor a la marca de hora actual, significa entonces que su sesión puede seguir activa. Entonces, le actualizo la marca de tiempo, renovándole la sesión */

    if ($limiteUltimoAcceso > time()) {
        $estadoActivo = True;
        # actualizo la marca de tiempo renovando la sesión        
        $_SESSION['login_date'] = time();
    }
    return $estadoActivo;
}

/**
 * Verifica la sesión
 * 
 */

function validarSesion()
{

    if (!sesionActiva()) {
        logout();
    }
}

/**
 * 
 * redirigir al usuario 
 */
function gotoPage($pagina)
{
    header("Location: $pagina");
}
