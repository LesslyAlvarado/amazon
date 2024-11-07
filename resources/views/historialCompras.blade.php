<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/bootstrap.css">
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
            <a class="navbar-brand" href="inicio"><img src="images/amazon.png" style="height: 70px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li>
                        <a href="agregarProducto" class="nav-link" style="color: #E0CFFC;">
                            <div class="d-flex justify-content-center align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#E0CFFC"
                                    class="bi bi-bag-plus" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5" />
                                    <path
                                        d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z" />
                                </svg>
                            </div>
                            Producto
                        </a>
                    </li>
                    <li>
                        <a href="historialCompras" class="nav-link" style="color: #E0CFFC;">
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
                    <input class="form-control me-2" type="search" placeholder="Buscar compra" aria-label="Search">
                    <button class="btn" type="submit" style="background-color: #6F42C1; color: #E0CFFC;">Buscar</button>
                </form>
            </div>
        </div>
    </nav>

    <section class="container d-flex align-items-center justify-content-center" style="margin-top: 100px;">

        <div class="row">

            <!-- <button onclick="document.getElementById('formulario_compra').reset();" class="btn" type="submit" style="background-color: #6F42C1; color: #E0CFFC;" data-bs-toggle="modal" data-bs-target="#modal2">Agregar
                Compra</button> -->

            <h1 class="text-center" style="color: #E0CFFC;">Historial de Compras</h1>

            <table class="table table-dark">
                <thead>

                </thead>
                <tbody id="listado_compras">

                </tbody>
            </table>

        </div>

        <!-- <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Detalle de Compra</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formulario_compra">
                            <div class="mb-3">
                                <input type="hidden" class="form-control" id="id_compra" name="id" value="">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Nombre del Producto:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Fecha de la Compra:</label>
                                <input type="text" class="form-control" id="fecha" name="fecha">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Precio del Producto:</label>
                                <input type="text" class="form-control" id="precio" name="precio">
                            </div>
                            <div class="mb-3 d-flex align-items-center justify-content-center">
                                <img src="" class="img-fluid">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- DETALLE COMPRA -->

        <div class="modal fade" id="modal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Detalle Compra</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formulario_compra">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <input type="hidden" class="form-control" id="id_compra" name="id" value="">
                                        </div>
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label fira-sans-condensed-bold">Nombre del Producto:</label>
                                            <label class="col-form-label" id="nombre" name="nombre"></label>
                                        </div>
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label fira-sans-condensed-bold">Fecha de la Compra:</label>
                                            <br>
                                            <label class="col-form-label" id="fecha" name="fecha"></label>
                                        </div>
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label fira-sans-condensed-bold">Precio del Producto:</label>
                                            <br>
                                            <label class="col-form-label" id="precio" name="precio"></label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <img id="imagen" name="imagen" src="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </form>
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
            <img src="images/amazon.png" style="height: 50px;">
        </a>
    </footer>

    <script src="js/bootstrap.js"></script>
    <script>
        function listarCompras() {
            const urlListado = "http://127.0.0.1:8000/api/listado_compra"; //

            fetch(urlListado)
                .then(response => response.json())
                .then(data => {
                    generarTabla(data);
                });
        }

        listarCompras();

        function generarTabla(data) {
            let tabla = document.getElementById("listado_compras"); //
            tabla.innerHTML = "";
            data.Compras.forEach(item => { //
                // if (item.imagen == null) {
                //     item.imagen = "default.jpg";
                // }

                let fila = "<tr>";
                fila += "<td>" + item.id + "</td>";
                fila += "<td><img src='http://127.0.0.1:8000/imagenes_productos/" + item.imagen + "' width='100px' alt='" + item.nombre + "'></td>";//
                fila += "<td>" + item.nombre + "</td>";
                fila += "<td>" + item.fecha + "</td>";
                fila += "<td>$" + item.precio + "</td>";
                fila += "<td><button class='btn' type='submit' style='background-color: #6F42C1; color: #E0CFFC;' data-bs-toggle='modal' data-bs-target='#modal2' onclick='mostrarCompra(" + item.id + ")'>Ver Detalle</button></td>"; //
                fila += "<tr>";
                tabla.innerHTML += fila;
            });
        }

        function buscarCompra() {
            const busqueda = document.getElementById("filtrar_compra");
            const urlApi = "http://127.0.0.1:8000/api/search_compra";

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
                    let tabla = document.getElementById("listado_compras"); //
                    tabla.innerHTML = "";
                    data.Compras.forEach(item => { //
                        if (item.imagen == null) {
                            item.imagen = "default.jpg";
                        }

                        let fila = "<tr>";
                        fila += "<td>" + item.id + "</td>";
                        fila += "<td><img src='http://127.0.0.1:8000/imagenes_compras/" + item.imagen + "' width='100px' alt='" + item.nombre + "'></td>";
                        fila += "<td>" + item.nombre + "</td>";
                        fila += "<td>" + item.fecha + "</td>";
                        fila += "<td>$" + item.precio + "</td>";
                        fila += "<td><button class='btn' type='submit' style='background-color: #6F42C1; color: #E0CFFC;' data-bs-toggle='modal' data-bs-target='#modal2' onclick='mostrarCompra(" + item.id + ")'>Ver Detalle</button></td>"; //
                        fila += "<tr>";
                        tabla.innerHTML += fila;
                    });
                });
        }

        function mostrarCompra(id = null) {
            //Va modificar un nuevo personaje
            if (id != null) {
                const urlListado = "http://127.0.0.1:8000/api/get_compra/" + id; //

                fetch(urlListado)
                    .then(response => response.json())
                    .then(data => {
                         //
                        const nom = document.getElementById("nombre");
                        const img = document.getElementById("imagen");
                        const pre = document.getElementById("precio");
                        const fec = document.getElementById("fecha");
                        document.getElementById("id_producto").value = data.id;
                        //
                        nom.textContent = data.nombre;
                        fec.textContent = data.fecha
                        pre.textContent = `${data.precio}`;
                        // img.value = data.imagen
                        img.src = "http://127.0.0.1:8000/imagenes_productos/" + data.imagen;
                    });
            }

            //Se obtiene el formulario del html
            const form = document.getElementById("formulario_compra");
            //Se modifica para que se pueda visualizar

        }

        // function mostrarCompra(id = null) {
        //     //Va modificar un nuevo personaje
        //     if (id != null) {
        //         const urlListado = "http://127.0.0.1:8000/api/get_compra/" + id; //

        //         fetch(urlListado)
        //             .then(response => response.json())
        //             .then(data => {
        //                 const id_compra = document.getElementById("id_compra"); //
        //                 const nom = document.getElementById("nombre").textContent = data.nombre;
        //                 const img = document.getElementById("imagen").src = "http://127.0.0.1:8000/imagenes_productos/" + id;
        //                 const pre = document.getElementById("precio").textContent = data.precio;
        //                 const fec = document.getElementById("fecha").textContent = data.fecha;
        //                 //
        //             });
        //     }

        //     //Se obtiene el formulario del html
        //     const form = document.getElementById("formulario_compra");
        //     //Se modifica para que se pueda visualizar

        // }

        function cerrarFormulario() {
            // const form = document.getElementById("formulario_producto")
            // form.style.display = "none";
            // Obtén el modal usando su ID
            const modalElement = document.getElementById("modal2");

            // Usa Bootstrap para interactuar con el modal
            const modal = bootstrap.Modal.getInstance(modalElement);

            // Cierra el modal
            if (modal) {
                modal.hide();
            }
        }

        function eliminarCompra(id) {
            var respuesta = confirm("¿Deseas eliminar la compra?")
            if (respuesta) {
                const urlApi = "http://127.0.0.1:8000/api/delete_compra/" + id;
                fetch(urlApi, {
                        method: "DELETE"
                    })

                    .then(() => {
                        listarCompras();
                    });

            }
        }

        // const formulario = document.getElementById("formulario_compra"); //
        // //Utilizamos el AddEventListener para un evento
        // formulario.addEventListener(
        //     "submit",
        //     (event, obj) => {
        //         //Detiene que continue el evento
        //         event.preventDefault();

        //         let urlMethod = "add_compra"; //

        //         //Generamos un objeto tipo FormData
        //         const formData = new FormData(formulario);

        //         //validamos si existe un id se va a modificar el registro
        //         const id = document.getElementById("id_compra");
        //         if (id.value != "") {
        //             urlMethod = "update_compra/" + id.value;
        //             formData.append("_method", "PUT");
        //         }

        //         fetch(
        //                 "http://127.0.0.1:8000/api/" + urlMethod, {
        //                     method: "POST",
        //                     body: formData
        //                 }
        //             )
        //             .then(() => {
        //                 cerrarFormulario();
        //                 listarCompras();
        //                 formulario.reset();
        //             });
        //     }
        // );
    </script>

</body>

</html>