<?php
/**
 * 
 * @author piroman
 *
 * @see https://kb.askmonty.org/en/dynamic-columns/
 */
abstract class MariaActiveRecord {
  
	abstract protected $table_name;
	abstract protected $columns; // array('fields_1','field_2','fields_3');
	abstract protected $columns_types;  // array('char(255)','int','text');

	protected $attrs;
	public $isNewRecord;
	
	public function __contruct(){
		//чекнуть $this->columns; на то что это массив вида array(0=>'fields_1',1=>'field_2',2=>'fields_3');
		//чекнуть $this->columns_type; на то что это массив вида array(0=>'fields_1',1=>'field_2',2=>'fields_3');
		
		$attrs = array(); //'fields_1'=>array(),'fields_2'=>array(), 'fields_3'=>array()
		$this->isNewRecord = true; 
	}
	
	abstract public function model($model=__CLASS__){
		return new MariaModel($this->tb...);
	}
	
	private function insert(){
		//use MariaModel
	}
	
	private function update(){
		//use MariaModel
	}
	
	public final function save(){
		if ($this->isNewRecord){
			$this->insert();
		}else{
			$this->update();
		}
	}
	
	/**
	 * 
	 * @param unknown_type $column - из кого 
	 * @param unknown_type $id - что
	 */
	public  final function delete_dynamic($column, $id){
		
	} 
	
	/**
	 * 
	 * @param unknown_type $column - куда
	 * @param unknown_type $id - номер
	 * @param unknown_type $value - значение
	 * 
	 */
	public  final function add_dynamic($column, $id, $value){
		
	}
	
	/**
	 * 
	 * @param unknown_type $column
	 * @see COLUMN_CREATE
	 * 
	 * COLUMN_CREATE(0,'0' as char(255))- тип который выше
	 */
	public  final function init_dynamic($column){
		
	}
	
	/**
	 * 
	 * @param unknown_type $name = "$column_$id"
	 * @param unknown_type $value 
	 */
	public final function __set($name,$value){
		
	}

	/**
	 *
	 * @param unknown_type $name = "$column_$id"
	 * 
	 */
	public final function __get($name){
		
	}
	
	/**
	 *
	 * @param unknown_type $name = "$column_$id"
	 *
	 */
	public final function __unset($name){
		
	}
	
	/**
	 *
	 * @param unknown_type $name = "$column_$id"
	 *
	 */
	public final function __isset($name){
		
	}
}
