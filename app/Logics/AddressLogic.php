<?php
namespace App\Logics;


class AddressLogic {
    public function postnumFormat($postnum) {
        $zipcode = $this->postnum;
        $zip1 = substr($zipcode, 0, 3);
        $zip2 = substr($zipcode, 3);
        $zipcode = $zip1. "-". $zip2;
        return $zipcode;
    }
}