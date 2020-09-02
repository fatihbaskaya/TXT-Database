<?php
    $data = file_get_contents("database.txt");
    $rows = explode("\n", $data); 
    $rows = array_map("trim", $rows); 
    $rowCount = count($rows);
    
    function CountCol($data){
        $col = explode("|", $data);
        return count($col);
    }

    for ($i=0; $i < $rowCount; $i++) { 
        for ($j=0; $j < CountCol($rows[$i]) ; $j++) { 
            $column = explode("|", $rows[$i]);
            $point[$i]  = $column[0];
            $username[$i]  = $column[1];
            $email[$i]  = $column[2]; 
        }
    }
    /* Change the "10" value for how many people you want it show */
    for ($i=0; $i < 10; $i++) { 
        /* Ensures that the "$point" field ranks from highest to lowest */
        array_multisort($point, SORT_DESC, $username, $email);
        echo "Score: ".@$point[$i]."<br>";
        echo "Username: ".@$username[$i]."<br>";
        echo "Email: ".@$email[$i] ."<br><br>";
}
?>
