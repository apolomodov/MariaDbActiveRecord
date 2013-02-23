<?php
/**
 * 
 * @author piroman
 *
 * @require: mysql_escape_string(htmlspecialchars())
 */
class MariaModel {
  
	protected $table_name; //string table name
	protected $columns; // array('fields_1','field_2','fields_3');
	protected $columns_types;  // array('char(255)','int','text');
	
	public function __contruct($table_name, $columns, $column_types){
		//чекнуть $this->columns; на то что это массив вида array(0=>'fields_1',1=>'field_2',2=>'fields_3');
		//чекнуть $this->columns_type; на то что это массив вида array(0=>'fields_1',1=>'field_2',2=>'fields_3');
	}
	
	/**
	 * 
	 * @param $name string
	 * @return Array array('column'=>'name', 'id'=>id), String 'name'
	 */
	private function parseColumn($name){
		
	}
	
	/**
	 * 
	 * @return String
	 */
	private function encodeColumn(Array $column_and_id){
		
	}
	
	private function encodeColumn(string $column){
		
	}
	
	private function buildPrefix(){
		return "SELECT "./* все не динамические столбцы */./*все динамические столбцы*/.' FROM '.$table_name;
	}
	
	/**
	 * 
	 * @param unknown_type $array
	 * @param unknown_type $params
	 * @return STRING of sql
	 */
	private function buildWhere($array, $params=array()){
		
	}
	
	/**
	 * @param unknown_type $column
	 * @param unknown_type $value
	 * 
	 * @return MariaActiveRecord|null $record
	 */
	public function findByColumnValue($column, $value){
		//
	}
	
	/**
	 * @param unknown_type $column
	 * @param unknown_type $value
	 *
	 * @return array of MariaActiveRecord|array() $record
	 */
	public function findAllByColumnValue($column, $value){
		//
	}
	
	/**
	 * @param unknown_type $array - array( '$column_$id'=>$value )
	 * @param unknown_type $params - array( ':name'=>$value )
	 * 
	 * $this->findByDynamicAttributes(array('field_n_1'=>':user_id'), array(':user_id'=>'$value'));
	 * @return MariaActiveRecord|null $record
	 */
	public function findByDynamicAttributes($array, $params=array()){
		
	}

	/**
	 * @param unknown_type $array - array( '$column_$id'=>$value )
	 * @param unknown_type $params - array( ':name'=>$value )
	 *
	 * $this->findAllByDynamicAttributes(array('field_n_1'=>':user_id', 'title'=>'123'), array(':user_id'=>'$value'));
	 * @return array of MariaActiveRecord|array() $record
	 */
	public function findByDynamicAttributes($array, $params=array()){
		
	}
	
	public function deleteAllByDynamicAttributes($conditions_array, $params=array()){
	
	}
	
	/**
	 * 
	 * @param unknown_type $to_set - array('column'=>value, 'field_n_2'=>value);
	 * @param unknown_type $condition_array
	 * @param unknown_type $params
	 */
	public function updateAllByDynamicAttributes($to_set, $condition_array, $params=array()){
		
	}	
	
	public function insert($to_set){
		
	}
}
