<?php
/**
 * @author Shoval Eliav <shoval123@hotmail.com>
 * @filename        carClass.php
 * @description     This class for cars
 */
require_once ("dbClass.php");
class carClass
{
    /**
     * *Attributes of carClass
     * *---------------------
     * @param   [protected]   $Car_Id               -       Car ID
     * @param   [protected]   $Car                  -       Car's name
     * @param   [protected]   $Car_Color            -       Car's color
     * @param   [protected]   $Year_of_manufacture  -       Car's year
     * @param   [protected]   $rent_num             -       Amount of rent
     */
    protected   $Car_Id;
    protected   $Car;
    protected   $Car_Color;
    protected   $Year_of_manufacture;

    /**
     * *Getters method of Car class
     * *No setters because there is no input!!
     * *----------------------------------
     */

    public function getCar_Id()              {  return $this->Car_Id;   }

    public function getCar_Name()            {   return $this->Car;   }

    public function getCar_Color()           {   return $this->Car_Color;   }

    public function getYear_Of_Manufacture() {   return $this->Year_of_manufacture;    }

    public function getTot_distance()           {   return $this->tot_distance;   }

    public function getRent_num()           {   return $this->rent_num;   }
}




?>