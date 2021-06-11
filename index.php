<?php 
session_start();
require_once 'base_connect.php';

if(!$connect) {
    header('Location: settings.php');
} else {
    header('Location: main.php');
}