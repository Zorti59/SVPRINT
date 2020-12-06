<?php

function isEmail($email) 
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
function isPhone($phone) 
{
    return preg_match("/^[0-9 ]*$/",$phone);
}
function test_input($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if(isset($_POST['contactForm'])) {

    $array = array("first_name" => "", "last_name" => "", "mail" => "", "phone" => "", "address" => "", "city" => "", "country" => "", "zip_code" => "", "isSuccess" => true, "send" => false);
    $emailTo = "libert.josic@gmail.com";
    $send = false;
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    { 
        $array["first_name"] = test_input($_POST["first_name"]);
        $array["last_name"] = test_input($_POST["last_name"]);
        $array["phone"] = test_input($_POST["phone"]);
        $array["mail"] = test_input($_POST["mail"]);
        $array["address"] = test_input($_POST["address"]);
        $array["city"] = test_input($_POST["city"]);
        $array["country"] = test_input($_POST["country"]);
        $array["zip_code"] = test_input($_POST["zip_code"]);

        //On teste sur les variables dont on a besoin existent (le minimum, RGPD friendly)
        if (empty($array["last_name"]))
        {
            $array["isSuccess"] = false; 
        } 
        else
        {
            $emailText .= "Name: {$array['last_name']}\n";
        }

        if(!isEmail($array["mail"])) 
        {
            $array["isSuccess"] = false; 
        } 
        else
        {
            $emailText .= "Email: {$array['mail']}\n";
        }

        if (!isPhone($array["phone"]))
        {
            $array["isSuccess"] = false; 
        }
        else
        {
            $emailText .= "Phone: {$array['phone']}\n";
        }
        
        if($array["isSuccess"]) 
        {
            $headers = "From: {$array['firstname']} {$array['name']} <{$array['email']}>\r\nReply-To: {$array['email']}";
            mail($emailTo, "Un message de votre site", $emailText, $headers);
            $array["send"] = true;
        }
        echo json_encode($array);
        
    }
}

if(isset($_POST['recruitForm'])) {

    $array = array("first_name" => "", "last_name" => "", "mail" => "", "phone" => "", "address" => "", "city" => "", "country" => "", "zip_code" => "", "isSuccess" => true, "send" => false);
    $emailTo = "libert.josic@gmail.com";
    $send = false;
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    { 
        $array["first_name"] = test_input($_POST["first_name"]);
        $array["last_name"] = test_input($_POST["last_name"]);
        $array["phone"] = test_input($_POST["phone"]);
        $array["mail"] = test_input($_POST["mail"]);
        $array["address"] = test_input($_POST["address"]);
        $array["city"] = test_input($_POST["city"]);
        $array["country"] = test_input($_POST["country"]);
        $array["zip_code"] = test_input($_POST["zip_code"]);

        //On teste sur les variables dont on a besoin existent (le minimum, RGPD friendly)
        if (empty($array["last_name"]))
        {
            $array["isSuccess"] = false; 
        } 
        else
        {
            $emailText .= "Name: {$array['last_name']}\n";
        }

        if(!isEmail($array["mail"])) 
        {
            $array["isSuccess"] = false; 
        } 
        else
        {
            $emailText .= "Email: {$array['mail']}\n";
        }

        if (!isPhone($array["phone"]))
        {
            $array["isSuccess"] = false; 
        }
        else
        {
            $emailText .= "Phone: {$array['phone']}\n";
        }
        
        if($array["isSuccess"]) 
        {
            $headers = "From: {$array['firstname']} {$array['name']} <{$array['email']}>\r\nReply-To: {$array['email']}";
            mail($emailTo, "Un message de votre site", $emailText, $headers);
            $array["send"] = true;
        }
        
        echo json_encode($array);
        
    }
}
 
?>
