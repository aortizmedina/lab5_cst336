
        <!--// $user = 'b7bb2f9ac871ba';-->
        <!--// $host = 'us-cdbr-iron-east-05.cleardb.net';-->
        <!--// $pass = 'e71f99e3';-->
        <!--// $databaseName='heroku_c8ba92f77e57095'-->
<!DOCTYPE html>
<html>
    <head>
        <title>SQL</title>
        <style>
            @import url("./styles.css");
        </style>
    </head>
    <body>
        <?php
$servername ="us-cdbr-iron-east-05.cleardb.net";
$username ="b7bb2f9ac871ba";
$password ="e71f99e3";
$dbname ="heroku_c8ba92f77e57095";
     
        //create connection
        $conn = new mysqli($servername , $username ,$password ,$dbname);
        
        if($conn->connect_error)
        {
        die("Connection failed".$conn->connect_error);
        }
    
    ?>
    <?php
        
    function displayDevices()
    {
    global $conn;
       
   
    $sql = "SELECT * FROM Device WHERE 1";
    $print = $conn->query($sql);
           
           
        echo'<table>';
        echo'
        <tr>
            <th>  ID  </th>
            <th>  Device Name  </th>
            <th>  Device Type  </th>
            <th>  Price  </th>
            <th>  Status  </th>
        </tr>
        ';
        if(!isset($_GET['submit']))
        {
        
        if($print->num_rows > 0) {
              
            while($row = $print->fetch_assoc()){
              
                echo "<div class='center'>";
                 echo 
                 '<tr><td>'.$row['id']
                 . '</td><td>' .
                 $row['deviceName']
                 . '</td><td>' .
                 $row['deviceType'] 
                 . '</td><td> ' . 
                 $row['price']
                 .'</td><td>'.
                 $row['status']
                 .'</td></tr>';               
                 echo "</div>" ;          
                             }
                        }

        echo'</table>';
            }
   
       if (isset($_GET['submit']))
       {
           
           
           if (!empty($_GET['deviceName']))
           {
               $name = $_GET['deviceName'];
               $sql .=" AND deviceName LIKE '$name'"; 
    
            }
            
           if (!empty($_GET['deviceType'])) {
                
                $type = $_GET['deviceType'];
               $sql .= " AND deviceType = '$type'"; 
               
               
           }
            if (isset($_GET['available'])) 
            {
                $sql .= " AND status = 'available'";
            }
            
            if(!isset($_GET['available']))
            {
                
                $sql.= " AND status = 'checked out'";
            }
            
            if (isset($_GET['name'])) 
            {
                 $sql .= " ORDER BY deviceName"; 
              
            }
            if (isset($_GET['price'])) 
            {
                 $sql .= " ORDER BY price";
            }
            $print = $conn->query($sql);
               
            if(isset($_GET['submit']))
            {
            
            if($print->num_rows > 0) {
                
                

                while($row = $print->fetch_assoc()){
                    
                    
                  
                    echo "<div class='center'>";
                 echo 
                 '<tr><td>'.$row['id']
                 . '</td><td>' .
                 $row['deviceName']
                 . '</td><td>' .
                 $row['deviceType'] 
                 . '</td><td> ' . 
                 $row['price']
                 .'</td><td>'.
                 $row['status']
                 .'</td></tr>';               
                 echo "</div>" ;          
                                 }
                            }
    
    
            }           
      
        echo "<br>";
        echo "<br>";
       
            }
        }       
           ?>
           <div class="main">
           <h1> Devices Library </h1>
           <br>
           <br>
           <br>
           <form>
               Device: <input type="text" name="deviceName" placeholder="Device Name"/>
               Type: 
               <select name="deviceType">
                   <option value="laptop"> Laptop</option>
                   <option value="computer"> Computer</option>
                   <option value="tablet"> Tablet</option>
                   <option value="drink"> Drink</option>
                   <option value="fitness tracker"> Fitness Tracker</option>
                   <option value="paper weight"> Paper Weight</option>
               </select>
               
               <input type="checkbox" name="available" value="available">
               <label for="available"> Available </label>
               
               <br>
               Order by:
               <input type="radio" name="name" id="orderByName" value="name" <?= $checkmark ?>/> 
                <label for="orderByName"> Name </label>
               <input type="radio" name="price" id="orderByPrice" value="price" <?= $checkmark1 ?>/> 
                <label for="orderByPrice"> Price </label>
               
               
               
               <input type="submit" value="Submit" name="submit" >
               
           </form>
           </div>
           
           
           <hr>
           
           <?=displayDevices()?>
           
    </body>
</html>