<?php
include_once ($_SERVER['DOCUMENT_ROOT']. '/guest_book/config.php');


$position = $_GET['guestPosition'];







use App\GuestBook\GuestBook;

use App\Utility\Sanitizer;
use App\Utility\Validator;
use App\Utility\Utility;

$guests = [];
if(array_key_exists('guest_book_data', $_COOKIE)){
    $guests = unserialize($_COOKIE['guest_book_data']);
}

if(Utility::isPosted()){
    $sanitizedData = Sanitizer::sanitize($_POST);
    $validatedData = Validator::validate($sanitizedData);
    if(!$validatedData){
        header("location:guest_book_form.php");
    }else{
        $guests[$position] = $validatedData;
        $result = setcookie('guest_book_data', serialize($guests), time() + (86400 * 30), "/"); // 86400 = 1 day
        if($result){
            echo "Data has been saved successfully. <a href='guest_book_index.php'>Go to index.</a>";
        }else{
            echo "Data has not been saved";
        }
    }

}







