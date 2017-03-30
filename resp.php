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
        try{
            $file = fopen("feedback.csv","a");
            $line = array();
            foreach ($_POST as $key=>$value)
            {
                if($key != 'ajax'){
                    array_push($line,$value);
                }
            }
            fputcsv($file,$line);
            fclose($file);
            die(json_encode($line));
        }catch (Exception $e) {
            die(json_encode($e));
        }
    }

    if(isset($_POST['makedataAppear'])){
        if(($_POST['un'] == 'baniksudipta') && ($_POST['pw'] == sha1("root"))){
            $line ="do";
            die(json_encode($line));
        }else{
            die(json_encode("dont"));
        }
    }
}

print_r($_POST);

?>