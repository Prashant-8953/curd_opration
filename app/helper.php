

<?php

// kuchh log  ish helper file ka name like - custom_helper.php,include.php,auto_load.php aise name rakhte hai  

// note =>  ye file her page per load hoti hai lekin iski kuchh setting hai ,ye file isliye banayi jati hai taki koi bhi fuction conflict na ho , aur dusra koi bhi aisa function ho jo hume bar-bar har page me use karna ho ya koi aisa code ho jo har page me use ho raha ho to hum helplerfile me function banake code ko eassliy use kar sakte hai. 

// step-1 => open composer.json file and search autoload attribute and uske ander ek file name ke atribute me ek array banake ush array me file ka path set karna hoga.

// example-   "files": ["app/helper.php"],

// step-2 => ab termile me compser dump-autoload cmd run karna hoga jisse vo file add karlega.


if(!function_exists('p')){
    function p($data){
        echo "<pre>";
        print_r($data);
        echo "<pre>";
        
    }
}

if(!function_exists('get_date_formate')){
    function get_date_formate($date,$formate){
        
        $formatedate= date($formate,strtotime($date));
        return $formatedate;

    }
}

?>