<?php
/**
 * @author Shoval Eliav <shoval123@hotmail.com>
 * @filename        dbClass.php
 * @description     This class to connection Database and methods on Database
 */
require_once "carClass.php";
require_once "rentClass.php";
class dbClass
{
    /**
     * *Attributes of dbClass
     * *---------------------
     * @param   [private]   $host       -       host setup
     * @param   [private]   $db         -       Database setup
     * @param   [private]   $charset    -       unicode setup
     * @param   [private]   $user       -       user setup
     * @param   [private]   $pass       -       password setup
     * @param   [private]   $opt        -       array setup with options
     */
    private $host;
    private $db;
    private $charset;
    private $user;
    private $pass;
    private $opt = array(
        PDO::ATTR_ERRMODE   =>PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC
    );
    public  $connection;

    /**
     * *Constructor of dbClass
     * *----------------------
     *
     * @param string $host
     * @param string $db
     * @param string $charset
     * @param string $user
     * @param string $pass
     */
    public function __construct(string $host="localhost", string $db="flex",
                                string $charset="utf8", string $user="root", string $pass="")
                    {
                        $this->host = $host;
                        $this->db = $db;
                        $this->charset = $charset;
                        $this->user = $user;
                        $this->pass = $pass;
                    }
    
    /*Connect to Database method */
    private function connect()
    {
        $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
        $this->connection = new PDO($dsn, $this->user, $this->pass, $this->opt);
    }

    /*Disconnect from Database method */
    public function disconnect()    {   $this->connection = null;   }

    /**
     * *function create_database() | public
     * This function are creating flex DB
     */
    public function create_database()
    {
        $this->connect();
        $this->connection->query("CREATE DATABASE flex ");
        $this->disconnect();
        
    }

    /**
     * *function create_car_table() | public
     * This function are creating car table in car DB
     * Column:  Car_Id                  INT(100)    PK
     * Column:  Car                     VARCHAR(22)
     * Column:  Car_Color               VARCHAR(22)
     * Column:  Year_of_manufacture     VARCHAR(22)
     */
    public function create_car_table()
    {
        $this->connect();
        $this->connection->query("CREATE TABLE car( 
                                Car_Id INT(100) UNSIGNED PRIMARY KEY,
                                Car VARCHAR(22) NOT NULL,
                                Car_Color VARCHAR(22) NOT NULL,
                                Year_of_manufacture VARCHAR(22) NOT NULL )");
        $this->disconnect();   
    }

    /**
     * *function create_rent_table() | public
     * This function are creating rent table in car DB
     * Column:  Rent_Id                INT(100)    PK
     * Column:  Rent_Name              VARCHAR(22)
     * Column:  Rent_Age               VARCHAR(22)
     */
    public function create_rent_table()
    {
        $this->connect();
        $this->connection->query("CREATE TABLE rent(  
                                Rent_Id INT(100) UNSIGNED PRIMARY KEY,
                                Rent_Name VARCHAR(22) NOT NULL,
                                Rent_Age VARCHAR(22) NOT NULL)");
        $this->disconnect(); 
    }

    /**
     * *function create_travel_table() | public
     * This function are creating travel table in car DB
     * Column:  Car_Id                  INT(100)    PK
     * Column:  Rent_Id                 INT(100)    PK
     * Column:  Travel_From             VARCHAR(22)
     * Column:  Travel_To               VARCHAR(22)
     * Column:  Travel_Total            VARCHAR(22)
     */
    public function create_travel_table()
    {
        $this->connect();
        $this->connection->query("CREATE TABLE travel( 
                                Car_Id INT(100) UNSIGNED,
                                Rent_Id INT(100) UNSIGNED,
                                Travel_Date DATE NOT NULL,
                                Travel_From VARCHAR(22) NOT NULL,
                                Travel_To VARCHAR(22) NOT NULL,
                                Travel_Total VARCHAR(22) NOT NULL)");
    }

