

// function listarPersonajes() {
//     const urlListado = "http://127.0.0.1:8000/api/listado_personaje";//

//     fetch(urlListado)
//         .then(response => response.json())
//         .then(data => {
//             generarTabla(data);
//         });
// }

// listarPersonajes();

// function generarTabla(data)
// {
//     let tabla = document.getElementById("listado_personajes");//
//             tabla.innerHTML = "";
//             data.Personajes.forEach(item => {//
//                 if (item.imagen == null) {
//                     item.imagen = "default.jpg";
//                 }

//                 let fila = "<tr>";
//                 fila += "<td>" + item.id + "</td>";
//                 fila += "<td>" + item.nombre + "</td>";
//                 fila += "<td>" + item.descripcion + "</td>";
//                 fila += "<td><img src='http://127.0.0.1:8000/imagenes_Personajes/" + item.imagen + "' width='50px' alt='" + item.nombre + "'></td>";
//                 fila += "<td><button onclick='mostrarPersonaje(" + item.id + ")'>Editar</button><button onclick='eliminarPersonaje(" + item.id + ")'>Eliminar</button></td>";//
//                 fila += "<tr>";
//                 tabla.innerHTML += fila;
//             });
// }

// function buscarPersonaje() {
//     const busqueda = document.getElementById("filtrar_usuario");
//     const urlApi = "http://127.0.0.1:8000/api/search_personaje";

//     fetch(urlApi,
//         {
//             method: "POST",
//             headers: 
//             {
//                 'Content-Type': 'application/json'
//             },
//             body: JSON.stringify(
//                 {
//                     filtro: busqueda.value
//                 })
//         })
//         .then(response => response.json())
//         .then(data => {
//             let tabla = document.getElementById("listado_personajes");//
//             tabla.innerHTML = "";
//             data.Personajes.forEach(item => {//
//                 if (item.imagen == null) {
//                     item.imagen = "default.jpg";
//                 }

//                 let fila = "<tr>";
//                 fila += "<td>" + item.id + "</td>";
//                 fila += "<td>" + item.nombre + "</td>";
//                 fila += "<td>" + item.descripcion + "</td>";
//                 fila += "<td><img src='http://127.0.0.1:8000/imagenes_Personajes/" + item.imagen + "' width='50px' alt='" + item.nombre + "'></td>";
//                 fila += "<td><button onclick='mostrarPersonaje(" + item.id + ")'>Editar</button><button onclick='eliminarPersonaje(" + item.id + ")'>Eliminar</button></td>";//
//                 fila += "<tr>";
//                 tabla.innerHTML += fila;
//             });
//         });
// }

// function mostrarPersonaje(id = null) {
//     //Va modificar un nuevo personaje
//     if (id != null) {
//         const urlListado = "http://127.0.0.1:8000/api/get_personaje/" + id;//

//         fetch(urlListado)
//             .then(response => response.json())
//             .then(data => {
//                 const id_personaje = document.getElementById("id_personaje");//
//                 const nom = document.getElementById("nombre");
//                 const des = document.getElementById("descripcion");
//                 const img = document.getElementById("imagen");
//                 //
//                 id_personaje.value = data.id
//                 nom.value = data.nombre
//                 des.value = data.descripcion
//                 img.value = data.imagen
//             });
//     }

//     //Se obtiene el formulario del html
//     const form = document.getElementById("formulario_personaje");
//     //Se modifica para que se pueda visualizar
//     form.style.display = "block";

// }

// function cerrarFormulario() {
//     const form = document.getElementById("formulario_personaje")
//     form.style.display = "none";
// }

// function eliminarPersonaje(id) {
//     var respuesta = confirm("¿Deseas eliminar el personaje?")
//     if (respuesta) {
//         const urlApi = "http://127.0.0.1:8000/api/delete_personaje/" + id;
//         fetch(urlApi,
//             {
//                 method: "DELETE"
//             }
//         )

//             .then(() => {
//                 listarPersonajes();
//             });

//     }
// }

// const formulario = document.getElementById("formulario_personaje");//
// //Utilizamos el AddEventListener para un evento
// formulario.addEventListener(
//     "submit",
//     (event, obj) => {
//         //Detiene que continue el evento
//         event.preventDefault();

//         let urlMethod = "add_personaje";//

//         //Generamos un objeto tipo FormData
//         const formData = new FormData(formulario);

//         //validamos si existe un id se va a modificar el registro
//         const id = document.getElementById("id_personaje");
//         if (id.value != "") {
//             urlMethod = "update_personaje/" + id.value;
//             formData.append("_method", "PUT");
//         }

//         fetch(
//             "http://127.0.0.1:8000/api/" + urlMethod,
//             {
//                 method: "POST",
//                 body: formData
//             }
//         )
//             .then(() => {
//                 cerrarFormulario();
//                 listarPersonajes();
//                 formulario.reset();
//             });
//     }
// );

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
                fila += "<td><img src='http://127.0.0.1:8000/imagenes_producto/" + item.imagen + "' width='50px' alt='" + item.nombre + "'></td>";
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
