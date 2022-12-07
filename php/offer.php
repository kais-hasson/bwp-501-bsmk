<?php

class offer
{
public $offer_id;
public $offer_name;
public $message;
public $minutes;
public $internet;
public $money_value;
public $offer_code;
function __construct($new_offer)
{
    $this->offer_id=$new_offer['id'];
    $this->offer_name=$new_offer['offer_name'];
    $this->message=$new_offer['message'];
    $this->minutes=$new_offer['minutes'];
    $this->internet=$new_offer['internet'];
    $this->money_value=$new_offer['money_value'];
    $this->offer_code=$new_offer['offer_code'];

}
function new_offer(){
    return $this->new_offer();
}
}