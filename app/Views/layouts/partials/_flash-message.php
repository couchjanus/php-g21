<?php 
// require_once ROOT.'/core/Session.php';
use Core\Session;

$session = Session::instance();
if ($session->flash()>0) {
	[$t, $msg] = $session->message();
    $alert = <<<EndMsg
       <div class="alert alert-{$t} alert-dismissible fade show mt-3" role="alert">
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="this.parentElement.style.display='none';">&times;</button>
           <strong>{$msg}!</strong>
       </div>
    EndMsg;
    echo $alert;
}
