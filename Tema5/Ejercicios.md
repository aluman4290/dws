# Ejercicios POO

Crea una carpeta Tema5 en tu repositorio y trabaja en ella.

## Clase **Imagen**
Crea una clase llamada **Imagen**. Esa clase será la encargada mostrar una imagen en código HTML. El fichero se llamará **Imagen.php**.

Antes de nada crea una nueva carpeta **images** y añade un par de imágenes de tu preferencia en él.

### Atributos

La clase Imagen contendrá tres atributos de ámbito privado:

- src
    
> Atributo source de la etiqueta img, nombre o ruta donde se encuentra la imagen.

- border

>Atributo border de la etiqueta img, ancho que rodea la imagen

- ruta_images

>Ruta donde se encuentran las imágenes. En la definición hay que inicializarlo a la cadena "images/";

### Métodos

- Constructor

> Se le pasa como parámetro el src (nombre del fichero o ruta) y el borde que será un parámetro optativo que por defecto estará inicializado a 0. El atributo src hay que concatenarle el atributo ruta_images y el src que nos pasan como parámetro.

- `__toString`

> Devuelve el objeto Imagen como cadena devolviendo el código HTML para construir la imagen: `img src='<ruta>' border='<borde>' />`

### Pruebas

En otro fichero **TestImagen**

> Crea un objeto `$img = new Imagen('nombreimagen')` y comprueba que imprime la imagen correctamente con dicho src y borde 0 haciendo un echo del objeto creado. Mira el código fuente de la página el cual tiene que coincidir con este: `<img src='images/nombreimagen' border='0' />`, siendo nombreimagen una de las imágenes que hayas incorporado en el directorio images.

> Crea un objeto `$img2 = new Imagen("nombreimagen" , 10)` y comprobando que imprime la imagen correctamente con dicho src y borde 10

> Comprueba que no se pueden modificar los atributos src y border del objeto $img2 desde fuera de la clase provocando un error fatal. Cambia el ámbito de los dos atributos a protected y comprueba que pasa exactamente lo mismo. Por último cambia el ámbito de los dos atributos a public y comprueba que sí podemos modificar el valor de los dos atributos.

> Modifica el src del objeto $img2 por un fichero que no existe y comprueba que la imagen no se muestra. Usa la función función var_dump() para ver el contenido del objeto $img2.

## Clase ImagenMejorada

A partir de una copia de la clase Imagen crea una nueva llamada **ImagenMejorada** en otro fichero.

## Métodos nuevos

- `setSrc($ruta)`

> Esta función debe comprobar con un if que la ruta que nos pasan como parámetro corresponde con un fichero. Haz uso de la función "bool file_exists(string $archivo)" (busca en la ayuda de PHP como se usa).

> Ojo, hay que comprobar que existe el fichero pero introduciendo la ruta completa.

> Para construir la ruta completa donde se encuentra el fichero debes hacer uso de `$_SERVER['DOCUMENT_ROOT']` (busca en la ayuda de PHP más información de lo que contiene el array $_SERVER) más el nombre de la ruta que nos pasan, por ejemplo: `$ruta_real = $_SERVER['DOCUMENT_ROOT'] . '/Tema5/' . $ruta;`

> Si no se cumple la comprobación, muestra un mensaje de error terminando la ejecución del script php (puedes usar exit o die).

- `setBorder($pBorder)`
    
> Comprueba si el borde que nos pasan como parámetro es un entero (`is_int()`) y a su vez sea mayor o igual que 0.

> Si no se cumple la comprobación, muestra un mensaje de error terminando la ejecución del script php (puedes usar die o exit)

> Estas dos funciones tienen que aparecer en el constructor para que comprueben que son correctos los parámetros que nos pasan en el mismo (en vez de `$this->src = $pSrc` lo cambias por `$this->setSrc($pSrc)` ).

### Pruebas

En otro fichero **TestImagenMejorada**.

Prueba con los mismos ejemplos que en el apartado anterior además de estos nuevos.

> Da valores incorrectos tanto a src como border desde fuera de la clase con las dos funciones que has creado y comprueba que funcionan correctamente las comprobaciones.

> ¿Qué pasa si le damos valor a los atributos sin pasar por setSrc() y setBorder(), por ejemplo `$this->border = "asdsa"`? (haz la prueba y contesta la pregunta con un comentario multilínea en el mismo fichero)

> Deja los atributos de la clase como protected y verifica con varios ejemplos cómo ahora que no se pueden modificar los atributos desde fuera de la clase obligándonos a establecer esos valores mediante las interfaces de acceso setSrc y SetBorder.

## Herencia

Crea dos clases, **Articulo** y **ArticuloRebajado** que será una subclase de Articulo.

### Clase Articulo

En un fichero llamado "Articulo.php" y contendrá dos atributos protegidos **nombre** y **precio**.

- El constructor recibirá como parámetros obligatorios pNombre y pPrecio y le asignará dichos valores a sus correspondientes atributos.

- Implementar el método `__toString()` que devuelva la siguiente cadena:

`'Nombre:'.$this->nombre.'<br />'.'Precio:'.$this->precio.'&euro;<br />";`

- **getPrecio** que devuelva el valor actual del precio.

- **setPrecio($pPrecio)** que compruebe si la variable $pPrecio es un valor numérico y si es así, se lo asigne al atributo **precio** de la clase **Articulo**.

### Clase ArticuloRebajado

En un fichero "ArticuloRebajado.php".

Define la clase ArticuloRebajado.

Declaralaa como **final** (no se podrá heredar de ella) y será hija de la clase ** Articulo**.

Esta clase contendrá:

- Un atributo privado llamado `$rebaja`.

- El constructor por defecto que recibe como parámetros obligatorios `$pNombre`, `$pPrecio` y `$pRebaja`. Dentro de dicho constructor habrá que llamar al constructor del padre para darle valor a nombre y precio. Después le daremos valor al atributo rebaja.


- Un método privado llamado calculaDescuento() que nos devuelve el precio por la rebaja dividido por 100.

- Un método público llamado precioRebajado() que nos devuelve la diferencia entre el precio y el descuento.

- El método `__toString()` que nos devuelve:
    - Lo que nos devuelve el método `__toString()` de la clase padre Articulo (habrá que realizar una llamada explícita al método __toString() del padre)

    - Junto con la cadena `'La rebaja es: ' . $this->rebaja . ' %';`
    
    - Por último `'El descuento es '. self::calculaDescuento(). '€';`

### Pruebas

En un fichero TestArticulo.php

Después de definir la clase **ArticuloRebajado** crea una instancia de la misma con los parámetros: nombre='Bicicleta', precio=352.10 y rebaja=20.

Imprime con un echo el objeto y en la siguiente línea esta cadena "El precio del artículo rebajado es" concatenado con la función que nos devuelve el valor del precio rebajado junto el signo del euro y un salto de línea. Debajo de esa línea muestra en formato preformateado de HTML lo que devuelve la función var_dump() del objeto creado anteriormente.

El resultado tiene que ser el siguiente:

    Nombre: Bicicleta
    Precio: 352.10 €
    La rebaja es: 20%
    El descuento es: 70.42 €
    El precio del articulo rebajado es 281.68 €
    object(ArticuloRebajado)[1]
        private 'rebaja' => int 20
        protected 'nombre' => string 'Bicicleta' (length=9)
        protected 'precio' => float 352.1