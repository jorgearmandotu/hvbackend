<?php
session_start();
if(isset($_SESSION['user'])){ //empty()
session_destroy();
}
?>