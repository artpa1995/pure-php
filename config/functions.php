<?php
date_default_timezone_set('Asia/Yerevan');
function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}



function sql_select($sql_connect, $table,$condition, $column='*') {
		
	/*if(gettype($column) == "array") {
		$col_names = implode(",", $column);
		return mysqli_query($sql_connect, "SELECT $col_names FROM `$table`");	
	}
	
	elseif(gettype($column) == "string") {
		return mysqli_query($sql_connect, "SELECT $column FROM `$table`");
	}
	else {
		echo "Enter valid arguments!";
	} */
	$wheredata = [];

    foreach ($condition as $key => $value) {
        $wheredata[] = "`" . $key . "`=" . "'" . $value . "'";
    }
    $wData = implode(',',$wheredata);

	if(is_array($column)){
	  $data = implode(',',$column);
    } else{
        $data = $column;
    }
    $sql = "SELECT $data FROM `$table` WHERE $wData";
	var_dump($sql);die;

}

function sql_insert($sql_connect, $table, $assoc_cols) {
	$key_array = [];
	$value_array = [];
	
	foreach($assoc_cols as $key => $value) {
		$key_array[] = "`".$key."`";
		$value_array[] = "'".$value."'";
	}
	$columns = implode(",", $key_array);
	$values = implode(",", $value_array);
    return mysqli_query($sql_connect, "INSERT INTO `$table` ($columns) VALUES ($values)");
}

function sql_update($sql_connect,$table,$data,$condition=false){
    $key_array = [];
    $value_array = [];

    foreach ($data as $key => $value ){
        $key_array[] = "`".$key."`="."'".$value."'";
    }

    if(is_array($condition)) {
        foreach ($condition as $key => $value) {
            $value_array[] = "`" . $key . "`=" . "'" . $value . "'";
        }
        $whereData = implode(' AND ',$value_array);
    }

    $columns = implode(",", $key_array);


    $sql = "UPDATE `$table` SET $columns";
    if(isset($whereData)){
        $sql.=" WHERE $whereData";
    }

    return mysqli_query($sql_connect, $sql);

}

function sql_delete($sql_connect,$table,$condition){
    $value_array = [];

    foreach ($condition as $key => $value) {
        $value_array[] = "`" . $key . "`=" . "'" . $value . "'";
    }
    $whereData = implode(' AND ',$value_array);

    $sql = "DELETE FROM `$table` WHERE $whereData";
    return mysqli_query($sql_connect, $sql);

}