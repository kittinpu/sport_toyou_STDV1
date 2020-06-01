<?php

if(!isset($_SESSION['is_member'])){
    header("Location: frm_login.php");
}

