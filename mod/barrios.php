<?php

class Barrios {
  
  public function SelBarrio ($input) { 
    
    # Conecto a la base de datos.
    $adb = new MySQL();
    $con = $adb->Connect();
    
    # La sentencia SQL permite realizar la cadena de lo que queremos consultar.
    $sql = "SELECT * FROM `barrios` WHERE `id` = '$input' LIMIT 1";
    
    # Solicito la consulta.
    $query  = $con->query($sql);
    
    # Devuelvo los datos
    return $query;
    
    # Cierro la conexión con la base de datos.
    $con->close();
  
  }
  
  public function SelBarrios() {
    
    # Conecto a la base de datos.
    $adb = new MySQL();
    $con = $adb->Connect();
    
    # La sentencia SQL permite realizar la cadena de lo que queremos consultar.
    $sql = "SELECT * FROM `barrios`";
    
    # Solicito la consulta.
    $query  = $con->query($sql);
    
    # Devuelvo los datos
    return $query;
    
    # Cierro la conexión con la base de datos.
    $con->close();
    
  }
  
  public function SelBarriosPorCiudad($ciudad) {
    
    # Conecto a la base de datos.
    $adb = new MySQL();
    $con = $adb->Connect();
    
    # La sentencia SQL permite realizar la cadena de lo que queremos consultar.
    $sql = "SELECT * FROM `barrios` WHERE `ciudad` = '$ciudad'";
    
    # Solicito la consulta.
    $query  = $con->query($sql);
    
    # Devuelvo los datos
    return $query;
    
    # Cierro la conexión con la base de datos.
    $con->close();
    
  }
  
  public function NewBarrio($name, $lastname, $ident_num, $telephone, $birthdate, $network, $hop, $mentor_1, $mentor_2, $ministerio, $asignacion_ministerio, $diacono_anciano) {
    
    # Conecto a la base de datos.
    $adb = new MySQL();
    $con = $adb->Connect();
    
    # La sentencia SQL permite realizar la cadena de lo que queremos consultar.
    $query = $con->prepare("INSERT INTO `vision_mentores`(`name`, `lastname`, `ident_num`, `telephone`, `birthdate`, `network`, `hop`, `mentor_1`, `mentor_2`, `ministerio`, `asignacion_ministerio`, `diacono_anciano`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
    $query->bind_param("ssssssssssss", $name, $lastname, $ident_num, $telephone, $birthdate, $network, $hop, $mentor_1, $mentor_2, $ministerio, $asignacion_ministerio, $diacono_anciano);
    
    # Solicito la consulta.
    $query->execute();
    
    # Devuelvo los datos
    return $query;
    
    # Cierro la conexión con la base de datos.
    $con->close(); $query->close();
    
  }
  
  public function UpdBarrio($id, $name, $lastname, $ident_num, $telephone, $birthdate, $network, $hop, $mentor_1, $mentor_2, $ministerio, $asignacion_ministerio, $diacono_anciano) {
    
    # Conecto a la base de datos.
    $adb = new MySQL();
    $con = $adb->Connect();
    
    # La sentencia SQL permite realizar la cadena de lo que queremos consultar.
    $sql = "UPDATE `vision_mentores` SET  `name` = '$name', `lastname` = '$lastname', `ident_num` = '$ident_num', `telephone` = '$telephone', `birthdate` = '$birthdate', `network` = '$network', `hop` = '$hop', `mentor_1` = '$mentor_1', `mentor_2` = '$mentor_2', `ministerio` = '$ministerio', `asignacion_ministerio` = '$asignacion_ministerio', `diacono_anciano` = '$diacono_anciano'";
        
    # Termino la sentencia SQL con la condicional.
    $sql .= " WHERE `id` = '$id'";
    
    # Solicito la consulta.
    $query = $con->query($sql);
    
    # Devuelvo los datos
    return $query;
    
    # Cierro la conexión con la base de datos.
    $con->close();
    
  }
  
  public function DelBarrio ($input) { 
    
    # Conecto a la base de datos.
    $adb = new MySQL();
    $con = $adb->Connect();
    
    # La sentencia SQL permite realizar la cadena de lo que queremos consultar.
    $sql = "DELETE FROM vision_mentores WHERE `id` = '$input'";
    
    # Solicito la consulta.
    $query  = $con->query($sql);
    
    # Devuelvo los datos
    return $query;
    
    # Cierro la conexión con la base de datos.
    $con->close();
  
  }
  
} 

?>