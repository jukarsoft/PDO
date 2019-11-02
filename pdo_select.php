<?php 
	require 'pdo_conexion.php';

	//consultas sql; SELECT

	try {
		$stmt=$dbh->PREPARE("SELECT * FROM personas ORDER BY nombre");

		// Especificar como se quieren devolver los datos
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		//$stmt->setFetchMode(PDO::FETCH_NUM);
		//$stmt->setFetchMode(PDO::FETCH_BOTH);
		//inicia una transaction
		$dbh->beginTransaction();
		//Ejecutar la sentencia
		$stmt->execute();
		//commit a la transacción
		$dbh->commit;
		//numero de filas modificadas
		echo $stmt->rowCount();

		//bucle para obtener cada una de las filas obtenidas		
		while ($fila = $stmt->fetch()) {
			print_r ($fila);
		}
	}catch (PDOException $e) {
		echo $e->getCode().' '.$e->getMessage();

	}catch (Exception $e) {
		echo $e->getCode().' '.$e->getMessage();

	}



	

	


 ?>