<?php

	function codigo_fuente($url){
	    $url = file($url);
	    $codigo = '';
	    foreach ($url as $numero => $linea) { 
	        $codigo .= htmlspecialchars($linea);
	    }
	    return $codigo;
	}

	// datos recibidos
	$enlace = (string) $_POST["url"];
	$patron = (string) $_POST["patron"];
 
 	// obtencion codigo fuente
	$codigo = codigo_fuente($enlace);

	// variables a usar
	$array_multidimensional = array();
	$array_res = array();
	$array_enlaces = array();

	// SPLIT 1
	$array_codigo = explode('&quot;', $codigo);
	
	// SPLIT 1
	foreach ($array_codigo as $valor) {
		array_push($array_multidimensional, explode("&apos;", $valor));
	}

	// FLAT
    foreach ($array_multidimensional as $array) {
    	foreach ($array as $valor) {
    		array_push($array_res, $valor);
    	}
    }

    // obtenemos los enlaces
    foreach ($array_res as $valor) {
    	if(stristr($valor, $patron)){
	    	$enlaces .= trim($valor)."<br/>";
	    }
    }

	echo $enlaces;


?>
