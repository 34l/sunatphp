<?php
 	header("Access-Control-Allow-Origin: *");
	require_once("./src/autoload.php");
	header('Content-Type: application/json');
	//require_once("./vendor/autoload.php");
	
	$cookie = array(
		'cookie' 		=> array(
			'use' 		=> true,
			'file' 		=> __DIR__ . "/cookie.txt"
		)
	);
	$config = array(
		'representantes_legales' 	=> false,
		'cantidad_trabajadores' 	=> false,
		'establecimientos' 			=> false,
		'cookie' 					=> $cookie
	);
	$sunat = new \Sunat\ruc( $config );
	
	
	if(!empty($_POST)){
		$ruc = $_POST['nro'];
		$tipo = $_POST['tipo'];
		
		/*
		if($tipo == "1"){
			$search1 = $sunat->consulta( $ruc );
		}
		else if($tipo == "6"){
			$search1 = $sunat->consulta( $ruc );
		}
		*/
		$search1 = $sunat->consulta( $ruc );
	}

	//$ruc = "20169004359";
	//$dni = "44274795";
	
	//$search2 = $sunat->consulta( $dni );
	/*
	if( $search1->success == true )
	{
		echo "Empresa: " . $search1->result->razon_social;
	}
	*/
	/*
	if( $search2->success == true )
	{
		echo "Persona: " . $search1->result->razon_social;
	}
	*/
	
	// Mostrar en formato JSON
	echo $search1->json( );
	//echo $search2->json( NULL, true ); // pretty format
?>