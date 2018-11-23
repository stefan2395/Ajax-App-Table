<?php
//Include the database configuration file
include 'connection.php';

if(!empty($_GET["country_id"])){
    //Fetch all state data
    $query = $con->query("SELECT * FROM states WHERE country_id = ".$_GET['country_id']." AND status = 1 ORDER BY state_name ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //State option list
    if($rowCount > 0){
        echo '<option value="">Select state</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['state_id'].'">'.$row['state_name'].'</option>';
        }
    }else{
        echo '<option value="">State not available</option>';
    }
}elseif(!empty($_GET["state_id"])){
    //Fetch all city data
    $query = $con->query("SELECT * FROM cities WHERE state_id = ".$_GET['state_id']." AND status = 1 ORDER BY city_name ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //City option list
    if($rowCount > 0){
        echo '<option value="">Select city</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['city_id'].'">'.$row['city_name'].'</option>';
        }
    }else{
        echo '<option value="">City not available</option>';
    }
}
?>