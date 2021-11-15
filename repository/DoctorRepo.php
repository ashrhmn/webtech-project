<?php
require_once('database.php');

function getAvailableDoctorsId(){
	$ids = array();
	$idsAssoc = queryToAssocArray("select id from availableDoctors");
	foreach($idsAssoc as $id){
		array_push($ids,$id['id']);
	}
	return $ids;
	
}



function toogleAvailability($id){
	if(!isPreparedStatementExecuted("delete from availableDoctors where id=?",'i',$id)){
		execPreparedStatement("insert into availableDoctors value(?)",'i',$id);
	}
}


