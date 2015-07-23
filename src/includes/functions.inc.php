<?php
function db(){
	return new PDO('sqlite:../../church11.sqlite');
}

function queryToJson($res){
    $ret = "[\n\t";
	$ret .= json_encode($res->fetch(), JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE);
	while($row = $res->fetch()){
		$ret .= ",\n\t";
		$row['FotoMembro'] = rawurlencode(utf8_decode($row['FotoMembro']));
		$ret .= json_encode($row, JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE);
	}
	$ret .= "\n]";
    return $ret;
}
