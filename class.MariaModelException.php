<?php /*. require_module 'standard'; .*/ ?>
<?php

class MariaModelException extends Exception
{
    const BAD_COLUMN_PHP_TYPE_IN_PARSE = 1;
    const BAD_COLUMN_NAME_SYNTAX = 2;
    const BAD_COLUMN_TYPE_SYNTAX = 3;
    
    private static /*. array .*/ $messages = array(
	self::BAD_COLUMN_PHP_TYPE_IN_PARSE => "Bad column type (php) in parse!",
	self::BAD_COLUMN_NAME_SYNTAX => "Bad column name syntax. must be column_number",
	self::BAD_COLUMN_TYPE_SYNTAX => "Bad column type syntax"
    );

    /**
    * @param int $code
    * @return void
    */
    public function __construct($code){
	$message = self::$messages[$code];
	parent::__construct((string)$message,$code);
    }
}