<?php
$connection = mysqli_connect('127.0.0.1','root','root');
mysqli_select_db($connection, 'audit_13');
$query = mysqli_query($connection, 'select * from hd_district where id='.$_GET['id']);
$row = mysqli_fetch_assoc($query);
print_r($row);