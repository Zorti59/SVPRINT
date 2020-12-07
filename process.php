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

$array = array("first_name" => "", "last_name" => "", "mail" => "", "message" => "", "isSuccess" => true, "send" => false);
$emailTo = "libert.josic@gmail.com";
$send = false;
$emailText = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{ 
    $array["first_name"] = test_input($_POST["first_name"]);
    $array["last_name"] = test_input($_POST["last_name"]);
    $array["mail"] = test_input($_POST["mail"]);
    $array["message"] = test_input($_POST["message"]);

    //On teste sur les variables dont on a besoin existent (le minimum, RGPD friendly)
    if (empty($array["first_name"]))
    {
        $array["isSuccess"] = false; 
    } 
    else
    {
        $emailText .= "Name: {$array['first_name']}\n";
    }

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
    
    if($array["isSuccess"]) 
    {
        $headers = "From: {$array['first_name']} {$array['last_name']} <{$array['mail']}>\r\nReply-To: {$array['mail']}";
        mail($emailTo, "Un message de votre site", $emailText, $headers);
        $array["send"] = true;
    }
    
    echo json_encode($array);
    
}
 
?>
