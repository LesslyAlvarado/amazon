<?php
//Definir el path para hacer la referencia
namespace App\Http\Controllers;
//Agregar la referencia del modelo
use App\Models\Compra;
use App\Models\Producto;
 
//Agregamos la referencia del request
use Illuminate\Http\Request;

//Agregamos la referencia del Storage
use Illuminate\Support\Facades\Storage;
 
//NombreDelArchivo extiende de Controller
class compraController extends Controller
{

    public function getAll()
    {   
        //Se usa el método all para obtener todos los Personajes
        //"SELECT * FROM Personajes"
        $Compras = Compra::all();
        return view('historialCompras',["Compras"=>$Compras]);
    }

    //Agregamos un parámetro
    public function getForm($id = null)
    {
        //Validar si estan enviando el id
        if ($id == null) 
        {
            //Generamos una instancia nueva
            $Compra = new Compra();
        }
        else 
        {
            //Ejecutamos el método find para busca por el pk
            //SELECT * FROM Personajes WHERE id=3
            $Compra = Compra::find($id);
        }

        return view('detalleCompra', $Compra);
    }

    //Agregamos un parámetro
    public function getDelete($id)
    {
        //Se consulta el Personaje con base al parámetro de id
        //Se usa el método find
        //SELECT * FROM Personajes WHERE id=1
        $Compra = Compra::find($id);
        //Se borra la imagen
        if (!empty($Compra->imagen)) {
            Storage::delete(public_path('imagenes_compras').'/'.$Compra->imagen);
        }
        //Ejecutamos el método para eliminar
        //DELETE FROM Personajes WHERE id=1
        $Compra->delete();
        //Redirigimoa la listado
        return redirect('listado_compra');

    }

    //Agregamos un parámetro Request que encapsula los parámetros
    //Agregamosun parámetro opcional
    public function saveData(Request $request)
    {
        //Obtenemos los parámetros que nos manda la petición
        $data = $request->all();

        //Establecemos un nombre de la imagen
        $ruta_archivo_original = null;

        //Validar el id si lo estamos mandando
        if ($data["id"] == null) {
            //Se genera un Personaje nuevo
            $Compra = new Compra();
        } 
        else
        {
            $Compra = Compra::find($data['id']);
            //Valido si van a modificar la imagen y si tengo una imagen en la base de datos
            if ($request->hasFile('imagen') && $Compra->imagen != null) {
                //Eliminar la imagen que se tiene en ka base de datos
                Storage::delete(public_path('imageneCompras').'/'.$Compra->imagen);
            }

        }

        //Generamos un nombre aleatorio y concatenamos la estensión de la imagen
        if($request->hasFile('imagen'))
        {
            $nombreImagen = time().'.'.$request->imagen->extension();
            //Movemos el archivo a la carpeta única
            $request->imagen->move(public_path('imagenes_compras'), $nombreImagen);
            //Asignamos el nombre del archivo
            $ruta_archivo_original = $nombreImagen;
        }

        //Se asignan los parámetros de la petición del objeto
        $Compra->nombre = $data['nombre'];
        $Compra->precio = $data['precio'];
        $Compra->fecha = $data['fecha'];

        if($request->hasFile('imagen')) {
            $Compra->imagen = $ruta_archivo_original;
        }

        $Compra->save();
        return redirect('/listado_compra');
    }

    //APIIIIIISSSSSSSSSS

    public function getAPIAll()
    {
        //Se usa el método all para obtener todos los usuarios
        //"SELECT * FROM usuarios"
        $Compras = Compra::all();
        //Ya no devuelve view, sino un arreglo, porque eso es un JSON, un arreglo
        return ["Compras" => $Compras];
    }

    public function getAPIGetCompraByID($id = null)
    {
        //Ejecutamos el metodo find para que busque el id
        $Compra = Compra::find($id);
        return $Compra;
    }

    public function deleteAPI($id)
    {
        //Se consulta el usuario con base al parámetro de id
        //Se usa el método find
        //SELECT * FROM usuarios WHCompra
        $Compra = Compra::find($id);
        //Se borra la imagen
        if (!empty($Compra->imagen)) {
            Storage::delete(public_path('imagenes_compras') . '/' . $Compra->imagen);
        }
        //Ejecutamos el método para eliminar
        //DELETE FROM usuarios WHERE id=1
        $Compra->delete();
    }

    public function postApiAddCompra(Request $request)
    {
        //Obtenemos los parámetros que nos manda la petición
        $data = $request->all();

        $producto_id = $data['id'];

        $Producto = Producto::find($producto_id);

        //Instanciamos un objeto usuario
        $Compra = new Compra();

        //Se asignan los parámetros de la petición del objeto
        $Compra->nombre = $Producto->nombre;
        $Compra->precio = $Producto->precio;
        $Compra->fecha = now();
        $Compra->imagen = $Producto->imagen;

        $Compra->save();
    }

    public function putApiUpdateCompra($id, Request $request)
    {
        //Obtenemos los parámetros que nos manda la petición
        $data = $request->all();

        //Establecemos un nombre de la imagen
        $ruta_archivo_original = null;

        //Instanciamos un objeto usuario
        $Compra = Compra::find($id);

        //Validamos si la imagen se está enviando
        if ($request->hasFile('imagen')) {
            //Valido si van a modificar la imagen y si tengo una imagen en la base de datos
            if ($Compra->imagen != null) {
                //Eliminar la imagen que se tiene en base de datos 
                Storage::delete(public_path('imagenes_compras') . '/' . $Compra->imagen);
            }
            //Generamos un nombre aliatorio y concatenamos la extension de la imagen
            $nombreImagen = time() . '.' . $request->imagen->extension();
            //Movemos el archivo a la carpeta publica con el nombre
            $request->imagen->move(public_path('imagenes_compras'), $nombreImagen);
            //Asignamos el nombre del archivo
            $ruta_archivo_original = $nombreImagen;
        }
        //se asignan los parametros de la peticion a objeto
        $Compra->nombre = $data['nombre'];
        $Compra->fecha = $data['fecha'];
        $Compra->precio = $data['precio'];

        if ($request->hasFile('imagen')) {
            $Compra->imagen = $ruta_archivo_original;
        }

        //Se ejecuta el metodo save para agregar o modificar el registro
        $Compra->save();
    }

    public function getAPIAllFiltro(Request $request)
    {
        //
        $data = $request->all();
        $filtro = $request->input("filtro");
        //Se usa el método all para obtener todos los usuarios
        //"SELECT * FROM usuarios"
        $Compras = Compra::Where('nombre', 'like', "%$filtro%")->get();
        //Ya no devuelve view, sino un arreglo, porque eso es un JSON, un arreglo
        return ["Compras" => $Compras];
    }
    
}

?>