<?php
include("lib_db.php");
include("checklogin.php");
clearLoggedUser();
header("Location:index.php");