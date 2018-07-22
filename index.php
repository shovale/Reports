<?php
/**
 * @author Shoval Eliav <shoval123@hotmail.com>
 * @filename        index.php
 * This page are display the 3 reports in tables from excel data   
 */
require_once ("dbClass.php");

/*New object dbClass */
$db = new dbClass();

/**
 * *Function to create Database in phpMyAdmin
 * *-----------------------------------------
 */
//$db->create_database();

/**
 * *Function to create 3 tables in Database
 * *---------------------------------------
 * *car, rent and travel tables
 */
//$db->create_car_table();
//$db->create_rent_table();
//$db->create_travel_table();

/**
 * *Function to insert data into 3 tables in Database
 * *-------------------------------------------------
 * *car, rent and travel tables
 */
//$db->insert_to_car_table();
//$db->insert_to_rent_table();
//$db->insert_to_travel_table();
/**
 * *Begin of html page
 * *---------------------
 */
echo "<html>";

    /**
     * *Header include Bootstrap library for style 
     * *-----------------------------------------
     */
    echo "<header>";
        echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' />";  
        echo "<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'>";echo "</script>";  
    echo "</header>";

    /**
     * *Title of page
     * *-------------
     */
    echo "<title>";
        echo 'Flex Rent Cars';
    echo "</title>";

    /**
     * *Body include 3 division to display 3 queries
     * *------------------------------------------
     */
    echo "<body background='pic/home-page.jpg' style='width:auto'>";

        /**
         * *Nav bar for header page
         * *-----------------------
         */
        echo "<nav class='navbar navbar-inverse'>";
            echo"<div class='container-fluid'>";
                echo "<div class='navbar-header'>";
                    //echo "<img src='pic/logo.png' height='40'>"; echo "</img>";//
                echo "</div>";
            echo "</div>";
        echo "</nav>";
            
            /**
             * *Table for display 3 queries in same line
             * *---------------------------------------
             */
            echo "<table align='center'>";
                echo "<tr>";
                    echo "<td>";
                        echo "<div align='left'>";
                            echo "<h1 style='color:white' align='center'>";echo 'Ex2';echo "</h1>";
                            $array = $db->query2();
                        echo "</div>";
                    echo "</td>";
                    echo "<td>";
                        echo "<div align='left'>";
                            echo "<h1 style='color:white' align='center'>";echo 'Ex3';echo "</h1>";
                            $array = $db->query3();
                        echo "</div>";
                    echo "</td>";

                    echo "<td>";
                        echo "<div align='left'>";
                            echo "<h1 style='color:white' align='center'>";echo 'Ex4';echo "</h1>";
                            $array = $db->query4();
                        echo "</div>";
                    echo "</td>";
                echo "</tr>";
            echo "</table>";

    echo "</body>";
echo "</html>";
?>