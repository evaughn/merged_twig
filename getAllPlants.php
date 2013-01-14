<?php

	require_once('lego/DatabaseLego.php');
	ConnectDB();
	
	function getAllPlants(){

		$query = mysql_query("SELECT * FROM plants LIMIT 50");/*Limit for right now*/
		$plants = array();

		while($result = mysql_fetch_assoc($query)){
				$plants['id'] = $result['id'];
				$plants['name'] = $result['common_name'];
				$plants['latin'] = $result['latin_name'];
		}

		$mysqli->close();

		$html = "<ul class='returnList'>";
		$img = "<img src='http://placekitten.com/150/150' />";
		foreach($plants as $plant){
			$name = $plant['name'];
			$type = $plant['latin'];

			$html .= "<li>
						$img
						<h2>$name</h2>
						<h3>$type</h3>
					 </li>";
		}

		$html.="</ul>";

		echo $html;
	}

?>