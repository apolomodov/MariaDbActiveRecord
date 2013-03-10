<?php /*. require_module 'standard'; .*/ ?>
<?php /*. require_module 'pcre'; .*/ ?>
<?php
/**
 * 
 * @author piroman
 *
 */
class MariaModel {
	protected /*. string .*/ $table_name; //string table name
	protected /*. array .*/ $columns; // array('fields_1','field_2','fields_3');
	protected /*. array .*/ $columns_types;  // array('char(255)','int','char(4096)');
	
	private static /*. array .*/ $types = array('char(255)','int','char(4096)');
	private static /*. string .*/ $column_format = '/^(.*)_([0-9]+)$/';

	/**
	* Create Maria Model
	*
	* @param string $table_name
	* @param array $columns
	* @param array $column_types
	*
	* @return void
	*/
	public function __construct($table_name, $columns, $column_types)
	{
		//чекнуть $this->columns; на то что это массив вида array('field_1','field_2','field_3');
		$this->columns = array_filter(array(__CLASS__,'checkColumnsName'), $columns);
		//чекнуть $this->columns_type; на то что это массив вида array('field_1'=>'char(255)|int|char(4096)');
		$this->columns_types = array_filter(array(__CLASS__,'checkColumnsTypes'), $column_types);
		$this->table_name = $table_name;
	}
	
	/**
	* Check column name is valid
	*
	* @param string $value
	* @return string
	**/
	protected static function checkColumnsName($value){
		if (! (bool)preg_match(self::$column_format, $value)){
		    throw new MariaModelException(MariaModelException::BAD_COLUMN_NAME_SYNTAX);
		}
		return $value;
	}
	
	/**
	* Check column type
	*
	* @param string $type
	* @return string
	**/
	protected static function checkColumnsType($type){
		if (!in_array($type, self::$types)){
		    throw new MariaModelException(MariaModelException::BAD_COLUMN_TYPE_SYNTAX);
		}
		return $type;
	}

	/**
	 * Parse Column And Return Array Or String - column of Maria
	 * @param string $name
	 *
	 * @return array|string -  array('column'=>'name', 'id'=>id) | String 'name'
	 */
	private function parseColumn($name){
		if (preg_match(self::$column_format,$name, $matches)){
		    return array($matches[1], (int)$matches[2]);
		}else{
		    return $name;
		}
	}
	
	/**
	 * Обратное для parseColumn
	 * @param  array  $column_and_id - array('name',id)
	 *
	 * @return string
	 */
	private function encodeColumn(array $column_and_id){
		return $column_and_id[0]."_".$column_and_id[1];
	}
	
	private function encodeColumn($column){
		return $column;
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
