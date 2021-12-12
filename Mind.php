<?php
/**
 *
 * @package    Mind
 * @version    Release: 4.8.0 (For 4.7.9 and earlier: https://github.com/aliyilmaz/Mind)
 * @license    GPL3
 * @author     Ali YILMAZ <aliyilmaz.work@gmail.com>
 * @category   Php Framework, Design pattern builder for PHP, New generation composer.
 * @link       https://github.com/MindFramework/Mind
 *
 */

class Mind
{

    public static $conf;
    public static $path;
    public static $developer;
    public static $language;
    public static $class;
    public static $version;
    public static $params;

    public static function __callStatic($method, $params) {

        if(!isset($params[1])){ $params[1] = null; }

        self::$path = trim(implode('/', [$method, $params[0]]), '/');

        list(self::$developer, self::$language, self::$class, self::$version) = explode('/', self::$path);

        require_once('./developer/'.self::$path.'/src/'.self::$class.'.php');

        self::$params = $params[1];

        $class = new self::$class( self::$conf, $params[1] );
        
        return $class;

    }
    
    public function __construct($conf=[])
    {
        self::$conf = $conf;
    }

    public function __desctruct()
    {
        // Code
    }


}
