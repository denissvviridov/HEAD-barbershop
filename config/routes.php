<?php


$routes = [
    //client
    'home' => 'home|index',
    'home/callback' => 'home|callback',
    'order/to/.*' =>'home|order',
    'contacts' => 'contacts|index',
    'about' => 'about|index',
    'error'=>'error|index',
    //admin
    '@admin'=>'admin|index',
    '@admin/login'=> 'admin|login',
    '@admin/dashboard'=>'admin|dashboard',
    '@admin/booking'=>'admin|booking',
    '@admin/callback'=>'admin|callback',
    '@admin/prof'=>'admin|prof',
    '@admin/prof/.*'=>'admin|delete',
    '@admin/exit'=>'admin|exit'
];