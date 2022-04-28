<?php
function db_query($query){
    $conect= mysqli_connect("localhost", "root", "fioreschi2017", "compras")or die("ERROR " . mysqli_error($conect));
   $result=mysqli_query($conect,$query)or die(mysqli_error()); 
   return $result;
}
function insertar($tablaname,$form_data){
 $fields= array_keys($form_data);
 $sql="INSERT INTO ".$tablaname."(".implode(',', $fields).")  VALUES('".implode("','", $form_data)."')";
  return db_query($sql);
}
function select_datos($tablaname,$id){
 $sql="select * from ".$tablaname." order by ".$id;   
 return db_query($sql);   
}

function eliminar($codigo,$tablaname,$column){
    $sql="delete from ".$tablaname." where ". $column."=".$codigo;
    return db_query($sql);
}
///
function select_id($tablaname,$field_name,$field_id){
    $sql="select * from ".$tablaname." where ".$field_name." = ".$field_id;
    $db=db_query($sql);
    $GLOBALS['fila']= mysqli_fetch_object($db);
    
    return $sql;
}

//
function edit($tablaname,$datos,$field_id,$id){
    $sql="update ".$tablaname." set ";
    $data=array();
    foreach ($datos as $column => $value) {
        $data[]=$column."="."'".$value."'";
    }
    $sql .= implode(',', $data);
    $sql.=" where ".$field_id." = ".$id."";
    return db_query($sql);
}
//
function actualizar_nav($tablaname,$column1,$column2,$valor1,$valor2,$column3,$id){
    $sql="update ".$tablaname. " set ".$column1."=".$valor1.", ".$column2."='". $valor2."' where ".$column3."=".$id;
    $db=db_query($sql);
    return $sql;
}
