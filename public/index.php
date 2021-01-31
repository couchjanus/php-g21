<?php if ($_SERVER['REQUEST_URI']=='/'):?>
    <h1>Home Page</h1>
<?php elseif($_SERVER['REQUEST_URI']=='/about'):?>
    <h1>About Page</h1>
<?php elseif($_SERVER['REQUEST_URI']=='/contact'):?>
    <h1>Contact Page</h1>
<?php elseif($_SERVER['REQUEST_URI']=='/blog'):?>
    <h1>Blog Page</h1>

<?php elseif($_SERVER['REQUEST_URI']=='/shop'):
    include "catalog.html";    
?>

<?php elseif($_SERVER['REQUEST_URI']=='/info'):
    include "info.php";    
?>

<?php else:?>
     <h1>404</h1>
<?php endif; ?>