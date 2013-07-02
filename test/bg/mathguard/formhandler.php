<?


/* first we need to require our MathGuard class */
require ("ClassMathGuard.php");
/* this condition checks the user input. Don't change the condition, just the body within the curly braces */
if (MathGuard :: checkResult($mathguard_answer, $mathguard_code)) {
	echo ("Great !"); //insert your code that will be executed when user enters the correct answer
} else {
	//echo ("Bad answer, go back to school !"); //insert your code which tells the user he is spamming your website
	die();
}
?>
<br/>
<br/>
You entered:
title: <? echo($_POST['title'])?>; <br/>
description: <? echo($_POST['description'])?> <br/>
keywords: <? echo($_POST['keywords'])?> <br/>
url: <? echo($_POST['url'])?> <br/>
email: <? echo($_POST['email'])?> <br/>

