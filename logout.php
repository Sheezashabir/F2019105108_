<?php
session_start();
//session_unset()  remove one key value pair
session_destroy(); //remove all key value Pairs

header('Location:index.php');