<?php
$title = "Contact controller";


$url = ROOT."/config/contacts.json"; // your json file path
$data = array(); // create empty array

$readJSONFile = file_get_contents($url);
print_r($readJSONFile); // display contents

//convert json to array in php
$data = json_decode($readJSONFile, TRUE);
var_dump($data); // print array

if ($_POST) {

    if (!$_POST['country'] or !$_POST['email'] or !$_POST['street'] or !$_POST['mobile'] or !$_POST['city']) {
        $error = "<h2>Please complete all the fields</h2>";
    } else {
            //Get form data
            $email = $_POST['email'];
            $country = $_POST['country'];
            $street = $_POST['street'];
            $city = $_POST['city'];
            $mobile = $_POST['mobile'];

            $formdata = array(
                'email'=> $email,
                'country'=> $country,
                'street'=> $street,
                'mobile'=> $mobile,
                'city' => $city
            );

            $data = [];
            // Push user data to array
            array_push($data, $formdata);
            //Encode the array back into a JSON string.
            $json = json_encode($data);

            //Save the file.
             if(file_put_contents($url, $json)) {
                 echo 'Data successfully saved';
                 $redirect = "http://".$_SERVER['HTTP_HOST'].'/contact';
                 header("Location: $redirect");
                 exit();
             } else {
                 echo "error";
             }
    }
}
?>

<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <i class="fa fa-envelope"></i> <?php echo $title; ?>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="email">Email address:</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?=$data[0]['email']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="street">Address:</label>
                                <input type="text" class="form-control" id="street" name="street" value="<?=$data[0]['street']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="city">City:</label>
                                <input type="text" class="form-control" id="city" name="city" value="<?=$data[0]['city']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="country">Country:</label>
                                <input type="text" class="form-control" id="country" name="country" value="<?=$data[0]['country']; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="mobile">Mobile:</label>
                                <input type="text" class="form-control" id="mobile" name="mobile" value="<?=$data[0]['mobile']; ?>" required>
                            </div>

                            <div class="mx-auto">
                                <button type="submit" class="btn btn-primary text-right">Submit</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>