<?php
class ProtectedItem extends AppModel {
    var $useDbConfig = MOONLIGHT_DB_CONFIG; //Remove this when moving to production
    var $name = 'ProtectedItem';
    var $validate = array(
		'title'			=>	VALID_NOT_EMPTY,
		'description'	=>	VALID_NOT_EMPTY
	);
	var $hasAndBelongsToMany = array(
					"Resource" => array(
						"dependent" => true,
						"conditions" => "Resource.type=1",
						"order" => "order_by ASC"
					),
					"Decorative" => array(
						"dependent" => true,
						"className" => "Resource",
						"conditions" => "Decorative.type=0",
						"order" => "order_by ASC"
					),
					"Downloadable" => array(
						"dependent" => true,
						"className" => "Resource",
						"conditions" => "Downloadable.type=2",
						"order" => "order_by ASC"
					)
	);
	var $belongsTo = array("ProtectedSection");
	var $recursive = 2;
	
}
?>