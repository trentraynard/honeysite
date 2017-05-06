<?php
/* Set e-mail recipient */
$myemail  = "evelina.luque@jardin-honey.com";

/* Check all form inputs using check_input function */
$name = check_input($_POST['name'], "Enter your name");
$subject  = check_input($_POST['subject'], "Write a subject");
$email    = check_input($_POST['email']);
$comments = check_input($_POST['comments'], "Write your comments");

/* If e-mail is not valid show error message */
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  
    show_error("E-mail address not valid");
}


/* Let's prepare the message for the e-mail */
$message = "Jardin Honey contact form has been submitted by:

Name: $name \n
E-mail: $email \n
Comments: $comments

";

/* Send the message using mail() function */
mail($myemail, $subject, $message);

/* Redirect visitor to the thank you page */
header('Location: thanks.html');
exit();

/* Functions we used */
function check_input($data, $problem='')
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($problem && strlen($data) == 0)
    {
        show_error($problem);
    }
    return $data;
}

function show_error($myError)
{
?>
<!DOCTYPE HTML>
 <html>
  <head>
   <title>Contact Error</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- jQuery for Bootstrap's JavaScript plugins-->
<!-- Custom CSS files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!--Font Awesome CSS-->
<link rel="stylesheet" href="css/font-awesome.min.css">
<!-- Custom Script files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Jardin de Infantes Honey, Jardin Ecuador, Jardin Guayaquil, Expertos en Educacion Infantil, 
El mejor lugar para la educacion de sus hijos, Jardines en Guayaquil">
<meta name="author" content="Trent Raynard">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--Style fonts-->
<link href='//fonts.googleapis.com/css?family=Marvel:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto:400,300,500,700,900' rel='stylesheet' type='text/css'>
<!--Style fonts-->
<script src="js/jquery-1.11.0.min.js"></script>
</head>     
    <body>

    <p>Por favor llene el formulario correctamente</p><br />
    
    <?php echo $myError; ?>
    
    <a href="contact.html">Volver a pagina de Contactanos</a>
    </body>
    </html>
<?php
exit();
}
?>