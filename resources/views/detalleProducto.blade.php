<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <title>AMAZON</title>
</head>

<body class="fira-sans-condensed-regular" style="background-color: #2C1A4D;">

    <nav class="navbar navbar-expand-md navbar-dark fixed-top mb-4"
        style="--bs-bg-opacity: .9; background-color: #160D27;">
        <div class="container-fluid">
            <a class="navbar-brand" href="/inicio"><img src="{{ asset('images/amazon.png') }}" style="height: 70px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li>
                        <a href="/agregarProducto" class="nav-link" style="color: #E0CFFC;">
                            <div class="d-flex justify-content-center align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#E0CFFC" class="bi bi-bag-plus" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5" />
                                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z" />
                                </svg>
                            </div>
                            Producto
                        </a>
                    </li>
                    <li>
                        <a href="/historialCompras" class="nav-link" style="color: #E0CFFC;">
                            <div class="d-flex justify-content-center align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#E0CFFC"
                                    class="bi bi-cart4" viewBox="0 0 16 16">
                                    <path
                                        d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0" />
                                </svg>
                            </div>
                            Compras
                        </a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                    <button class="btn" type="submit" style="background-color: #6F42C1; color: #E0CFFC;">Buscar</button>
                </form>
            </div>
        </div>
    </nav>

    <section class="container" style="margin-top: 100px;">

        <div class="row">

            <div class="mb-2">
                <h2 class="m-0" style="color: #C5B3E6;">Comprar</h2>
            </div>

            <div class="">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12 d-flex justify-content-end align-items-center" id="formulario_producto">
                        @csrf
                        <input class="form-control" type="hidden" name="id" value="{{empty($id) ? '' : $id}}" id="id_producto">
                        <img id="imagen" src="/imagenes_productos/{{empty($imagen) ? '' : $imagen}}" class="img-fluid img-thumbnail">
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">

                        <h1 id="nombre" style="color: #8C68CD;">{{empty($nombre) ? '' : $nombre}}</h1>

                        <h3 id="descripcion" style="color: #E2D9F3;">{{empty($descripcion) ? '' : $descripcion}}</h3>

                        <h5 id="precio" style="color: gray;">${{empty($precio) ? '' : $precio}}</h5>

                        <div class="d-flex justify-content-around">
                            <a href="/inicio"><button class="btn" type="button" style="background-color: transparent; color: #E0CFFC; border: 2px solid;">Cancelar</button></a>
                            <a href="/historialCompras"><button onclick="mostrarProducto(document.getElementById('id_producto').value)" class="btn" type="submit" style="background-color: #6F42C1; color: #E0CFFC;">Comprar</button></a>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </section>

    <footer class=" container-fluid d-flex justify-content-between align-items-center py-3 my-4 border-top"
        style="color: #E2D9F3;">
        <p class="col-md-4 mb-0">© 2024 Amazon Company, Inc | Lessly Alva</p>

        <a href="/"
            class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
            <img src="{{ asset('images/amazon.png') }}" style="height: 50px;">
        </a>
    </footer>

    <script src="js/bootstrap.js"></script>
    <script>
        function listarProductos() {
            const urlListado = "http://127.0.0.1:8000/api/listado_producto"; //

            fetch(urlListado)
                .then(response => response.json())
                .then(data => {
                    generarTabla(data);
                });
        }

        listarProductos();

        function generarTabla(data) {
            let tabla = document.getElementById("listado_productos"); //
            tabla.innerHTML = "";
            data.Productos.forEach(item => { //
                if (item.imagen == null) {
                    item.imagen = "default.jpg";
                }

                let fila = "<tr>";
                fila += "<td>" + item.id + "</td>";
                fila += "<td>" + item.nombre + "</td>";
                fila += "<td>" + item.descripcion + "</td>";
                fila += "<td>" + item.precio + "</td>";
                fila += "<td><img src='http://127.0.0.1:8000/imagenes_productos/" + item.imagen + "' width='50px' alt='" + item.nombre + "'></td>";
                fila += "<td><button onclick='mostrarProducto(" + item.id + ")'>Editar</button><button onclick='eliminarProducto(" + item.id + ")'>Eliminar</button></td>"; //
                fila += "<tr>";
                tabla.innerHTML += fila;
            });
        }

        function buscarProducto() {
            const busqueda = document.getElementById("filtrar_producto");
            const urlApi = "http://127.0.0.1:8000/api/search_producto";

            fetch(urlApi, {
                    method: "POST",
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        filtro: busqueda.value
                    })
                })
                .then(response => response.json())
                .then(data => {
                    let tabla = document.getElementById("listado_productos"); //
                    tabla.innerHTML = "";
                    data.Productos.forEach(item => { //
                        if (item.imagen == null) {
                            item.imagen = "default.jpg";
                        }

                        let fila = "<tr>";
                        fila += "<td>" + item.id + "</td>";
                        fila += "<td>" + item.nombre + "</td>";
                        fila += "<td>" + item.descripcion + "</td>";
                        fila += "<td>" + item.precio + "</td>";
                        fila += "<td><img src='http://127.0.0.1:8000/imagenes_producto/" + item.imagen + "' width='50px' alt='" + item.nombre + "'></td>";
                        fila += "<td><button onclick='mostrarProducto(" + item.id + ")'>Editar</button><button onclick='eliminarProducto(" + item.id + ")'>Eliminar</button></td>"; //
                        fila += "<tr>";
                        tabla.innerHTML += fila;
                    });
                });
        }

        function mostrarProducto(id = null) {
            //Va modificar un nuevo personaje
            if (id != null) {
                const urlListado = "http://127.0.0.1:8000/api/get_producto/" + id; //

                fetch(urlListado)
                    .then(response => response.json())
                    .then(data => {
                        const id_producto = document.getElementById("id_producto"); //
                        const nom = document.getElementById("nombre");
                        const des = document.getElementById("descripcion");
                        const pre = document.getElementById("precio");
                        const img = document.getElementById("imagen");
                        //
                        id_producto.value = data.id
                        nom.value = data.nombre
                        des.value = data.descripcion
                        pre.value = data.precio
                        img.value = data.imagen
                    });
            }

            //Se obtiene el formulario del html
            const form = document.getElementById("formulario_producto");
            //Se modifica para que se pueda visualizar
            form.style.display = "block";

        }

        function cerrarFormulario() {
            const form = document.getElementById("formulario_producto")
            form.style.display = "none";
        }

        function eliminarProducto(id) {
            var respuesta = confirm("¿Deseas eliminar el producto?")
            if (respuesta) {
                const urlApi = "http://127.0.0.1:8000/api/delete_producto/" + id;
                fetch(urlApi, {
                        method: "DELETE"
                    })

                    .then(() => {
                        listarProductos();
                    });

            }
        }

        const formulario = document.getElementById("formulario_producto"); //
        //Utilizamos el AddEventListener para un evento
        formulario.addEventListener(
            "submit",
            (event) => {
                //Detiene que continue el evento
                event.preventDefault();

                //Generamos un objeto tipo FormData
                const formData = new FormData(formulario);

                fetch(
                        "http://127.0.0.1:8000/api/add_compra",  {
                            method: "POST",
                            body: formData
                        }
                    )
                    .then(() => {
                        listarProductos();
                        // formulario.reset();
                    });
            }
        );
    </script>

</body>

</html>