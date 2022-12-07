<?php

class bill
{
    public $bill_id;
    public $phone_number;
    public $user_name;
    public $money_amount;
function __construct($new_bill)
{
    $this->bill_id=$new_bill['bill_id'];
    $this->user_name=$new_bill['user_name'];
    $this->phone_number=$new_bill['phone_number'];
    $this->money_amount=$new_bill['money_amount'];
}
function new_bill()
{
    return $this->new_bill();
}
}