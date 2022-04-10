<?php
session_start();

$link = mysqli_connect(
  'localhost',
  'root',
  'root',
  'minculturas_db'
) or die(mysqli_erro($mysqli));
?>