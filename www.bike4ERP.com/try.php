<?php

$conn = new mysqli('localhost', 'root', '', 'bikes4erp') 
or die ('Cannot connect to db');

    $result = $conn->query("select schoolname from tblschool");

    echo "<html>";
    echo "<body>";
    echo "<select name='id'>";

    while ($row = $result->fetch_assoc()) {

                  unset($name);
                 
                  $name = $row['schoolname']; 
                  echo '<option value="select">'.$name.'</option>';

}

    echo "</select>";
    echo "</body>";
    echo "</html>";
?> 