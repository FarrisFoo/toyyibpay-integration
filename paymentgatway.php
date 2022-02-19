<?php

 
  $some_data = array(
    'userSecretKey'=>'pmk5k4pu-dbpu-8u62-gghu-f3q98hbhomo1',
    'categoryCode'=>'hi5706wi',
    'billName'=>'Kuih Lapis',
    'billDescription'=>'Kuih Lapis Payment',
    'billPriceSetting'=>0,
    'billPayorInfo'=>1,
    'billAmount'=>100,
    'billReturnUrl'=>'http://bizapp.my',
    'billCallbackUrl'=>'http://bizapp.my/paystatus',
    'billExternalReferenceNo' => 'AFR341DFI',
    'billTo'=>'',
    'billEmail'=>'jd@gmail.com',
    'billPhone'=>'0194342411',
    'billSplitPayment'=>0,
    'billSplitPaymentArgs'=>'',
    'billPaymentChannel'=>'0',
    'billContentEmail'=>'Thank you for purchasing our product!',
    'billChargeToCustomer'=>1
  );  

  $curl = curl_init();
  curl_setopt($curl, CURLOPT_POST, 1);
  curl_setopt($curl, CURLOPT_URL, 'https://toyyibpay.com/index.php/api/createBill');  
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $some_data);

  $result = curl_exec($curl);
  $info = curl_getinfo($curl);  
  curl_close($curl);
  $obj = json_decode($result, true);
  
  print_r($result);
  exit;
  $post_data['BillCode'] = $result[0]['BillCode'];
  $post_data['paymentURL'] = 'https://toyyibpay.com/' . $result[0]['BillCode'];

  header('Location :' . $post_data['paymentURL']);
  ?>
