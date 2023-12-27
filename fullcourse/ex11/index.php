<?php 
    $paymentsStatus = ['pending', 'paid', ''];
    foreach ($paymentsStatus as $paymentStatus){
        switch ($paymentStatus){
            case 'paid':
                echo 'Paid <br>';
                break;
            case 'declined';
                echo 'Payment Declined <br>';
                break;
            case 'pending';
                echo 'Pending Payment <br>';
                break;
            default:
                echo 'Unknown Payment Status<br>';
                break;
            }
    }

    


?>