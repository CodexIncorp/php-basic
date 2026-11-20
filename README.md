# Fundamentos de PHP: proyecto web con manejo de sesiones

Pequeño sitio web desarrollado en **PHP** que demuestra, con ejemplos que se ejecutan realmente en el servidor, el uso de variables, tipos de datos, estructuras de control, arreglos y sesiones.

**Sitio publicado:** https://php-basic.infinityfree.io/

---

## Objetivo

Aplicar de forma práctica los conceptos básicos de PHP:

- Variables y tipos de datos (`string`, `int`, `float`, `boolean`, `array`)
- Estructuras de control: `if`, `elseif`, `else`, `switch`
- Bucles: `for`, `while`, `foreach`
- Arreglos: indexados, asociativos y multidimensionales
- Manejo de sesiones con `session_start()`, `$_SESSION`, `time()` y `session_destroy()`

## Restricciones del proyecto

- Sin base de datos
- Sin guardado de archivos
- Sin login: solo **inicio de sesión** (la hora de inicio se guarda en memoria)
- Sin formularios: las acciones se hacen con enlaces (`?accion=iniciar`, `?accion=reiniciar`)

---

## Estructura del proyecto

```
/
├── index.php                 # Inicia / reinicia / cierra la sesión (?accion=iniciar | reiniciar | salir)
│
├── web/
│   ├── variables.php         # Variables y tipos de datos
│   ├── condicionales.php     # if, elseif, else y switch
│   ├── bucles.php            # for, while y foreach
│   ├── arreglos.php          # Arreglos indexados, asociativos y multidimensionales
│   └── sesiones.php          # Persistencia de datos con $_SESSION
│
├── includes/
│   ├── header.php            # Encabezado común, inicia la sesión y protege las páginas
│   ├── menu.php              # Menú de navegación + panel de tiempo de sesión
│   └── footer.php            # Pie de página común
│
├── css/
│   └── styles.css            # Hoja de estilos externa
```

## Descripción de las páginas

| Archivo | Función | Qué demuestra |
|---|---|---|
| `index.php` | Punto de entrada. Permite iniciar, reiniciar o cerrar la sesión; entrar a Inicio con una sesión activa no la destruye | `session_start()`, `time()`, `session_destroy()` |
| `web/variables.php` | Ejemplos de variables | Declaración con `$`, tipos de dato, `echo`, `gettype()`, `var_dump()`, `date()`, `count()` |
| `web/condicionales.php` | Toma de decisiones | `if / elseif / else` y `switch` evaluados con variables, la fecha del servidor y arreglos |
| `web/bucles.php` | Repeticiones | `for`, `while` y `foreach`, incluida una tabla generada dinámicamente |
| `web/arreglos.php` | Manipulación de datos | Arreglos indexado, asociativo y multidimensional, recorridos con `foreach` y condicionales |
| `web/sesiones.php` | Persistencia en memoria | `$_SESSION`, contador de visitas, lista guardada e historial de páginas visitadas |

---

## Funcionamiento de la sesión

1. Entrar a `index.php` (por ejemplo desde el menú **Inicio**) **no** afecta una sesión activa; solo **Salir** (`?accion=salir`) la destruye con `session_destroy()`.
2. Al pulsar **Iniciar sesión** se guarda la hora de inicio con `time()` en `$_SESSION['inicio']`.
3. En **todas las páginas** se muestra el panel de sesión:

```
Hora inicio sesión: 10:15:32
Hora actual:        10:18:10
Tiempo activo:      2 minutos 38 segundos
```

4. El tiempo activo se calcula como `time() - $_SESSION['inicio']` y se convierte a minutos y segundos.
5. **Reiniciar sesión** destruye la sesión y crea una nueva con una hora de inicio nueva. **Salir** destruye la sesión y regresa a `index.php`.
6. Si se intenta abrir una página sin sesión activa, `header.php` redirige a `index.php`.

## Reutilización de código y diseño

- `header.php`, `menu.php` y `footer.php` se incluyen en todas las páginas con `require`.
- Todas las páginas comparten encabezado, menú y estilos (`css/styles.css`).
- El menú resalta la página actual y permite navegar a todas las secciones.

---

## Ejecución local

Requisitos: **PHP 8.0 o superior** (desarrollado con PHP 8.5).

```bash
git clone https://github.com/CodexIncorp/php-basic.git
cd php-basic
php -S localhost:8000
```

Abre `http://localhost:8000` en el navegador.

## Publicación (InfinityFree)

1. Crear una cuenta de hosting en [infinityfree.com](https://infinityfree.com) y un subdominio gratuito.
2. Abrir el **Online File Manager** (o conectar por FTP).
3. Subir a la carpeta `htdocs`: `index.php`, y las carpetas `web/`, `includes/`, `css/` e `img/`.
4. Abrir el enlace público y comprobar que todas las páginas son navegables desde el menú.

---

## Tecnologías

- PHP 8.x
- HTML5 y CSS3
- Visual Studio Code · Git · GitHub · InfinityFree

## Autores

- **Balderas Osorio Rafael de Jesús**
- **Morales Jiménez Alexis Emiliano**
- **Soancatl Niño Adrik Said**

Programación Web / Instituto Tecnológico de Tuxtla Gutiérrez · 2026
