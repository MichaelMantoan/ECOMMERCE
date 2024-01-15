<?php

require '../models/Classes.php';

session_start();

$user = $_SESSION['current_user'];
$product_id = $_POST['product_id'];

$carrello = Cart::Find($user->GetID());

$carrello->removeProduct($product_id);

header('Location: ../views/carts/index.php');