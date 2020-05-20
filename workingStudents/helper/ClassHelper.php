<?php
namespace app\helper;

class ClassHelper
{
    static public function getColor($num)
    {
        if($num % 4 == 0) echo 'btnorange';
        if($num % 4 == 1) echo 'btnorange';
        if($num % 4 === 2) echo 'btnorange';
        if($num % 4 === 3) echo 'btnorange'; 
    }
}