<?php
    $poloczenie = mysqli_connect('localhost', 'root', '', 'wedkarstwo');
    if (!mysqli_select_db($poloczenie, 'wedkarstwo')){
        mysqli_close($poloczenie);
        exit();
    }
    if (isset($_POST['wyslij'])){
        $lowisko = $_POST['lowisko'];
        $data = $_POST['data'];
        $sedzia = $_POST['sedzia'];
        $sql = "INSERT INTO zawody_wedkarskie VALUES(null, '0', '$lowisko', '$data', '$sedzia');";
        mysqli_query($poloczenie, $sql);
        mysqli_close($poloczenie);
    
    }
  
?>