<?php
include "connection.php";     

if(isset($_GET['del']) && !empty($_GET['del'])) {

$id_to_delete = $_GET['del'];

$delete_query = "DELETE FROM `TOVAR` WHERE `id` = $id_to_delete";

$delete_result = mysqli_query($connect, $delete_query);

if ($delete_result == TRUE)
{
echo("Udaleno!!!");
}
else
{

echo "not work";

}

}
                                

?>