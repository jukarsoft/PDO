<?php 
	//conexión
	require 'pdo_conexion.php';
	//stmt = sentencia es una variable // dbh es la conexion

	//recuperar los datos del formulario
	$nif='08830691W';
	//$nif='';
	$nombre='roberto ';
	$apellidos='cascorro';	
	try {
		//validar  nif obligatorio
		if (trim($nif)=="") {
			throw new Exception("nif obligatorio", 10);			
		}
		//la sentencia es preparada con los parametros
		$stmt=$dbh->PREPARE("INSERT INTO personas VALUES(NULL, :nif, :nombre, :apellidos)");

		//bind de los parametros // asigna los valores a la sentencia preparada
		$stmt->bindParam(':nif', $nif);
		$stmt->bindParam(':nombre', $nombre);
		$stmt->bindParam(':apellidos', $apellidos);

		//Ejecutar la sentencia
		$stmt->execute();

		echo 'persona dada de alta ';

		//recuperar el id del último insert
		$id = $dbh->lastInsertId();
		echo "persona id: $id dada de alta";
	} catch (PDOException $e) {
		//excepciones que se produzcan en el acceso a la bd
								//ojo errorInfo es un array
		if ($stmt->errorInfo()[1] == 1062) {
			echo 'persona ya existe en base de datos';
		} else {
			echo $e->getCode().' '.$e->getMessage();		
		}
	} catch (Exception $e) {
			echo $e->getCode().' '.$e->getMessage();
	}

?>