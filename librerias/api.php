<?php
class API_tmx
{
    /*
    Funciones importantes:
        * doQuery
        * existsInDB
        * updateInDB
        * llamada
        * getCamposGenericos
        * doTransaction
    */
	protected function conectaBD(){
		$db_host= "localhost";
		$db_user= "root";
		$db_password= "";
		$db_name= "transportApp";
		$db = mysqli_connect($db_host,$db_user,$db_password,$db_name);
		return $db;
	}
	function llamada($peticion, $url, $headers = false, $disableSSLWarnings=false, $traceback=false, $jsonReq=false){ //http://psdtelmex.com.mx
      /*
        Hace una petición POST a alguna dirección de internet
      */ 
        $ch = curl_init($url);
	  //print_r( http_build_query($peticionProject) );
	  switch ($headers) {
	  	case false:
	  		curl_setopt($ch, CURLOPT_HEADER, false);
	  		break;
  		case true:
	  		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	  		break;
	  }
	  switch ($disableSSLWarnings) {
	  	case true:
	  		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	  		break;
	  }
	  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	  curl_setopt($ch, CURLOPT_POST, 1);
	  if($jsonReq == false)
	  	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($peticion));
	  else
	  	curl_setopt($ch, CURLOPT_POSTFIELDS, $peticion);
	  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	  curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	  $result = curl_exec($ch);
	  if($traceback == true){
	  	print_r(curl_getinfo($ch));
	  }
	  curl_close($ch);
	  return $result;
	}
	function getCampoAPI($numCampoEntidad, $numEntidadPDS, $whereIdProyecto, $tipoCampo)
	{
		$db = $this->conectaBD();
		
		$query="SELECT field_$numCampoEntidad FROM `app_entity_$numEntidadPDS` WHERE id='$whereIdProyecto';";
        $resultado=mysqli_query($db,$query);
        $nRows = mysqli_num_rows($resultado);
        if($nRows>0){
            $n = mysqli_fetch_array($resultado,MYSQLI_ASSOC);
            $ejec=$n["field_".$numCampoEntidad];
        }
        switch ($tipoCampo) {
        	case 'usuario':
        		if(strpos($ejec, ',') !== false){
		          //print_r("Sí tiene coma-> ".$ejec."\n");
		          $ejecs = explode(',', $ejec);
		          $ejecutivos = "";
		          foreach ($ejecs as $ejecDS) {
		            $query="SELECT CONCAT(field_7,' ', field_8) AS 'Ejecutivo DS' FROM app_entity_1 where id ='".$ejecDS."';";
		            $resultado=mysqli_query($db,$query);
		            $n = mysqli_fetch_array($resultado,MYSQLI_ASSOC);
		            if( ! empty(utf8_encode($n['Ejecutivo DS'])) ){
		              $ejecutivos.=utf8_encode($n['Ejecutivo DS']).", ";
		            }
		          }
		          $ejecutivos = substr($ejecutivos, 0, -2); //Quita la última coma y el espacio.
		          //$ejecutivos.="."; // Se retira punto final en Campo de Usuarios a petición de Enrique Avila
		          //Reemplaza en el json el campo 220 por los valores de usuario:
		          //$proyecto['224'] = $ejecutivos;
		          mysqli_close($db);     
		          return ($ejecutivos);
		        }
		        else{
		          //print_r("NO tiene coma-> ".$ejec."\n");
		          //$query="SELECT CONCAT(field_7,' ', field_8, '.') AS 'Ejecutivo DS' FROM `app_entity_1` where id in (SELECT field_224 from app_entity_21 where id ='$whereIdProyecto');"; //SE RETIRA PUNTO FINAL a peticion de Enrique avila
		          // ANTIGUA-> //$query="SELECT CONCAT(field_7,' ', field_8) AS 'Ejecutivo DS' FROM `app_entity_1` where id in (SELECT field_224 from app_entity_21 where id ='$whereIdProyecto');";
		          $query="SELECT CONCAT(field_7,' ', field_8) AS 'Ejecutivo DS' FROM `app_entity_1` where id ='".$ejec."';"; //<-#NUEVA#
		          $resultado=mysqli_query($db,$query);
		          $nRows = mysqli_num_rows($resultado);
		          $n = mysqli_fetch_array($resultado,MYSQLI_ASSOC);
		          //$proyecto['224'] = utf8_encode($n['Ejecutivo DS']);
		          mysqli_close($db);
		          //print_r(utf8_encode($n['Ejecutivo DS']));
		          return utf8_encode($n['Ejecutivo DS']);
		        }
        		break;
        	default:
        		# code...
        		mysqli_close($db);
        		return "Tipo de campo fuera de catálogo";
        		break;
        }
        return "Hubo un error";        
	}

	function getCamposGenericos($listaCampos, $numEntidadPDS, $condiciones){
		$db = $this->conectaBD();
		$resultados = array();
		$cadena="";
		foreach ($listaCampos as $campo) {
			$cadena.= $campo.=", ";
		}
		$cadena = substr($string, 0, -2);
		foreach ($listaCampos as $campo) {
			$query="SELECT $cadena FROM `$numEntidadPDS` WHERE $condiciones;";
			$query = utf8_decode($query);
	        $resultado=mysqli_query($db,$query);
	        $nRows = mysqli_num_rows($resultado);
	        if($nRows>0){
	            $n = mysqli_fetch_array($resultado,MYSQLI_ASSOC);
	            array_push($resultados, json_decode($n[$numCampoEntidad]));
	        }
		}
		mysqli_close($db);
		return $resultados;
	}
	function getUserGroup($nombreUsuario){
		$db = $this->conectaBD();
		$query= "SELECT field_6 as rol FROM app_entity_1 WHERE concat(field_7,' ', field_8) LIKE '%$nombreUsuario%';";
		$query = utf8_decode($query);
		if ($db->real_query($query)) {
		    //If the query was successful
		    $res = $db->use_result();
		    $row = $res->fetch_assoc();
		    $rol = $row['rol'];
		    $db->close();
		    return $rol;
		}
	    else{
		    //If the query was NOT successful
		    echo "Error en getUserGroup()";
		    echo "Ha ocurrido un error. Error No.: ";
		    echo $db->errno;
		}
		$db->close();
	}
	function doQuery($consulta, $utf8=false){
        /*
        Ejecuta una consulta SQL
            $consulta : str (Es la consulta SQL) " SELECT id, chofer FROM unidad WHERE placa = 'ABC'; "
        Regresa un arreglo con los resultados como:
        array( 
            [0] => array(
                "id"        => 1,
                "chofer"    => "Angel"
            )
        )
        Y se recupera el contenido como: 
        $resultado = bd->doQuery( consulta );

        $resultado[0]['id']     <- Ahí estará el id
        $resultado[0]['chofer'] <- Ahí estará el chofer
        */
		$db = $this->conectaBD();
		if($utf8 == true ){
    		$db->set_charset("utf8");
    	}
		$query=$consulta;
		$query = utf8_decode($query);
		$arregloResultado = array();
        if ($db->real_query($query)) {
        	//If the query was successful
        	//echo "Se hizo la consulta: ".$query."\n<br>";
		    $res = $db->use_result();
        	while($row = $res->fetch_assoc()){
        		array_push($arregloResultado, $row);
        	}
		}
	    else{
		    //If the query was NOT successful
		    echo "Error doQuery()";
		    echo "Ha ocurrido un error. Error No.: ";
		    echo $db->errno;
		    echo "<br>\nInfo:";
		    echo $db->error;
		}
		$db->close();
		return $arregloResultado;
	}
	function doQueryAssoc($consulta, $campoAsoc, $utf8=false){
		$db = $this->conectaBD();
     	if($utf8 == true ){
    		$db->set_charset("utf8");
    	}
		$query=$consulta;
		$query = utf8_decode($query);
		$arregloResultado = array();
        if ($db->real_query($query)) {
        	//If the query was successful
        	//echo "Se hizo la consulta: ".$query."\n<br>";
		    $res = $db->use_result();
        	while($row = $res->fetch_assoc()){
        		$arregloResultado[ $row[$campoAsoc] ] = $row;
        	}
		}
	    else{
		    //If the query was NOT successful
		    echo "Error doQueryAssoc()";
		    echo "Ha ocurrido un error. Error No.: ";
		    echo $db->errno;
		}
		$db->close();
		return $arregloResultado;
	}
	function insertInDB($table, $columnas, $valores, $traceback=false, $decodeUtf8=true){
        /*
        Hace una inserción a la base de datos:
            $table : str (Es la tabla a donde se va a insertar)
            $columnas : str (Son las columnas a insertar): "a,b,c"
            $valores: str (Son los valores a insertar) "'4', 'Angel', '2'"
        Regresa true si todo salió bien.
        Sino, regresa el error
        */
		$db = $this->conectaBD();
		//$valores = $db->real_escape_string($valores);
		$query = "INSERT into $table($columnas) VALUES($valores);";
		if(isset($traceback) AND $traceback == true){
			echo "Consulta Insert: ".$query."\n";
		}
		if( $decodeUtf8 != false ){
			$query = utf8_decode($query);
		}
		if ($db->real_query($query)) {
		    //If the query was successful
		    $res = $db->use_result();
		    $db->close();
		    return true;
		}
	    else{
		    //If the query was NOT successful
		    echo "Error insertInDB()";
		    echo "Ha ocurrido un error. Error No.: ";
		    echo $db->errno;
		    echo " ErrorInfo: ";
			echo $db->error;
			$errores = [
				0 => false,
				'errorNo' => $db->errno,
				'errorInfo' => $db->error
			];
		    return errores;
		}
		$db->close();
	}
	function insertInDBkey($table, $upParams, $traceback=false, $decodeUtf8=true){
		$db = $this->conectaBD();
		//$valores = $db->real_escape_string($valores);
		$query = "INSERT INTO $table(";
		$columnas = "";
		$valores = "";
		//mysqli::escape_string ( string $escapestr )
		foreach ($upParams as $columna => $valor) {
			$columnas.= $columna.",";
			print_r("valor columna->str: ".$columna."->".$valor."<br>\n");
			$valores .= "'".$valor."',";
		}
		$columnas = substr( $columnas, 0, -1);
		$valores = substr( $valores, 0, -1);
		$query.=$columnas.") VALUES(".$valores.");";
		if(isset($traceback) AND $traceback == true){
			echo "Consulta Insert: ".$query."\n";
		}
		if( $decodeUtf8 != false ){
			$query = utf8_decode($query);
		}
		if ($db->real_query($query)) {
		    //If the query was successful
		    $res = $db->use_result();
		    $db->close();
		    return true;
		}
	    else{
		    //If the query was NOT successful
		    echo "Error insertInDBkey()";
		    echo "Ha ocurrido un error. Error No.: ";
		    echo $db->errno;
		    echo " ErrorInfo: ";
		    echo $db->error;
		    return false;
		}
		$db->close();
	}
	function existsInDB($table, $condicionesExist){
        /*
            Coteja que un valor exista en una tabla de la BD
                $table : str (Es la tabla a donde se va a consultar)
                $condicionesExist : str (Son las condiciones como: " id = 'AX3J';" )
            Regresa 0 si NO existe,
            Regresa 1 o 2, o 3 ... si existe 1 o 2 o 3, ... en la tabla de la BD
        */
		$query = "SELECT count(*) as cuenta FROM `$table` WHERE $condicionesExist;";
		echo "Consulta Exists: ".$query."\n";
		$query = utf8_decode($query);
		$db = $this->conectaBD();
		if ($db->real_query($query)) {
		    //If the query was successful
		    $res = $db->use_result();
		    $row = $res->fetch_assoc();
		    $cuenta = $row['cuenta'];
		    $db->close();
		    return $cuenta;
		}
	    else{
		    //If the query was NOT successful
		    echo "Error existsInDB()";
		    echo "Ha ocurrido un error. Error No.: ";
		    echo $db->errno;
		}
		$db->close();
	}
	function updateInDB($table, $setData, $whereParams, $traceback=false){
        /*
        Actualiza un registro de la BD
            $table : str (Es la tabla a donde se va a actualizar)
            $columnas : str (Son los valores y columnas a actualizar): " status = 'inactivo', ganancias = '300' "
            $whereParams: str (Son las condiciones en donde se actualizará) " id = '3'"
        Regresa true si todo salió bien.
        Sino, regresa el error
        */
		$query = "UPDATE $table SET $setData WHERE $whereParams";
		if($traceback == true){
			echo "UPDATE statement: ".$query."\n";
		}
		$query = utf8_decode($query);
		$db = $this->conectaBD();
		if ($db->real_query($query)) {
		    //If the query was successful
		    $res = $db->use_result();
		    $db->close();
		    return true;
		}
	    else{
		    //If the query was NOT successful
		    echo "Error updateInDB()";
		    echo "Ha ocurrido un error. Error No.: ";
            echo $db->errno;
            echo " Info del error: ".$db->error;
		}
		$db->close();	
	}

	function doPost($url=null, $params=array(), $flag = false){
		if ($url != null and (! empty($params))){
			$data = $params;
			//$data = array('length' => $length, 'numberKey' => $numberKey);
			// use key 'http' even if you send the request to https://...
			$options = array(
		        'http' => array(
		            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
		            'method'  => 'POST',
		            'content' => http_build_query($data)
		        )
		    );
		    $context  = stream_context_create($options);
		    //$result = file_get_contents($url, $flag, $context);
		    $result = $this->llamada($context, $url);
		    return $result;
		}
	}
	function buildNativeCard($title, $number, $cols='4', $color = '#4CAF50', $icon= 'fa fa-flag-checkered', $cols1='3'){
		$card = '
	<div class = "col-md-'.$cols.' col-sm-'.$cols1.'">
		<div class="stats-overview stat-block">
		 	<table>
				<tbody><tr>	
				<td><div class="icon"><i style="color: '.$color.'" class="'.$icon.'"></i></div></td>
					<td>
						<table>
							<tbody>
								<tr>
									<td>
										<div class="display stat ok huge">							
											<div class="percent float-left" style="color: '.$color.'">'.
												$number.'
											</div>
										</div>
									</td>
									<td>
										<div style="clear:left">
										</div>
									</td>
								</tr>
							</tbody>
						</table>		
						<div class="details">
							<div class="title">'.
								 $title.'
							</div>
						</div>										 																 		
					</td>
				</tr>
				</tbody>
			</table>
		</div>
	</div>';
	return $card;
	}
	function buildMaterialSimpleCard($title='Titulo por defecto', $textBody='texto por defecto', $bgcolor='blue', $colorText='white-text', $tamHoriz='s3'){
		$card ='
		<div class="col '.$tamHoriz.'">
		  <div class="card '.$bgcolor.'">
		    <div class="card-content '.$colorText.'">
		      <span class="card-title">'.$title.'</span>
		      <p>'.$textBody.'</p>
		    </div>
		  </div>
		</div>
		';
		return $card;
	}
	function doTransaction($transaccion, $utf8=true){
        /*
        Ejecuta una serie de consultas SQL (insert o select o delete) en la base de datos
            $transaccion: array (Son las consultas SQL a ejecutar)
        Si algo salió mal, regresa el error
        No regresa nada si todo salió bien.
        */
		$db = $this->conectaBD();
		if($utf8 == true ){
    		$db->set_charset("utf8");
    	}
    	foreach ($transaccion as $consulta) {
    		$query=$consulta;
			$query = utf8_decode($query);
			//$arregloResultado = array();
	        if ($db->real_query($query)) {
	        	//If the query was successful
	        	//echo "Se hizo la consulta: ".$query."\n<br>";
			}
		    else{
			    //If the query was NOT successful
			    echo "Error doTransaction()";
			    echo "Ha ocurrido un error. Error No.: ";
			    echo $db->errno."<br>\n";
			    echo $db->error."<br>\n";
			    echo "Consulta: ".$query."<br>\n";
			}
    	}
		
		$db->close();
		//return $arregloResultado;
	}
}
?>