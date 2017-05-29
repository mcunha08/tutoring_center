<?php
namespace App;
class Utils
{
    public static function getStarImage($rating){

        if (empty($rating) || round($rating) == 0){
            return "/images/0_stars.svg";
        }

        if (round($rating) == 1){
            return "/images/0.5_stars.svg";
        }
        if (round($rating) == 2){
            return "/images/1_stars.svg";
        }
        if (round($rating) == 3){
            return "/images/1.5_stars.svg";
        }
        if (round($rating) == 4){
            return "/images/2_stars.svg";
        }
        if (round($rating) == 5){
            return "/images/2.5_stars.svg";
        }
        if (round($rating) == 6){
            return "/images/3_stars.svg";
        }
        if (round($rating) == 7){
            return "/images/3.5_stars.svg";
        }
        if (round($rating) == 8){
            return "/images/4_stars.svg";
        }
        if (round($rating) == 9){
            return "/images/4.5_stars.svg";
        }
        if (round($rating) == 10){
            return "/images/5_stars.svg";
        }
    }
}