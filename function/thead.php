<?php
$count = count($header);

if(!empty($count)){
	echo "<thead><tr>";
	$th .= "<th>No</th>";
	for($i=0;$i<$count;$i++){
		$th .= "<th>".$header[$i]."</th>";
	}
	$th .= "<th>Aksi</th>";
	
	echo $th;
	echo "</tr></thead>";
}
?>
