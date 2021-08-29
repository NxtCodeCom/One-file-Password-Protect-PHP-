<?php 

/**
 *********************************************************************************
 *
 *    @package      EASY FILE PROTECTION
 *    @version      1.0.0
 *    @owner        https://github.com/NxtCodeCom
 **********************************************************************************/


session_start();
ob_start();

/**
******************************************************	  
*               CONFIGURATION SETTINGS 
*******************************************************/
class config
{
/**
*************************************************** 
*     Configuration Information 
***************************************************/

     /**    TIMEOUT  - Minutes * */ 
	 const TIMEOUT_MINUTES = 43200;
     /**   Time after which user can re-attempt to login - Minutes * */
     const ATTEMPT_COOKIE = 5; 
     /**   Number Of Login Attempts allowed * */
     const ATTEMPTS = 5; 
     /**   USERNAME  * */
	 const USERNAME ="YOURUSERNAME";
	 /**    PASSWORD  * */
	 const PASSWORD = "YOURPASSWORD";
	 /**    LOGIN FORM TITLE  * */
	 const LOGIN_NAME = "TITLE"; 
     
}


/**
******************************************************	  
*           LOGIN CLASS INSTANCE TO LOGIN/LOGOUT
*******************************************************/
	
	$MyLogin = new Quick_Secure();


/**
*******************************************************	  
*             USER CLICKS LOGOUT
*******************************************************/
	if(isset($_GET['logout'])) 
	{
		$MyLogin->Logout();
			 
	}
			 		
/**
***********************************************************************  
*           IF SESSION IS NOT PRESENT:DISPLAY LOGIN FORM
***********************************************************************/

	if(!$_SESSION['username'])
 	{			
		$MyLogin->Login();
		
	}


/**
*************************************************************************************
*  Quick Secure class:provides with all the basic functionality to login and display
**************************************************************************************/

