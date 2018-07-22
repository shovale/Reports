<?php
/**
 * @author Shoval Eliav <shoval123@hotmail.com>
 * @filename        rentClass.php
 * @description     This class for Rent
 */
class rentClass
{
    /**
     * *Attributes of Rent Class
     * *---------------------
     * @param   [protected]   $Rent_id      -       Rent ID
     * @param   [protected]   $Rent_Name    -       Rent's name
     * @param   [protected]   $Rent_Age     -       Rent's color
     */
    protected   $Rent_Id;
    protected   $Rent_Name;
    protected   $Rent_Age;

    /**
     * *Getters method of Rent class
     * *No setters because there is no input!!
     * *----------------------------------
     */
    public function getRent_Id()                       {   return $this->Rent_Id;   }

    public function getRent_Name()                     {   return $this->Rent_Name;   }

    public function getRent_Age()                      {   return $this->Rent_Age;   }

    public function getMonth_Name()                      {   return $this->Month_Name;   }
}
?>