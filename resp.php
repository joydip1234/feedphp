<?php
/**
 * Created by PhpStorm.
 * User: Sudipta
 * Date: 3/29/2017
 * Time: 10:07 AM
 */

if(!empty($_POST)){
    //$file = fopen("new.txt","a");
    if(isset($_POST['ajax'])){
        $file = fopen("feedback.csv","a");
        $line ="";
        foreach ($_POST as $key=>$value)
        {
            if($key != 'ajax'){
                $line .= $value.":";
            }
        }
        fputcsv($file,explode(':',$line));
        fclose($file);
        die(json_encode($line));
    }
}

print_r($_POST);

?>