class Quick_Secure 
  extends config
  {
	
	/**
	  ************************************************************
	  *  Show Login Form and Error Information 
	**************************************************************/  
	public function showLoginPasswordProtect($error_msg, $attempt) 
	{     ?>
		<html>
		<head>
           <title>Junglee Admin</title>
		  <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
		  <META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
        <link href="http://spelloveryou.com/images/favicon.ico" rel="icon" type="image/x-icon" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>

<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="mobile-web-app-capable" content="yes">
<link rel="shortcut icon" sizes="196x196" href="http://dev-vinay.teamcricket.com/Apps/admin/196.png">
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"> 
<? if(strstr($_SERVER['HTTP_USER_AGENT'],'iPhone') || strstr($_SERVER['HTTP_USER_AGENT'],'iPad'))
 {?>

 


<link rel="shortcut icon" sizes="16x16" href="http://dev-vinay.teamcricket.com/Apps/admin/16.png">
<link rel='apple-touch-icon' href='http://dev-vinay.teamcricket.com/Apps/admin/16.png'/>
<meta name="apple-mobile-web-app-title" content="Junglee Games">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">


<link rel="apple-touch-icon-precomposed" href="http://dev-vinay.teamcricket.com/Apps/admin/152.png">


	<meta name="apple-mobile-web-app-status-bar-style" content="black">


    <script type="text/javascript">

var addToHomeConfig = {
	message: 'Click %icon to add this App to your <strong>%device</strong> home screen.'
};

</script>

	<link rel="stylesheet" href="http://dev-vinay.teamcricket.com/Apps/admin/addtohome.css">
	<script type="application/javascript" src="http://dev-vinay.teamcricket.com/Apps/admin/addtohome.js" charset="utf-8"></script>
    
	<? } ?>

        <script>
             jQuery(document).ready(function($){
         $("#login").click(
     function()
     {
        var $continue = true;
     
          if($("#soy_password").attr("value") == "")
        {
          $("#soy_password").addClass("alert").delay(3000).queue(function(next){$(this).removeClass("alert"); next();});
          $continue = false;
        } 
        if ($continue == false){return false; }
     } 
     );
     $('#error').fadeOut(4000, function() {
    // Animation complete.
  });
       });
        </script>
        
		  <style type="text/css">
			<!--
					/*  Optimized by devzigmo.com */*{outline:none}body{font:62.5% \"Lucida Grande\",Arial,sans-serif;background-color:#f6f6f6;color:#777}h1,h2,h3,h4,h5{color:#222}a{text-decoration:none;color:#08c}a:hover{text-decoration:none}h1{font:30px Arial,Helvetica,sans-serif;letter-spacing:-1px;padding:30px 0 0 0;margin:0}h2{font:15px Arial,Helvetica,sans-serif;padding:0 0 3px 0;margin-bottom:0}.list{margin:0 auto;width:380px;padding:10px;background-color:#fff}.exists{background:#FBE3E4 url(assets/cross.gif) no-repeat 98% center;border-color:#FBC2C4;color:#8a1f11}.avail{background:#D6FFD8 url(assets/success.gif) no-repeat 98% center;border-color:#A0D997;color:#436213}#main,#header,#footer{margin:0 auto;width:540px;margin-bottom:10px;overflow:hidden}#main{padding:15px 37px;width:510px;box-shadow:0 0 10px #CBCBCB;border:1px solid #cbcbcb;background:#fff}label{display:block;font-weight:bold;color:#888;font:10px Arial,Helvetica,sans-serif;text-transform:uppercase;margin:12px 0 4px}input,textarea,select{padding:7px;border:1px solid #eee;font:16px Arial,Helvetica,sans-serif;width:100%;color:#999}input[type=submit],input.submit{width:auto;background:#3C4954;border:1px solid #3C4954;color:#fff;font-family:Verdana;font-size:14px;margin-top:15px;cursor:pointer;width:auto;padding:5px}input[type=submit]:hover,input[type=submit]:focus,input.submit:hover,input.submit:focus{background:#3C4954;color:#fff}.alert {
    
    border: 1px solid red;
  }

							</style>
		</head>
		<body>
		
		
		  
		<div id="main" style=" background-color: #3C4954; color: #FFFFFF;font-family: Verdana; font-size: 14px;
      margin: 10% auto 0 !important;">
        <?=$website_name = parent::LOGIN_NAME;?>
        </div>
        <? $ATTEMPTS =	parent::ATTEMPTS ; ?>	  
        <? if($attempt <= $ATTEMPTS && !$_COOKIE["attempt"]) {?>
		<div id="main" style="margin: 10px auto !important;">
        <? if($error_msg) { $error_msg =  $error_msg."This is your attempt :".$attempt; }?>
		<form method="POST" action=""> 
		<font id="error" color="red"><? echo $error_msg;?></font><br />
		
		<label>Password</label><input type="password" name="soy_password" id="soy_password" size="20" /> 
		<br />
        <input type="hidden" name="attempt" value="<?=$attempt?>" />
		<input type="submit" id="login" value="Submit" name="login" /> 
		</form> 
		</div>
        <? } else {  $ATTEMPT_COOKIE =	parent::ATTEMPT_COOKIE ;
        $attempt_cookie_time = time() + $ATTEMPT_COOKIE * 60;
        setcookie("attempt", "shku688hb65", $attempt_cookie_time); ?>
        <div id="main" style="margin: 10px auto !important;padding: 49px 37px !important;font-size: 13px;">
        Too many login attempts, please try again in <?=$ATTEMPT_COOKIE?> minutes.
        </div>
        <? }?>
	
		</body>
		</html>
		
		<?php
		  // stop at this point
		  die();
   }
  
	/**
	*******************************************************
	* Logout:logout and destoy all sessions and cookies 
	*******************************************************/

	public function Logout() 
	{
	      $logoutURL = $_SERVER[HTTP_REFERER];
		  session_unset();
	      session_destroy();
		  setcookie("secure", '', $timeout, '/'); // clear password;
	      $ref = $_SERVER['HTTP_REFERER'];
		  header('Location: ' . $ref);
		  exit();
		
	}
  	
	/**
	 ***********************************************************
     *	 Authenticate credentials,Logout on Session Expiry
	 **********************************************************/
 
  	 public function Login()
  	 {
  	 	  
		 $TIMEOUT_MINUTES =	parent::TIMEOUT_MINUTES ;
		   
		 /** timeout in seconds */
		$timeout = ($TIMEOUT_MINUTES == 0 ? 0 : time() + $TIMEOUT_MINUTES * 60);
        
		
        /** user provided password */ 
		if (isset($_POST['soy_password'])) 
		{
		  $username = trim($_POST['soy_login']);/** user provided username */
		  $pass = trim($_POST['soy_password']);/** user provided password */
		  $attempt = $_POST[attempt] + 1;
          
		  if(( parent::PASSWORD != $pass))
		  {
  		    /** If username password does not match the default credentials  */
		    $this->showLoginPasswordProtect("Incorrect password.", $attempt);
		
		  }
		  else
	      {
     		/** set cookie if password was validated  */
		    setcookie("secure", md5($pass), $timeout, '/');
		    
		    $_SESSION['username'] = $pass;
	        $_SESSION['start'] = time();/** to register the start time of the session  */
		  
		    unset($_POST['soy_login']);
		    unset($_POST['soy_password']);
		    unset($_POST['Submit']);
		  }
		
		}
		
		else 
		{
			/** For the first time login form display : check if secure cookie is set */
			if (!isset($_COOKIE['secure'])) 
			{
			    $this->showLoginPasswordProtect("","");
	        }
			/** check if cookie is good */ 
			$found = false;
		
		    $lp = parent::PASSWORD;
		    
		    if ($_COOKIE['secure'] == md5($lp)) 
			{
		      $found = true;
		      /** logout on timeout */
		      if (parent::TIMEOUT_MINUTES)
	          {
	           	setcookie("secure", md5($lp), $timeout, '/');
		      }
		    
		    }
		    /** if cookie is not present */ 
			if (!$found)
		    {
			   $this->showLoginPasswordProtect("","");
	        }
		
		}	
  	 }
  }
  


?>
