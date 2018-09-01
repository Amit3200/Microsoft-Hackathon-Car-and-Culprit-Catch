<?php
$db = new Mysqli;
$db ->connect('localhost','root','amit','rajasthan',3306);
if(!$db)
{
    echo "Error Occured";
}
?>