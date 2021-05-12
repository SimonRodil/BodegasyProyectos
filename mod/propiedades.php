<?php

class Propiedades {
  
  public function SelPropiedad ($input) { 
    
    # Conecto a la base de datos.
    $adb = new MySQL();
    $con = $adb->Connect();
    
    # La sentencia SQL permite realizar la cadena de lo que queremos consultar.
    $sql = "SELECT propiedades.*, 
    
    ciudades.nombre AS ciudad_nombre, 
    barrios.nombre AS barrio_nombre, 
    users.name AS asesor_nombre,
    FORMAT(precio, 0) AS precio_format,
    IF (tipo_oferta = 2, 'Arriendo', 'Venta') AS tipo_oferta_nombre
    
    FROM `propiedades` " .
    
    // Busco la Ciudad 
    " LEFT JOIN `ciudades` ON `ciudades`.`id` = `propiedades`.`ciudad` " .
      
    // Busco el Barrio
    " LEFT JOIN `barrios` ON `barrios`.`id` = `propiedades`.`barrio` " .
      
    // Busco el Usuario
    " LEFT JOIN `users` ON `users`.`id` = `propiedades`.`asesor` " .      
      
    " WHERE `propiedades`.`id` = '$input' LIMIT 1";
    
    # Solicito la consulta.
    $query  = $con->query($sql);
    
    # Devuelvo los datos
    return $query;
    
    # Cierro la conexión con la base de datos.
    $con->close();
  
  }
  
  public function SelPropiedadesPorAsesor($asesor) {
    
    # Conecto a la base de datos.
    $adb = new MySQL();
    $con = $adb->Connect();
    
    # La sentencia SQL permite realizar la cadena de lo que queremos consultar.
    $sql = "SELECT propiedades.*, 
    
    ciudades.nombre AS ciudad_nombre, 
    barrios.nombre AS barrio_nombre, 
    users.name AS asesor_nombre,
    FORMAT(precio, 0) AS precio_format,
    IF (tipo_oferta = 2, 'Arriendo', 'Venta') AS tipo_oferta_nombre
    
    FROM `propiedades` " .
    
    // Busco la Ciudad 
    " LEFT JOIN `ciudades` ON `ciudades`.`id` = `propiedades`.`ciudad` " .
      
    // Busco el Barrio
    " LEFT JOIN `barrios` ON `barrios`.`id` = `propiedades`.`barrio` " .
      
    // Busco el Usuario
    " LEFT JOIN `users` ON `users`.`id` = `propiedades`.`asesor` " .
      
    " WHERE `propiedades`.`asesor` = '$asesor'";
    
    # Solicito la consulta.
    $query  = $con->query($sql);
    
    # Devuelvo los datos
    return $query;
    
    # Cierro la conexión con la base de datos.
    $con->close();
    
  }
  
  public function SelPropiedades() {
    
    # Conecto a la base de datos.
    $adb = new MySQL();
    $con = $adb->Connect();
    
    # La sentencia SQL permite realizar la cadena de lo que queremos consultar.
    $sql = "SELECT propiedades.*, 
    
    ciudades.nombre AS ciudad_nombre, 
    barrios.nombre AS barrio_nombre, 
    users.name AS asesor_nombre,
    FORMAT(precio, 0) AS precio_format,
    IF (tipo_oferta = 2, 'Arriendo', 'Venta') AS tipo_oferta_nombre
    
    FROM `propiedades` " .
    
    // Busco la Ciudad 
    " LEFT JOIN `ciudades` ON `ciudades`.`id` = `propiedades`.`ciudad` " .
      
    // Busco el Barrio
    " LEFT JOIN `barrios` ON `barrios`.`id` = `propiedades`.`barrio` " .
      
    // Busco el Usuario
    " LEFT JOIN `users` ON `users`.`id` = `propiedades`.`asesor` ";
    
    # Solicito la consulta.
    $query  = $con->query($sql);
    
    # Devuelvo los datos
    return $query;
    
    # Cierro la conexión con la base de datos.
    $con->close();
    
  }
  
