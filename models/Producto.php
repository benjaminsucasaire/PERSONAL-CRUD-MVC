<?php
//creamos una clase Producto y asociamos a la clase conectar
class Producto extends Conectar{
    public function get_producto(){
        //segun la documentacion, tenemos que crear una variable conectar
        //como esta estendido con Conectar, se va poder utilizar la vacunacion
        $conectar=parent::conexion();
        //llamamos al metodo para las ñ y caracteres puedan interactuar en mi proyecto
        parent::set_names();
        //selecionamos los productos que estan activos
        $sql="select * from tm_producto where est=1";
        //ahora executamos el metodo registrar 
        $sql=$conectar->prepare($sql);
       
        //ejecutamos la query
        $sql->execute();
        //ahora tenemos que esperar que retorne los datos
        //fetchAll() guarda toda la informacion.
        return $resultado=$sql->fetchAll();
    }

    public function get_producto_x_id($prod_id){
        //segun la documentacion, tenemos que crear una variable conectar
        //como esta estendido con Conectar, se va poder utilizar la vacunacion
        $conectar=parent::conexion();
        //llamamos al metodo para las ñ y caracteres puedan interactuar en mi proyecto
        parent::set_names();
        $sql="select * from tm_producto where prod_id=?";
        //ahora executamos el metodo registrar 
        $sql=$conectar->prepare($sql);
        //segun documentacion  esto sera enviado a la primera incoginita de la consulta
        $sql->bindValue(1,$prod_id);
        //ejecutamos la query
        $sql->execute();
        //ahora tenemos que esperar que retorne los datos
        //fetchAll() guarda toda la informacion.
        return $resultado=$sql->fetchAll();
    }

    //eliminar pero no por su totalidad, sino solo cambiando su estado
    public function delete_producto($prod_id){
        //segun la documentacion, tenemos que crear una variable conectar
        //como esta estendido con Conectar, se va poder utilizar la vacunacion
        $conectar=parent::conexion();
        //llamamos al metodo para las ñ y caracteres puedan interactuar en mi proyecto
        parent::set_names();
        //now() saca la fecha y hora del sistema
        $sql="UPDATE tm_producto SET fech_elim = now(),est =0 WHERE prod_id = ?";
        // var_dump($sql);
        //UPDATE tm_producto SET fech_elim = now(),est =0 WHERE prod_id = 5;
        // die();
        //ahora executamos el metodo registrar 
        $sql=$conectar->prepare($sql);
        //segun documentacion  esto sera enviado a la primera incoginita de la consulta
        $sql->bindValue(1,$prod_id);
        //ejecutamos la query
        $sql->execute();
        //ahora tenemos que esperar que retorne los datos
        //fetchAll() guarda toda la informacion.
        return $resultado=$sql->fetchAll();
    }
    //insertar
    public function insert_producto($prod_nom,$prod_desc){
        //segun la documentacion, tenemos que crear una variable conectar
        //como esta estendido con Conectar, se va poder utilizar la vacunacion
        $conectar=parent::conexion();
        //llamamos al metodo para las ñ y caracteres puedan interactuar en mi proyecto
        parent::set_names();
        //now() saca la fecha y hora del sistema
        $sql="INSERT INTO tm_producto ( prod_id,  prod_nom, prod_desc,  fech_crea,  fech_modi,  fech_elim,  est) VALUES (NULL, ?,?, now(), NULL, NULL, 1);";
        //ahora executamos el metodo registrar 
        $sql=$conectar->prepare($sql);
        //segun documentacion  esto sera enviado a la primera incoginita de la consulta
        $sql->bindValue(1,$prod_nom);
        $sql->bindValue(2,$prod_desc);
        //ejecutamos la query
        $sql->execute();
        //ahora tenemos que esperar que retorne los datos
        //fetchAll() guarda toda la informacion.
        return $resultado=$sql->fetchAll();
    }

    //actualizar o editar
    public function update_producto($prod_id,$prod_nom,$prod_desc){
        //segun la documentacion, tenemos que crear una variable conectar
        //como esta estendido con Conectar, se va poder utilizar la vacunacion
        $conectar=parent::conexion();
        //llamamos al metodo para las ñ y caracteres puedan interactuar en mi proyecto
        parent::set_names();
        //now() saca la fecha y hora del sistema
        $sql="update tm_producto set prod_nom=?,prod_desc=?,fech_modi=now()  where prod_id=?";
        //ahora executamos el metodo registrar 
        $sql=$conectar->prepare($sql);
        //segun documentacion  esto sera enviado a la primera incoginita de la consulta
        $sql->bindValue(1,$prod_nom);
        $sql->bindValue(2,$prod_desc);
        $sql->bindValue(3,$prod_id);
        //ejecutamos la query
        $sql->execute();
        //ahora tenemos que esperar que retorne los datos
        //fetchAll() guarda toda la informacion.
        return $resultado=$sql->fetchAll();
    }

}