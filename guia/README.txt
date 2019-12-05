Pràctica 4
Matthew Calcagno

He creado un sistema de autenticacion utilizando sessions y cookies.

index.php -> pagina de inicio donde puedes iniciar session o crear una cuenta

register.php -> pagina donde tiene el formulario y donde envia los datos al servidor

                Si entra por GET: Solo muestra el formulario, una vez que el usuario envia ese formulario
                se envia al mismo PHP pero esta vez en POST

                Si entra por POST: Hace la conexion con la base de datos y envia los valores del formulario

login.php ->    pagina donde se muestra el formulario de autenticacion

                En el caso que hay un error, por ejemplo que no existe el usuario, envia ese error
                de modo GET y login.php mira si hay un valor definido y lo muestra por pantalla

auth.php ->     pagina donde se comprueba que la informacion existe en la base de datos

                En el caso que no existe el usuario, se redirige a login.php de forma GET pero con un
                variable error para que login.php lo imprime y informar al usuario.

page.php ->     pagina donde solo autenticados puedan entrar

                Comprueba si la session tiene una vaiable de authenticated como true, que lo pone cuando se
                haya comprobado que lo que ha puesto en login.php realmente exsiste en la base de datos
                En el caso que no esta autenticado, entonces redirige a index.php