  public function SelPropiedadesLimite6() {
    
    # Conecto a la base de datos.
    $adb = new MySQL();
    $con = $adb->Connect();
    
    # La sentencia SQL permite realizar la cadena de lo que queremos consultar.
    $sql = "SELECT propiedades.*, 
    
    ciudades.nombre AS ciudad_nombre, 
    barrios.nombre AS barrio_nombre, 
    users.name AS asesor_nombre,
    FORMAT(precio, 0) AS precio_format,
    IF (tipo_oferta = 2, 'Arriendo', 'Venta') AS tipo_oferta_nombre
    
    FROM `propiedades` " .
    
    // Busco la Ciudad 
    " LEFT JOIN `ciudades` ON `ciudades`.`id` = `propiedades`.`ciudad` " .
      
    // Busco el Barrio
    " LEFT JOIN `barrios` ON `barrios`.`id` = `propiedades`.`barrio` " .
      
    // Busco el Usuario
    " LEFT JOIN `users` ON `users`.`id` = `propiedades`.`asesor` ORDER BY propiedades.id DESC LIMIT 6";
    
    # Solicito la consulta.
    $query  = $con->query($sql);
    
    # Devuelvo los datos
    return $query;
    
    # Cierro la conexión con la base de datos.
    $con->close();
    
  }
  
  public function SelDiferentesPropiedades($propiedad, $limit) {
    
    # Conecto a la base de datos.
    $adb = new MySQL();
    $con = $adb->Connect();
    
    # La sentencia SQL permite realizar la cadena de lo que queremos consultar.
    $sql = "SELECT propiedades.*, 
    
    ciudades.nombre AS ciudad_nombre, 
    barrios.nombre AS barrio_nombre, 
    users.name AS asesor_nombre,
    FORMAT(precio, 0) AS precio_format,
    IF (tipo_oferta = 2, 'Arriendo', 'Venta') AS tipo_oferta_nombre
    
    FROM `propiedades` " .
    
    // Busco la Ciudad 
    " LEFT JOIN `ciudades` ON `ciudades`.`id` = `propiedades`.`ciudad` " .
      
    // Busco el Barrio
    " LEFT JOIN `barrios` ON `barrios`.`id` = `propiedades`.`barrio` " .
      
    // Busco el Usuario
    " LEFT JOIN `users` ON `users`.`id` = `propiedades`.`asesor` ";
    
    $sql .= " WHERE propiedades.id != '$propiedad'";
    
    if($limit != NULL) {
      $sql .= " LIMIT " . $limit;
    }
    
    # Solicito la consulta.
    $query  = $con->query($sql);
    
    # Devuelvo los datos
    return $query;
    
    # Cierro la conexión con la base de datos.
    $con->close();
    
  }
  
