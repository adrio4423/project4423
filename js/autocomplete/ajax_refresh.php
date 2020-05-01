<?php
// PDO connect *********
function connect() {
    return new PDO('mysql:host=localhost;dbname=db_payroll', 'root', 'pde2014', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}
 
$pdo = connect();
$keyword = '%'.$_POST['keyword'].'%';
$sql = "SELECT * FROM tb_personel WHERE nama_lengkap LIKE (:keyword) OR nrp_nip_npks LIKE (:keyword)ORDER BY id ASC LIMIT 0, 10";
$query = $pdo->prepare($sql);
$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
$query->execute();
$list = $query->fetchAll();
foreach ($list as $rs) {
	// put in bold the written text
	$name = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $rs['nama_lengkap']);
	$id = $rs['nrp_nip_npks'];
	// add new option
    echo '<li onclick="set_item(\''.str_replace("'", "\'", $id.":".$rs['nama_lengkap']).'\')">'.$name.'</li>';
}
?>