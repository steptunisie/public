<?php
/**
 * 
 *
 * @author Eya  Nextweb
 */
function autoloader($classname) {
    $dirs=array('./Modeles/','../Modeles/','../../Modeles/','Modeles','include/','../../include/','../include/','Modeles/','../../../Modeles/');
    $formats=array('%s.php','$.php.inc','$s.classe.php');
    foreach ($dirs as $dir) {
        foreach ($formats as $format) {
            $path=$dir.sprintf($format, $classname);
            if (file_exists($path)){
                include $path;
                return;
                
            }
            
        }
        
    }
    
}
spl_autoload_register('autoloader');