  public function FilterPropiedades($tipo_oferta, $tipo_propiedad, $ciudad, $barrio, $area, $precio, $pagina) {
    
    # Conecto a la base de datos.
    $adb = new MySQL();
    $con = $adb->Connect();
    
    # La sentencia SQL permite realizar la cadena de lo que queremos consultar.
    $sql = "SELECT propiedades.*, 
    
    ciudades.nombre AS ciudad_nombre, 
    barrios.nombre AS barrio_nombre, 
    users.name AS asesor_nombre,
    FORMAT(precio, 0) AS precio_format,
    IF (tipo_oferta = 2, 'Arriendo', 'Venta') AS tipo_oferta_nombre
    
    FROM `propiedades` " .
    
    // Busco la Ciudad 
    " LEFT JOIN `ciudades` ON `ciudades`.`id` = `propiedades`.`ciudad` " .
      
    // Busco el Barrio
    " LEFT JOIN `barrios` ON `barrios`.`id` = `propiedades`.`barrio` " .
      
    // Busco el Usuario
    " LEFT JOIN `users` ON `users`.`id` = `propiedades`.`asesor` ";
    
    /* FILTROS REQUERIDOS */
    // EL TIPO DE OFERTA ES REQUERIDO
    $sql .= " WHERE tipo_oferta = '$tipo_oferta'";
    
    if($tipo_propiedad != NULL) {
      $sql .= " AND tipo_propiedad = '$tipo_propiedad'";
    }
    
    if($ciudad != NULL) {
      $sql .= " AND propiedades.ciudad = '$ciudad'";
    }
    
    if($barrio != NULL) {
      $sql .= " AND propiedades.barrio = '$barrio'";
    }
    
    if($area != NULL) {
      switch($area) {
          case "-50": $area_b = [0, 49];
          break;
          case "50-100": $area_b = [50, 100];
          break;
          case "100-300": $area_b = [100, 300];
          break;
          case "300-500": $area_b = [300, 500];
          break;
          case "500-800": $area_b = [500, 800];
          break;
          case "800-1500": $area_b = [500, 800];
          break;
          case "+1500": $area_b = [1500, 999999];
          break;
      }
      $sql .= " AND area BETWEEN '" . $area_b[0] . "' AND '" . $area_b[1] ."'";
    }
    
    if($precio != NULL) {
      switch($precio) {
          case "0-1": $precio_b = Array(0, 1000000);
          break;
          case "1-2": $precio_b = Array(1000000, 2000000);
          break;
          case "2-5": $precio_b = Array(2000000, 5000000);
          break;
          case "5-10": $precio_b = Array(5000000, 10000000);
          break;
          case "10-20": $precio_b = Array(10000000, 20000000);
          break;
          case "20-50": $precio_b = Array(20000000, 50000000);
          break;
          case "50-100": $precio_b = Array(50000000, 100000000);
          break;
          case "100-200": $precio_b = Array(100000000, 200000000);
          break;
          case "200-500": $precio_b = Array(200000000, 500000000);
          break;
          case "500-800": $precio_b = Array(500000000, 800000000);
          break;
          case "800-1000": $precio_b = Array(800000000, 1000000000);
          break;
          case "+1000": $precio_b = Array(1000000000, 1000000000000000000);
          break;
      }
      $sql .= " AND precio BETWEEN '" . $precio_b[0] . "' AND '" . $precio_b[1] ."'";
    }
    
    $sql .= " LIMIT 6";
    if($pagina != NULL) {
      $sql .= " OFFSET " . $pagina;
    }
    
    # Solicito la consulta.
    $query  = $con->query($sql);
    
    # Devuelvo los datos
    return $query;
    
    # Cierro la conexión con la base de datos.
    $con->close();
    
  }
  
  public function FilterPropiedadesNumber($tipo_oferta, $tipo_propiedad, $ciudad, $barrio, $area, $precio) {
    
    # Conecto a la base de datos.
    $adb = new MySQL();
    $con = $adb->Connect();
    
    # La sentencia SQL permite realizar la cadena de lo que queremos consultar.
    $sql = "SELECT propiedades.*, 
    
    ciudades.nombre AS ciudad_nombre, 
    barrios.nombre AS barrio_nombre, 
    users.name AS asesor_nombre,
    IF (tipo_oferta = 2, 'Arriendo', 'Venta') AS tipo_oferta_nombre
    
    FROM `propiedades` " .
    
    // Busco la Ciudad 
    " LEFT JOIN `ciudades` ON `ciudades`.`id` = `propiedades`.`ciudad` " .
      
    // Busco el Barrio
    " LEFT JOIN `barrios` ON `barrios`.`id` = `propiedades`.`barrio` " .
      
    // Busco el Usuario
    " LEFT JOIN `users` ON `users`.`id` = `propiedades`.`asesor` ";
    
    /* FILTROS REQUERIDOS */
    // EL TIPO DE OFERTA ES REQUERIDO
    $sql .= " WHERE tipo_oferta = '$tipo_oferta'";
    
    if($tipo_propiedad != NULL) {
      $sql .= " AND tipo_propiedad = '$tipo_propiedad'";
    }
    
    if($ciudad != NULL) {
      $sql .= " AND propiedades.ciudad = '$ciudad'";
    }
    
    if($barrio != NULL) {
      $sql .= " AND propiedades.barrio = '$barrio'";
    }
    
    if($area != NULL) {
      switch($area) {
          case "-50": $area_b = [0, 49];
          break;
          case "50-100": $area_b = [50, 100];
          break;
          case "100-300": $area_b = [100, 300];
          break;
          case "300-500": $area_b = [300, 500];
          break;
          case "500-800": $area_b = [500, 800];
          break;
          case "800-1500": $area_b = [500, 800];
          break;
          case "+1500": $area_b = [1500, 999999];
          break;
          default: $area_b = NULL;
      }
      $sql .= " AND area BETWEEN '" . $area_b[0] . "' AND '" . $area_b[1] ."'";
    }
    
    if($precio != NULL) {
      switch($precio) {
          case "0-1": $precio_b = Array(0, 1000000);
          break;
          case "1-2": $precio_b = Array(1000000, 2000000);
          break;
          case "2-5": $precio_b = Array(2000000, 5000000);
          break;
          case "5-10": $precio_b = Array(5000000, 10000000);
          break;
          case "10-20": $precio_b = Array(10000000, 20000000);
          break;
          case "20-50": $precio_b = Array(20000000, 50000000);
          break;
          case "50-100": $precio_b = Array(50000000, 100000000);
          break;
          case "100-200": $precio_b = Array(100000000, 200000000);
          break;
          case "200-500": $precio_b = Array(200000000, 500000000);
          break;
          case "500-800": $precio_b = Array(500000000, 800000000);
          break;
          case "800-1000": $precio_b = Array(800000000, 1000000000);
          break;
          case "+1000": $precio_b = Array(1000000000, 1000000000000000000);
          break;
      }
      $sql .= " AND precio BETWEEN '" . $precio_b[0] . "' AND '" . $precio_b[1] ."'";
    }
    
    # Solicito la consulta.
    $query  = $con->query($sql);
    
    # Devuelvo los datos
    return $query;
    
    # Cierro la conexión con la base de datos.
    $con->close();
    
  }
  
