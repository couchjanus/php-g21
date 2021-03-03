<?php

define('ROOT', realpath(__DIR__ . "/../"));
require_once ROOT.'/config/app.php';

function includeWithVars($fileName, $vars) {
   extract($vars);
   include_once($fileName);
}

function isGuest()
{
    if(isset($_SESSION['Logged'])){
        return false;
    }
    return true;
}

function conf($mix) {
    $url = ROOT."/config/".$mix.".json";
    if (file_exists($url)) {
        $jsonFile = file_get_contents($url);
        return json_decode($jsonFile, TRUE);
    } else {
        echo "The file $url does not exists";
        return false;
    }
}

// spl_autoload_register(function($class) {
//     $file = ROOT.'/core/'.$class.'.php';
//     if(is_file($file)) {
//         require_once $file;
//     }
//
//     $model = ROOT. '/app/Models/' . $class . '.php';
//     if (file_exists($model)) {
//         include_once $model;
//     }
//
//     $controller = ROOT. '/app/Controllers/' . $class . '.php';
//     if (file_exists($controller)) {
//         include_once $controller;
//     }
// });



// 

function load($file){
    if(is_file($file)) {
        include_once $file;
    }
}

spl_autoload_register(function($class) {
    $parts = explode('\\', $class);

    $classDirs = ['/core/', '/app/Models/', '/app/Controllers/', '/app/Controllers/Admin/'];
    
    foreach ($classDirs as $classDir) {
       load(ROOT.$classDir.end($parts).'.php');    
    }
    // load(ROOT.'/core/'.end($parts).'.php');
    // $file = ROOT.'/core/'.end($parts).'.php';
    // if(is_file($file)) {
    //     require_once $file;
    // }

    // $parts = explode('\\', $class);
    // load(ROOT. '/app/Models/' . end($parts) . '.php');
    // $model = ROOT. '/app/Models/' . end($parts) . '.php';

    // if (file_exists($model)) {
    //     include_once $model;
    // }

    // $result = scandir(ROOT. '/app/Controllers');
    // load(ROOT. '/app/Controllers/' . end($parts) . '.php');
    // $controller = ROOT. '/app/Controllers/' . end($parts) . '.php';
    // if (file_exists($controller)) {
    //     include_once $controller;
    // }

    // load(ROOT. '/app/Controllers/Admin/' . end($parts) . '.php');
    // $admcontroller = ROOT. '/app/Controllers/Admin/' . end($parts) . '.php';

    // if (file_exists($admcontroller)) {
    //     include_once $admcontroller;
    // }
});


require_once ROOT."/core/App.php";
use Core\App;

(new App())->run();


// Define a function to output files in a directory
function controllerFiles($path){
    // Check directory exists or not
    if(file_exists($path) && is_dir($path)){
        // Scan the files in this directory
        $result = scandir($path);
        
        // Filter out the current (.) and parent (..) directories
        $files = array_diff($result, array('.', '..'));
        
        if(count($files) > 0){
            // Loop through retuned array
            foreach($files as $file){
                if(is_file("$path/$file")){
                    // Display filename
                    echo $file . "<br>";
                } else if(is_dir("$path/$file")){
                    // Recursively call the function if directories found
                    controllerFiles("$path/$file");
                }
            }
        } else{
            echo "ERROR: No files found in the directory.";
        }
    } else {
        echo "ERROR: The directory does not exist.";
    }
}
 
// Call the function
// controllerFiles(ROOT. '/app/Controllers');