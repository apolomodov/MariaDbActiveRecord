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
	* @throws MariaModelException
	* @param string $value
	* @return string
	**/
	protected static function checkColumnsName($value){
		if (preg_match(self::$column_format, $value) === 0){
		    throw new MariaModelException(MariaModelException::BAD_COLUMN_NAME_SYNTAX);
		}
		return $value;
	}
	
	/**
	* Check column type
	*
	* @throws MariaModelException
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
	 * @return mixed -  array('column'=>'name', 'id'=>id) | String 'name'
	 */
	private function parseColumn($name){
		if (preg_match(self::$column_format,$name, $matches) !== 0){
		    return array($matches[1], $matches[2]);
		}else{
		    return $name;
		}
	}
	
	/**
	 * Обратное для parseColumn
	 *
	 * @throws MariaModelException
	 * @param  mixed  $column_and_id - array('name',id)
	 *
	 * @return string
	 */
	private function encodeColumn($column_and_id){
		if (is_string($column_and_id)){
			return (string)$column_and_id;
		}else if (is_array($column_and_id)){
			return (string)($column_and_id[0]) . "_" . (string)($column_and_id[1]);
		}else{
			throw new MariaModelException(MariaModelException::BAD_COLUMN_PHP_TYPE_IN_PARSE);
		}
	}
	
	
	/**
	* Build prefix
	* @return string
	*/
	private function buildPrefix(){
		/* все не динамические столбцы + все динамические столбцы*/
		$columns = '*';
		return 'SELECT '.$columns.' FROM '.$this->table_name;
	}
	
	/**
	 * 
	 * @param string $conds
	 * @param array $params
	 * @return string - sql where
	 */
	private function buildWhere($conds, $params=array()){
		return "WHERE ";
	}
	
	/**
	 * @param string $column
	 * @param string $value
	 * 
	 * @return MariaActiveRecord $record
	 */
	public function findByColumnValue($column, $value){
		return null;
	}
	
	/**
	 * @param string $column
	 * @param string $value
	 *
	 * @return array of MariaActiveRecord|array() $record
	 */
	public function findAllByColumnValue($column, $value){
		return array();
	}
	
	/**
	 * $this->findAllByDynamicAttributes(array('field_n_1'=>':user_id', 'title'=>'123'), array(':user_id'=>'$value'));
	 * @param array $arr - array( '$column_$id'=>$value )
	 * @param array $params - array( ':name'=>$value )
	 *
	 * @return mixed $record
	 */
	public function findByDynamicAttributes($arr, $params=array()){
		return array();
	}
	
	/**
	* 
	* @param string $conditions
	* @param array $params
	* @return bool
	*/
	public function deleteAllByDynamicAttributes($conditions, $params=array()){
		return true;
	}
	
	/**
	 * 
	 * @param array $to_set - array('column'=>value, 'field_n_2'=>value);
	 * @param string $condition
	 * @param array $params
	 * @return bool
	 */
	public function updateAllByDynamicAttributes($to_set, $condition, $params=array()){
		return true;
	}
}
