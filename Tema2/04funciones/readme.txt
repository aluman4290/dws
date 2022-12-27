Funciones de cadena
El lenguaje PHP dispone de una gran cantidad de funciones de tratamiento de cadenas (strings), puedes consultarlas aquí .
No tiene demasiado sentido enumerar todas las funciones una a una, en lugar de eso haremos algunos ejercicios.
Crea un fichero php llamado cadenas.php y resuelve los siguientes ejercicios:

Muestra el valor de un parámetro llamado nombre recibido por querystring eliminando los caracteres '/' del principio y el final si los hubiera (función trim). Si no se pasa un parámetro nombre se utilizará tu nombre de pila.
Muestra la longitud del parámetro nombre (función strlen)
Muestra el nombre en mayúsculas (función strtoupper)
Muestra el nombre en minúsculas (función strtolower)
Pasa un segundo parámetro por querystring llamado prefijo (para pasar más de un parámetro por la querystring debes separarlos utilizando el carácter &). Después indica si el nombre comienza por el prefijo pasado o no (función strpos), se distinguirá entre mayúsculas y minúsculas. Si no se pasa el prefijo no se realizará esta operación.
//TODO Muestra el número de veces que aparece la letra a (mayúscula o minúscula) en el parámetro nombre (funciones substr_count + (strtoupper o strtolower)).
Muestra la posición de la primera a existente en el nombre (sea mayúscula o minúscula). Si no hay ninguna mostrará un texto indicándolo (función stripos).
Muestra el nombre sustituyendo las letras ‘o’ por el número cero (sea mayúscula o minúscula) (función str_ireplace).
La función parse_url nos permite extraer distintas partes de una url. A partir de una variable que contenga una url, por ejemplo:

$url = 'http://username:password@hostname:9090/path?arg=value';
Utiliza la función parse_url para extraer y mostrar por pantalla las siguientes partes de la variable url del ejemplo:

El protocolo utilizado (en el ejemplo http).
El nombre de usuario (en el ejemplo username).
El path de la url (en el ejemplo /path)
El querystring de la url (en el ejemplo arg=value)