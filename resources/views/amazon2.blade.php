<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica2</title>
</head>

<body>
    <input id="filtrar_producto" type="search" placeholder="Buscar Productos">
    <button onclick="buscarProducto()">Buscar</button>
    <br>
    <br>
    <button onclick="mostrarProducto()">Agregar producto</button>
    <br>
    <br>
    <table border="1">
        <thead>
            <tr>
                <td>ID</td>
                <td>Nombre</td>
                <td>Descripción</td>
                <td>Precio</td>
                <td>Imagen</td>
                <td>Acciones</td>
            </tr>
        </thead>
        <tbody id="listado_productos"></tbody>
    </table>
    <br>
    <form id="formulario_producto" style="display: none;" enctype="multipart/form-data"><!---->

        <input name="id" type="hidden" id="id_producto" value=""><!---->
        <label>Nombre</label>
        <br>
        <input name="nombre" id="nombre" value="" required>
        <br>
        <label>Descripción</label>
        <br>
        <input name="descripcion" id="descripcion" value="" required>
        <br>
        <label>Imagen</label>
        <br>
        <input name="precio" id="precio" value="" required>
        <br>
        <label>Precio</label>
        <br>
        <input name="imagen" id="imagen" type="file" accept="image/png, image/jpg, image/jpeg">
        <br>
        <button onclick="cerrarFormulario()">Cerrar</button>
        <button type="submit">Guardar</button>

    </form>

    <script>

        function listarProductos() {
            const urlListado = "http://127.0.0.1:8000/api/listado_producto";//

            fetch(urlListado)
                .then(response => response.json())
                .then(data => {
                    generarTabla(data);
                });
        }

        listarProductos();

        function generarTabla(data)
        {
            let tabla = document.getElementById("listado_productos");//
                    tabla.innerHTML = "";
                    data.Productos.forEach(item => {//
                        if (item.imagen == null) {
                            item.imagen = "default.jpg";
                        }

                        let fila = "<tr>";
                        fila += "<td>" + item.id + "</td>";
                        fila += "<td>" + item.nombre + "</td>";
                        fila += "<td>" + item.descripcion + "</td>";
                        fila += "<td>" + item.precio + "</td>";
                        fila += "<td><img src='http://127.0.0.1:8000/imagenes_productos/" + item.imagen + "' width='50px' alt='" + item.nombre + "'></td>";
                        fila += "<td><button onclick='mostrarProducto(" + item.id + ")'>Editar</button><button onclick='eliminarProducto(" + item.id + ")'>Eliminar</button></td>";//
                        fila += "<tr>";
                        tabla.innerHTML += fila;
                    });
        }

        function buscarProducto() {
            const busqueda = document.getElementById("filtrar_producto");
            const urlApi = "http://127.0.0.1:8000/api/search_producto";

            fetch(urlApi,
                {
                    method: "POST",
                    headers: 
                    {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(
                        {
                            filtro: busqueda.value
                        })
                })
                .then(response => response.json())
                .then(data => {
                    let tabla = document.getElementById("listado_productos");//
                    tabla.innerHTML = "";
                    data.Productos.forEach(item => {//
                        if (item.imagen == null) {
                            item.imagen = "default.jpg";
                        }

                        let fila = "<tr>";
                        fila += "<td>" + item.id + "</td>";
                        fila += "<td>" + item.nombre + "</td>";
                        fila += "<td>" + item.descripcion + "</td>";
                        fila += "<td>" + item.precio + "</td>";
                        fila += "<td><img src='http://127.0.0.1:8000/imagenes_productos/" + item.imagen + "' width='50px' alt='" + item.nombre + "'></td>";
                        fila += "<td><button onclick='mostrarProducto(" + item.id + ")'>Editar</button><button onclick='eliminarProducto(" + item.id + ")'>Eliminar</button></td>";//
                        fila += "<tr>";
                        tabla.innerHTML += fila;
                    });
                });
        }

        function mostrarProducto(id = null) {
            //Va modificar un nuevo personaje
            if (id != null) {
                const urlListado = "http://127.0.0.1:8000/api/get_producto/" + id;//

                fetch(urlListado)
                    .then(response => response.json())
                    .then(data => {
                        const id_producto = document.getElementById("id_producto");//
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
                fetch(urlApi,
                    {
                        method: "DELETE"
                    }
                )

                    .then(() => {
                        listarProductos();
                    });

            }
        }

        const formulario = document.getElementById("formulario_producto");//
        //Utilizamos el AddEventListener para un evento
        formulario.addEventListener(
            "submit",
            (event, obj) => {
                //Detiene que continue el evento
                event.preventDefault();

                let urlMethod = "add_producto";//

                //Generamos un objeto tipo FormData
                const formData = new FormData(formulario);

                //validamos si existe un id se va a modificar el registro
                const id = document.getElementById("id_producto");
                if (id.value != "") {
                    urlMethod = "update_producto/" + id.value;
                    formData.append("_method", "PUT");
                }

                fetch(
                    "http://127.0.0.1:8000/api/" + urlMethod,
                    {
                        method: "POST",
                        body: formData
                    }
                )
                    .then(() => {
                        cerrarFormulario();
                        listarProductos();
                        formulario.reset();
                    });
            }
        );



    </script>

</body>

</html>