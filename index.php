<?php
if (isset($_REQUEST['action'])) {
    $action = $_REQUEST['action'];
} else {
    $action = 'show';
}

include './view/' . $action . '.php';
