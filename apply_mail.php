<?
session_start();
include_once("connect.php");
include_once("./boss/image_lib_rname.php");

$cn=new connect(); 
$cn->connectdb();
    // print_r($_POST);
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $c_job = $_POST['c_job'];
    // $file = $_POST['file'];
    $cast = $_POST['cast'];
    $verif_box = $_REQUEST["verif_box"];

    if ( $_FILES["file"]['type'] != "application/pdf") 
    {
        display_error("Please select PDF file");
        exit();
    }
    
    if(md5($verif_box).'a4xn' != $_COOKIE['tntcon'])
    {
        display_error('Invalid verification code!');
        exit();
    }

    $to = "info@metasofsda.com";

    $pdf_file = createPDF('file', "download_pdf/");

    $pdf_file_link = $_SERVER['HTTP_HOST'].'download_pdf/'.$pdf_file;

    $subject = "School : HR Department Application from ".$first_name;

    $html = "<table>";
    $html.= "<tr><td>Name : </td><td>".$first_name." ".$middle_name." ". $last_name ."</td></tr>";
    $html.= "<tr><td>Email : </td><td>".$email."</td></tr>";
    $html.= "<tr><td>Current Job : </td><td>".$c_job."</td></tr></table>";
    $html.= "<tr><td>Cast : </td><td>".$cast."</td></tr></table>";
    $html.= "<tr><td>file : </td><td>".$pdf_file_link."</td></tr></table>";


    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: <info@metascollege.com>' . "\r\n";

    $domain=$_SERVER['HTTP_HOST'];

    if($domain!="localhost")
    {
        display_success('Message Sent!');
        mail($to,$subject,$html,$headers);
    }
    else
    {
        // display_success('Message Sent!');
        display_error("Message Not Sent!");
    }

 
function display_error($error)
{
    echo '<div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.$error.' </div>';
}
function display_success($message)
{
    echo '<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.$message.' </div>';
}
// echo "Account successfully updated";		
?>