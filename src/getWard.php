
<?php
include "config/config.php";

$district_id = 0;

if(isset($_POST['district'])){
   $district_id = mysqli_real_escape_string($conn,$_POST['district']); // district id
}

$ward_arr = array();

if($district_id > 0){
    $sql = "SELECT ward_id,ward FROM ward WHERE district_id=".$district_id;

    $result = mysqli_query($conn,$sql);
    
    while( $row = mysqli_fetch_array($result) ){
        $ward_id = $row['ward_id'];
        $ward_name = $row['ward'];
    
        $ward_arr[] = array("id" => $ward_id, "name" => $ward_name);
    } 
}

// encoding array to json format
echo json_encode($ward_arr);