  public function NewPropiedad($nombre, $tipo_propiedad, $tipo_oferta, $banos, $area, $tamano_lote, $ano, $descripcion, $ciudad, $barrio, $imagen_destacada, $direccion, $asesor, $video, $precio) {
    
    # Conecto a la base de datos.
    $adb = new MySQL();
    $con = $adb->Connect();
    
    # La sentencia SQL permite realizar la cadena de lo que queremos consultar.
    $query = $con->prepare("INSERT INTO `propiedades`(`nombre`, `tipo_propiedad`, `tipo_oferta`, `banos`, `area`, `tamano_lote`, `ano`, `descripcion`, `ciudad`, `barrio`, `imagen_destacada`, `direccion`, `asesor`, `video`, `precio`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $query->bind_param("sssssssssssssss", $nombre, $tipo_propiedad, $tipo_oferta, $banos, $area, $tamano_lote, $ano, $descripcion, $ciudad, $barrio, $imagen_destacada, $direccion, $asesor, $video, $precio);
        
    # Solicito la consulta.
    $query->execute();
    
    # El ID que generará la consulta.
    $new_id = $con->insert_id;
    
    # Devuelvo los datos
    return Array('query' => $query, 'id' => $new_id);
    
    # Cierro la conexión con la base de datos.
    $con->close(); $query->close();
    
  }
  
  public function UpdPropiedad($id, $nombre, $tipo_propiedad, $tipo_oferta, $banos, $area, $tamano_lote, $ano, $descripcion, $ciudad, $barrio, $imagen_destacada, $direccion, $video, $precio) {
    
    # Conecto a la base de datos.
    $adb = new MySQL();
    $con = $adb->Connect();
    
    # La sentencia SQL permite realizar la cadena de lo que queremos consultar.
    $sql = "UPDATE `propiedades` SET
    
    `nombre` = '$nombre',
    `tipo_propiedad` = '$tipo_propiedad',
    `tipo_oferta` = '$tipo_oferta',
    `banos` = '$banos',
    `area` = '$area',
    `tamano_lote` = '$tamano_lote',
    `ano` = '$ano',
    `descripcion` = '$descripcion',
    `direccion` = '$direccion',
    `video` = '$video' 
    ";
    
    if(empty($ciudad) || $ciudad == NULL):
    $sql .= ", `ciudad` = NULL";
    else:
    $sql .= ", `ciudad` = '$ciudad'";
    endif;
    
    if(empty($barrio) || $barrio == NULL):
    $sql .= ", `barrio` = NULL";
    else:
    $sql .= ", `barrio` = '$barrio'";
    endif;
    
    if(empty($precio) || $precio == NULL):
    $sql .= ", `precio` = NULL";
    else:
    $sql .= ", `precio` = '$precio'";
    endif;

    # Termino la sentencia SQL con la condicional.
    $sql .= " WHERE `id` = '$id'";
    
    # Solicito la consulta.
    $query = $con->query($sql);
    
    # Devuelvo los datos
    return $query;
    
    # Cierro la conexión con la base de datos.
    $con->close();
    
  }
  
  public function AsignarFotoDestacada ($id, $image) { 
    
    # Conecto a la base de datos.
    $adb = new MySQL();
    $con = $adb->Connect();
    
    # La sentencia SQL permite realizar la cadena de lo que queremos consultar.
    $sql = "UPDATE `propiedades` SET `imagen_destacada` = '$image'  WHERE `id` = '$id'";
    
    # Solicito la consulta.
    $query  = $con->query($sql);
    
    # Devuelvo los datos
    return $query;
    
    # Cierro la conexión con la base de datos.
    $con->close();
  
  }
  
  public function DelPropiedad ($input) { 
    
    # Conecto a la base de datos.
    $adb = new MySQL();
    $con = $adb->Connect();
    
    # La sentencia SQL permite realizar la cadena de lo que queremos consultar.
    $sql = "DELETE FROM `propiedades` WHERE `id` = '$input'";
    
    # Solicito la consulta.
    $query  = $con->query($sql);
    
    # Devuelvo los datos
    return $query;
    
    # Cierro la conexión con la base de datos.
    $con->close();
  
  }
  
} 

class Galeria {
  
