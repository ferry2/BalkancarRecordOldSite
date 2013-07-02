<?php
if (isset($test)){
	echo "<script>alert('Information updated')</script>";
	echo "<script>navigate('other.php')</script>";
	exit();
}

?>
<form id="form1" name="form1" method="post" action="">
  <label>test
  <input type="submit" name="test" id="test" value="Submit" />
  </label>
</form>
