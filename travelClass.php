<?php
/**
 * @author Shoval Eliav <shoval123@hotmail.com>
 * @filename        travelClass.php
 * @description     This class for Travel car
 */
class rentClass
{
    /**
     * *Attributes of Travel Class
     * *---------------------
     * @param   [protected]   $From      -       From Destination
     * @param   [protected]   $To        -       To Destination
     * @param   [protected]   $Total     -       Total drive
     */
    
    protected   $From;
    protected   $To;
    protected   $Total;

    /**
     * *Getters method of Travel class
     * *No setters because there is no input!!
     * *----------------------------------
     */
    public function getFrom()                   {   return $this->From;   }

    public function getTo()                     {   return $this->To;     }

    public function getTotal()                  {   return $this->Total;  }
}

?>