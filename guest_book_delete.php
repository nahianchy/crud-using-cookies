<?php

$guestPosition=$_GET['guestPosition'];

$guest_book_data= unserialize($_COOKIE['guest_book_data']);


echo "<pre>";

print_r($guest_book_data);
echo "</pre>";


unset($guest_book_data[$guestPosition]);


echo "<pre>";

print_r($guest_book_data);
echo "</pre>";


$converted_string=serialize($guest_book_data);

$result=setcookie('guest_book_data',$converted_string,time()+ (86400 * 30));


if($result){
    header("location:guest_book_index.php");
}else{
    echo "data has not saved in cookie";
}


