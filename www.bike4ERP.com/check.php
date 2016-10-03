<?php
    if($_POST)
        echo $_POST['check'];

?>
<form name="frm" method="post">
<input type="radio" name="check" id="check" value="1"> 1 
<input type="radio" name="check" id="check" value="2"> 2
<input type="radio" name="check" id="check" value="3"> 3
<input type="submit" name="Submit" />
</form>