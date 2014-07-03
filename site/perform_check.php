<?php   
session_start();

/**
 * Validate data
 * @params variable - the data for validation
 * @params type - the type of validation 
 */
function validate_data( $variable, $type )
{
    switch( $type ) {
        case "name":
            if( preg_match("/^[a-zA-Z -.0-9]*$/", $variable) ) {
                //Name OK
                return 1;
            }
            break;
    	case "email":
            if( preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $variable) && strlen($variable) <= 128 ) {
            	// E-mail OK
            	return 1;
            }
            break;		
		default:
    	    return 0;
    	    break;	
	}

}


$userval = strtolower(trim($_POST['captchavalue']));
$thecapt = strtolower($_SESSION['captcha']);
/*$name = validate_data(trim($_POST['name']), 'name');
$email = validate_data(trim($_POST['email']), 'email');

$error = array();*/


/* Contact Details 
if($name !== 1) {
    $error[] = 'Invalid Name';
}

if($email !== 1) {
    $error[] = 'Invalid email';
}*/

if( $userval == $thecapt ) { //&& count($error) == 0 
    echo "true"; 
} else { 
    echo "false".' userval='.$userval. ' thecapt='. $thecapt;
}
?>