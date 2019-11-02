<?php 
//conexión
	require 'pdo_conexion.php';
	
	//BORRAR un REGISTRO // bd bancos3 // tabla personas // clave idpersonas
		$pk='1';
	try {
		//stmt = sentencia es una variable // dbh es la conexion
		$stmt=$dbh->PREPARE("DELETE FROM personas WHERE idpersonas=:pk");
		//bind de los parametros // asigna los valores a la sentencia preparada
		$stmt->bindParam(':pk', $pk);
		//inicia una transaction
		$dbh->beginTransaction();
		//Ejecutar la sentencia
		$stmt->execute();
		//commit a la transacción
		$dbh->commit;
		echo "BORRADO PERSONA $pk realizada";
		echo '<br>';
		//numero de filas modificadas
		echo $stmt->rowCount();

	}catch (PDOException $e) {
		if ($stmt->errorInfo()[1] == 1451) {
			echo $e->getCode().' '.$e->getMessage();
		} else {
			echo $e->getCode().' '.$e->getMessage();		
		}
	}catch (Exception $e) {
		echo $e->getCode().' '.$e->getMessage();


	}
	




 ?>


	