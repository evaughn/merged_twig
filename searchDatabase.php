<?php

	require_once('lego/DatabaseLego.php');
	ConnectDB();

	$plantName = strtolower($_GET['plantName']);
	$query = mysql_query("SELECT * FROM 'plants' WHERE 'key' = 'common_name' AND 'value' LIKE '%".mysql_real_escape_string($plantName)."%'");

	// if(array_key_exists('plantType', $_GET)){
	// 	$plantType = $_GET['plantType'];
	// 	$query .= " AND plantType = $plantType";
	// }

	// if(array_key_exists('plantType', $_GET)){
	// 	$plantMaintenance = $_GET['plantMaintenance'];
	// 	$query .= " AND plantMaintenance = $plantMaintenance";
	// }

	// if(array_key_exists('plantSize', $_GET)){
	// 	$plantSize = $_POST['plantSize'];
	// 	$query .= " AND plantSize = $plantSize";
	// }

	$num_rows = mysql_num_rows($query);
	$return = array();
	$plants = array();

	if($num_rows != 0){

		while($result = mysql_fetch_assoc($query)){
			$plant = $result["common_name"];
			$lname = $result["latin_name"];
			$id = $result['id'];
			$plant = array(
				'id'=>$id,
				'name'=>$plant,
				'latin_name'=>$lname
			);
			array_push($plants,$plant);
		}

		$return['plants'] = $plants;
	}else{
		$return['num'] = 0;
	};

	echo json_encode($return);

?>