    /**
    * *function insert_to_car_table() | public
    * This function are insert data to car table
    * Column:  Car_Id                  INT(100)    PK
    * Column:  Car                     VARCHAR(22)
    * Column:  Car_Color               VARCHAR(22)
    * Column:  Year_of_manufacture     VARCHAR(22)
    */
    public function insert_to_car_table()
    {
        $this->connect();
        $this->connection->exec("INSERT INTO car(Car_Id, Car, Car_Color, Year_of_manufacture)VALUES
                                                        ('1','ford focus','blue','1993'),
                                                        ('2','fiat','red','1993'),
                                                        ('3','golf','black','1998'),
                                                        ('4','fiat','red','1998'),
                                                        ('5','nissan','white','1999'),
                                                        ('6','fiat','red','1999'),
                                                        ('7','bmw','white','1999'),
                                                        ('8','nissan','white','2000'),
                                                        ('9','fiat','red','2000'),
                                                        ('10','bmw','white','2000'),
                                                        ('11','golf','black','2003'),
                                                        ('12','bmw','white','2003'),
                                                        ('13','golf','black','2008'),
                                                        ('14','ford focus','blue','2008'),
                                                        ('15','fiat','blue','2008'),
                                                        ('16','nissan','white','2018'),
                                                        ('17','fiat','blue','2018')");                                     
        $this->disconnect(); 
    }

    /**
     * *function insert_to_rent_table() | public
     * This function are insert data to rent table
     * Column:  Rent_Id                INT(100)    PK
     * Column:  Rent_Name              VARCHAR(22)
     * Column:  Rent_Age               VARCHAR(22)
     */
    public function insert_to_rent_table()
    {
        $this->connect();
        $this->connection->exec("INSERT INTO rent(Rent_Id, Rent_Name, Rent_Age)VALUES
                                                    ('1','igor','20'),
                                                    ('2','irena','37'),
                                                    ('3','irena','33'),
                                                    ('4','mor','27'),
                                                    ('5','moran','18'),
                                                    ('6','roi','51'),
                                                    ('7','shalom','43'),
                                                    ('8','shir','26'),
                                                    ('9','yotam','43')");
        $this->disconnect(); 
    }

    /**
     * *function insert_to_travel_table() | public
     * This function are insert data to travel table
     * Column:  Car_Id                  INT(100)    PK
     * Column:  Rent_Id                 INT(100)    PK
     * Column:  Travel_Date             DATE
     * Column:  Travel_From             VARCHAR(22)
     * Column:  Travel_To               VARCHAR(22)
     * Column:  Travel_Total            VARCHAR(22)
     */
    public function insert_to_travel_table()
    {
        $this->connect();
        $this->connection->exec("INSERT INTO travel(Car_Id, Rent_Id, Travel_Date, Travel_From,      Travel_To,      Travel_Total)VALUES
                                                        ('1', '9',   STR_TO_DATE('15/01/2018','%d/%m/%Y'),  'ramat yishai', 'migdal haemek',     '10'),
                                                        ('1', '9',   STR_TO_DATE('08/03/2018','%d/%m/%Y'),  'ramat yishai', 'migdal haemek',     '12'),
                                                        ('2','8',    STR_TO_DATE('12/12/2017','%d/%m/%Y'),  'raanana',      'herzlia',           '18'),
                                                        ('2', '7',   STR_TO_DATE('11/03/2018','%d/%m/%Y'),  'tel aviv',     'haifa',            '102'),
                                                        ('3', '6',   STR_TO_DATE('22/05/2018','%d/%m/%Y'),  'beer sheva',   'tel aviv',         '121'),
                                                        ('3', '6',   STR_TO_DATE('27/06/2017','%d/%m/%Y'),  'beer sheva',   'tel aviv',         '121'),
                                                        ('4', '8',   STR_TO_DATE('28/09/2017','%d/%m/%Y'),  'raanana',      'herzlia',           '18'),
                                                        ('4', '8',   STR_TO_DATE('07/07/2017','%d/%m/%Y'),  'raanana',      'herzlia',           '18'),
                                                        ('5', '5',   STR_TO_DATE('01/04/2018','%d/%m/%Y'),  'tel aviv',     'tel aviv',          '28'),
                                                        ('6', '1',   STR_TO_DATE('22/01/2018','%d/%m/%Y'),  'tel aviv',     'haifa',            '100'),
                                                        ('6', '7',   STR_TO_DATE('26/03/2018','%d/%m/%Y'),  'tel aviv',     'haifa',            '102'),
                                                        ('7', '1',   STR_TO_DATE('01/10/2017','%d/%m/%Y'),  'haifa',        'haifa',             '22'),
                                                        ('8', '5',   STR_TO_DATE('03/04/2018','%d/%m/%Y'),  'tel aviv',     'tel aviv',          '28'),
                                                        ('8', '5',   STR_TO_DATE('07/05/2017','%d/%m/%Y'),  'tel aviv',     'tel aviv',          '26'),
                                                        ('9', '8',   STR_TO_DATE('01/01/2018','%d/%m/%Y'),  'raanana',      'herzlia',           '18'),
                                                        ('9', '8',   STR_TO_DATE('13/04/2018','%d/%m/%Y'),  'raanana',      'herzlia',           '18'),
                                                        ('10','1',   STR_TO_DATE('12/01/2018','%d/%m/%Y'),  'haifa',        'haifa',             '22'),
                                                        ('11','6',   STR_TO_DATE('12/10/2017','%d/%m/%Y'),  'beer sheva',   'tel aviv',         '121'),
                                                        ('11','6',   STR_TO_DATE('16/08/2017','%d/%m/%Y'),  'beer sheva',   'tel aviv',         '121'),
                                                        ('12','1',   STR_TO_DATE('22/05/2018','%d/%m/%Y'),  'beer sheva',   'tel aviv',         '121'),
                                                        ('12','1',   STR_TO_DATE('01/07/2017','%d/%m/%Y'),  'haifa',        'haifa',             '22'),
                                                        ('13','6',   STR_TO_DATE('27/02/2018','%d/%m/%Y'),  'beer sheva',   'tel aviv',         '121'),
                                                        ('14','9',   STR_TO_DATE('12/02/2018','%d/%m/%Y'),  'ramat yishai', 'migdal haemek',     '12'),
                                                        ('15','2',   STR_TO_DATE('02/03/2018','%d/%m/%Y'),  'jerusalem', 'tel aviv',            '115'),
                                                        ('15','3',   STR_TO_DATE('26/08/2017','%d/%m/%Y'),  'jerusalem', 'tel aviv',             '56'),
                                                        ('16','5',   STR_TO_DATE('14/04/2018','%d/%m/%Y'),  'tel aviv', 'tel aviv',              '48'),
                                                        ('16','4',   STR_TO_DATE('15/04/2017','%d/%m/%Y'),  'tel aviv', 'tel aviv',              '26'),
                                                        ('17','2',   STR_TO_DATE('11/11/2017','%d/%m/%Y'),  'jerusalem', 'tel aviv',            '115'),
                                                        ('17','3',   STR_TO_DATE('31/05/2018','%d/%m/%Y'),  'jerusalem', 'tel aviv',             '56')");
        $this->disconnect(); 
    }
    /**
     * *query2 function |    public
     * *----------------------------
     * The three cars that have been rented must be presented as many times as possible in 2018.
     * The name of the car, its year of manufacture, 
     * and the number of times it has been rented in descending order should be presented.
     *
     * @return array
     */
    public function query2()
    {
        $this->connect();
        $array = array();
        $result = $this->connection->query("SELECT car.Car, car.Year_of_manufacture, rents_by_car.rent_num
                                            FROM(SELECT Car_Id,COUNT(*) AS rent_num
                                                    FROM `travel`
                                                    WHERE YEAR(travel.Travel_Date) = '2018'
                                                    GROUP BY Car_Id
                                                    ORDER BY rent_num DESC
                                                    LIMIT 3
                                                )rents_by_car
                                            LEFT JOIN car ON car.Car_Id = rents_by_car.Car_Id  ");

        
           echo "<table border='3' bgcolor='white'>";
                echo "<tr bgcolor='white'>";
                echo  
                    "<th>".'Car Name'."</th>
                    <th>".'Year of manufacture' ."</th>
                    <th>" .'Rent Number'."</th>";
              echo"</tr>";
           
                    while($row=$result->fetchObject('carClass')){
                        $array[] = $row;
          
                echo "<tr bgcolor='white' align='center'>";
                    echo    
                  
                        "<td>".$row->getCar_Name()."</td>
                        <td>".$row->getYear_Of_Manufacture()."</td>
                        <td>".$row->getRent_num()."</td>";
                echo "</tr>";  
        }
            echo "</table>"."<br>";
            $this->disconnect();
            return $array;
    }

    /**
     * *query3 function |    public
     * *----------------------------
     * The average age for renting a car should be presented by months of the year.
     * The name of the month and the average age should be displayed.
     *
     * @return array
     */
    public function query3()
    {
        $this->connect();
        $array = array();
        $result = $this->connection->query("SELECT Month_Name,AVG(Rent_Age)
                                            FROM(
                                                    SELECT MONTH(travel.Travel_Date) AS mon,MONTHNAME(travel.Travel_Date)
                                                    AS Month_Name,Rent_Id
                                                    FROM travel
                                                    ORDER BY mon
                                                ) rent_date
                                                    LEFT JOIN rent
                                                    ON rent.Rent_Id = rent_date.Rent_Id
                                                    GROUP BY Month_Name ");

        
            echo "<table border='2'>";
                echo "<tr bgcolor='white'>";
                    echo  
                        "<th>".'Month Name'."</th>
                        <th>" .'AVG(Rent_Age)'."</th>";
           
                echo"</tr>";
           
                    while($row=$result->fetch(PDO::FETCH_ASSOC))
                    {
                            $array[] = $row;
            
                        echo "<tr bgcolor='white' align='center'>";
                        echo    
                    
                            "<td>".$row['Month_Name']."</td>
                            <td>".$row['AVG(Rent_Age)']."</td>";
                        echo "</tr>";  
                    }
            echo "</table>"."<br>";
            $this->disconnect();
            return $array;
    }

/**
     * *query4 function |    public
     * *----------------------------
     * The travel distance must be presented by car. 
     * The name, color and distance of the vehicle should be displayed.
     *
     * @return array
     */
    public function query4()
    {
        $this->connect();
        $array = array();
        $result = $this->connection->query("SELECT Car, Car_Color, tot_distance
                                                FROM (
                                                        SELECT
                                                        Car_Id,
                                                        SUM(Travel_Total) AS tot_distance
                                                        FROM
                                                        travel
                                                        GROUP BY Car_Id
                                                    )car_dist LEFT JOIN car ON car.Car_Id = car_dist.Car_Id");

        
            echo "<table border='2'>";
                echo "<tr bgcolor='white'>";
                echo  
                    "<th>".'Car'."</th>
                    <th>".'Car Color' ."</th>
                    <th>" .'Total Distance '."</th>";
           
                echo"</tr>";
           
                    while($row=$result->fetchObject('carClass'))
                    {
                        $array[] = $row;
          
                        echo "<tr bgcolor='white' align='center'>";
                        echo    
                                "<td>".$row->getCar_Name()."</td>
                                <td>".$row->getCar_Color()."</td>
                                <td>".$row->getTot_distance()."</td>";
                        echo "</tr>";  
        }
            echo "</table>";
            $this->disconnect();
            return $array;
    }
    


} 


?>