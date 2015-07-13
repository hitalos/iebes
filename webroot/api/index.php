<?php
if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip'))
	ob_start('ob_gzhandler');
else
	ob_start();

$bd = new PDO('sqlite:../../church11.sqlite');
$where = '';
if(isset($_REQUEST['aniversariantes'])){
	$where = " WHERE strftime('%d-%m', 'now') = strftime('%d-%m', DataNascMembro) ";
}

$query =
	"SELECT
		CodMembro,
		NomeMembro,
		DataNascMembro,
		strftime('%Y', 'now') - strftime('%Y', DataNascMembro) AS idade,
		eMailMembro,
		FotoMembro
	FROM
		tblmembros
	$where
	ORDER BY
		NomeMembro";
$res = $bd->query($query, PDO::FETCH_ASSOC);

header("Content-Type: application/json");
header('Content-Encoding: gzip');
echo "[\n";
echo json_encode($res->fetch(), JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE);
while($row = $res->fetch()){
	echo ",\n";
	echo json_encode($row, JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE);
}
echo "]\n";
ob_end_flush();
