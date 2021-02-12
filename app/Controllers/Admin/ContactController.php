<?php

$title = "Contact controller";
$address = conf('contacts');
//var_dump($address);
if ($_POST) {
    if (!$_POST['country'] or !$_POST['email'] or !$_POST['street'] or !$_POST['mobile'] or !$_POST['city']) {
        $error = "<h2>Please complete all the fields</h2>";
    } else {
            //Get form data
            $data = [
                'email'=> $_POST['email'],
                'country'=> $_POST['country'],
                'street'=> $_POST['street'],
                'mobile'=> $_POST['city'],
                'city' => $_POST['mobile']
            ];

            //Encode the array back into a JSON string.
            $json = json_encode($data);
            // Save file.
             if(file_put_contents(ROOT."/config/contacts.json", $json)) {
                 $redirect = "http://".$_SERVER['HTTP_HOST'].'/contact';
                 header("Location: $redirect");
                 exit();
             } else {
                 echo "error";
             }
    }
}

render('admin/contact/address', ['title' => $title, 'address'=>$address], 'admin');
