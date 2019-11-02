<?php 
	//conexión
	require 'pdo_conexion.php';
	//stmt = sentencia es una variable // dbh es la conexion

	//recuperar los datos del formulario
	$pk='21';
	$nif='38424012M';
	$nombre='james charly';
	$apellidos='brown';	
	try {
		//la sentencia es preparada con los parametros
		$stmt=$dbh->PREPARE("UPDATE personas SET nif=:nif, nombre=:nombre, apellidos=:apellidos WHERE idpersonas=:pk");

		//bind de los parametros // asigna los valores a la sentencia preparada
		$stmt->bindParam(':pk', $pk);
		$stmt->bindParam(':nif', $nif);
		$stmt->bindParam(':nombre', $nombre);
		$stmt->bindParam(':apellidos', $apellidos);

		//Ejecutar la sentencia
		$stmt->execute();
		echo 'modificación realizada';
		//numero de filas modificadas
		echo $stmt->rowCount();

	}catch (PDOException $e) {
		echo $e->getCode().' '.$e->getMessage();
		
	}catch (Exception $e) {
		echo $e->getCode().' '.$e->getMessage();

	}





 ?>