  public function SelImagen ($id) { 
    
    # Conecto a la base de datos.
    $adb = new MySQL();
    $con = $adb->Connect();
    
    # La sentencia SQL permite realizar la cadena de lo que queremos consultar.
    $sql = "SELECT * FROM `imagenes_propiedades` WHERE `id` = '$id'";
    
    # Solicito la consulta.
    $query  = $con->query($sql);
    
    # Devuelvo los datos
    return $query;
    
    # Cierro la conexión con la base de datos.
    $con->close();
  
  }
  
  public function SelGaleria ($propiedad) { 
    
    # Conecto a la base de datos.
    $adb = new MySQL();
    $con = $adb->Connect();
    
    # La sentencia SQL permite realizar la cadena de lo que queremos consultar.
    $sql = "SELECT * FROM `imagenes_propiedades` WHERE `propiedad` = '$propiedad'";
    
    # Solicito la consulta.
    $query  = $con->query($sql);
    
    # Devuelvo los datos
    return $query;
    
    # Cierro la conexión con la base de datos.
    $con->close();
  
  }
  
  public function NuevaImagen ($propiedad, $img_name) { 
    
    # Conecto a la base de datos.
    $adb = new MySQL();
    $con = $adb->Connect();
    
    # La sentencia SQL permite realizar la cadena de lo que queremos consultar.
    $sql = "INSERT INTO `imagenes_propiedades` (propiedad, imagen) VALUES ('$propiedad', '$img_name')";
    
    # Solicito la consulta.
    $query  = $con->query($sql);
    
    # Devuelvo los datos
    return Array('id' => $con->insert_id);
    
    # Cierro la conexión con la base de datos.
    $con->close();
  
  }
  
  public function DelImagen ($id) { 
    
    # Conecto a la base de datos.
    $adb = new MySQL();
    $con = $adb->Connect();
    
    # La sentencia SQL permite realizar la cadena de lo que queremos consultar.
    $sql = "DELETE FROM `imagenes_propiedades` WHERE id = '$id'";
    
    # Solicito la consulta.
    $query  = $con->query($sql);
    
    # Devuelvo los datos
    return Array('id' => $con->insert_id);
    
    # Cierro la conexión con la base de datos.
    $con->close();
  
  }
  
}

?>