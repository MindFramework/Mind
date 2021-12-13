<?php
/**
 *
 * @package    Mind
 * @version    Release: 4.8.1 (For 4.7.9 and earlier: https://github.com/aliyilmaz/Mind)
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
    public static $class;
    public static $classFile;
    public static $developer;

    public static function __callStatic($method, $params) {

        // Accessing another source code included in the package
        if(strstr($params[0], ':')){ 
            list($params[0], $callClass) = explode(':', $params[0]); }

        // Developer name and Package name are converted to path
        self::$path = trim(implode('/', [$method, $params[0]]), '/');

        // Updating Developer name and Class name
        list(self::$developer, self::$class) = explode('/', self::$path);

        // If there is no special case, the existing package file is defined
        if(empty($callClass)){ 
            $callClass = self::$class; }
        
        // The file path of the request is created
        self::$classFile = './developer/'.self::$path.'/src/'.$callClass.'.php';

        // The package file is included
        if(file_exists(self::$classFile)){
           require_once(self::$classFile);
        }

        // If the class exists, it is defined.
        if(class_exists($callClass)){
            $class = new $callClass(self::$conf);
            return $class;
        }     

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
