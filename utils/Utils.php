<?php

namespace Utils;

class Utils{

    public function moneyFormat($value){
        return "R$ ".number_format($value, 2, ',', '.');
    }
    
}