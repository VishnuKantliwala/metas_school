<?
include_once("connect.php");
$cn=new connect();
$cn->connectdb();

	
	$name="Name:".$_POST['name'];
	$phone="Phone Number :".$_POST['contact'];
	$email="Email:".$_POST['email'];
	$subject = $_POST['subject'];
	$msg="Message:".$_POST['message'];

	$verif_box = $_REQUEST["verif_box"];
	if(md5($verif_box).'a4xn' != $_COOKIE['tntcon'])
    {
        display_error('Invalid verification code!');
        exit();
	}
	
    $email=mysqli_escape_string($cn->getConnection(),$_POST['email']);
	
	$to = "info@icedinfotech.com";
	
	$from=$_POST['email'];
	$headers = "From: ".$from."\r\n"."X-Mailer: php";
					
	$body = $name."\n\n".$email."\n\n".$phone."\n\n".$msg;
	
	$domain=$_SERVER['HTTP_HOST'];

	if($domain!="localhost")
	{
		
		display_success('Message Sent!');
		mail($to, $subject, $body, $headers);
	
	}
	else{
		display_success('Message Sent!');

		// display_error('Message Not Sent!');
	}


function display_error($error)
{
    echo '<div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.$error.' </div>';
}
function display_success($message)
{
    echo '<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.$message.' </div>';
}
?>