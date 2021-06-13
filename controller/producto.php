<?php
//hacemos una llamado a conexion 
require_once("../config/conexion.php");
//hacemos una llamada a el modelo
require_once("../models/Producto.php");
//creamos un objeto en base a la clase Productos();
$producto =new Producto();

//creamos un switch para que poder tener direferentes obciones en nuestro controlador
switch ($_GET["op"]){
    case "listar":
        //llamamos a la funcion/metodo que tendra el objeto y lo pasaremos todos esos datos en $datos
        $datos=$producto->get_producto();
        //ahra generamos un array;
        $data=Array();
        //ahora hacemos un bucle la cual recorrera $datos y los guardara uno por uno en una variable #row
        foreach($datos as $row){
            //declaramos un sub array  para cada elemento
            $sub_array=array();
            $sub_array[]=$row["prod_nom"];
            //ahora insertamos los botones para editar y eliminar
            //boton editar
            $sub_array[]='<button  type="button" onclick="editar('.$row["prod_id"].');" id="'.$row["prod_id"].'" class="btn btn-outline-primary btn-icon"><div><i class="fa fa-edit"></i></div></button>';
            //boton eliminar
            $sub_array[]='<button  type="button" onclick="eliminar('.$row["prod_id"].');" id="'.$row["prod_id"].'" class="btn btn-outline-danger btn-icon"><div><i class="fa fa-trash"></i></div></button>';
            //ahora guardamos todos lo datos de $sub_array en otro array que ya creamos
            $data[]=$sub_array;
        }
        //ahora esto es para la tabla y es un metodo  por defecto que se creo para las tablas
        //datatable.js
        $results = array(
            "sEcho"=>1,
            "iTotalRecords"=>count($data),
            "itotalDisplayRecords"=>count($data),
            "aaData"=>$data);
            echo json_encode($results);
        //---fin del la tbla por defecto


        break;
       

    case "guardaryeditar":
         //llamamos a la funcion/metodo que tendra el objeto y lo pasaremos todos esos datos en $datos
         $datos=$producto->get_producto_x_id($_POST["prod_id"]);
         //preguntamos  si esta vacio el prod_id
         if(empty($_POST["prod_id"])){
            //si dato es un aaray y si datos no trajo ningun array en tonces vamos a insertar
            if(is_array($datos)==true && count($datos)==0){
                $producto->insert_producto($_POST["prod_nom"]);
            }
         }else{
            $producto->update_producto($_POST["prod_id"],$_POST["prod_nom"]);
         }
        break;

     //va traer todos los datos y lo colocaremos en un json para poder reutilizarlo   
    case "mostrar":
        $datos=$producto->get_producto_x_id($_POST["prod_id"]);
        //preguntamos si tiene informacion
        if(is_array($datos)==true && count($datos)>0){
            //creamos un bucle foreach para que recorra todo los datos y lo gurade en una variable
            foreach($datos as $row){
                //y en cada pasada guardamos los datos del array en otro array
                $output["prod_id"]=$row["prod_id"];
                $output["prod_nom"]=$row["prod_nom"];
            }
        }
        break;
        
    case "eliminar":
        $producto->delete_producto($_POST["prod_id"]);
        break;    
}