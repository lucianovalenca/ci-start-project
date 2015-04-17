<?php
/**
 * Integrates Composer
 * MUST add this class in the auto-load array as the very first elements
 *
 * @author Rana
 * @link http://codesamplez.com/development/composer-with-codeigniter
 */
class MY_Composer 
{
    function __construct() 
    {
        include('./vendor/autoload.php');
    }
}