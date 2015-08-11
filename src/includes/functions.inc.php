<?php
function db(){
	return new PDO('sqlite:../../church11.sqlite');
}

function queryToJson($res){
	$ret = $res->fetchAll();
	foreach($ret as &$row){
		$row['FotoMembro'] = rawurlencode(utf8_decode($row['FotoMembro']));
	}
	return json_encode($ret);
}
