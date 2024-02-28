<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="ajaxcrud";
	
$con = mysqli_connect($servername, $username, $password,$dbname);

switch ($_POST['type']) {

case 'up':

// $fullname = $_POST['fullname'];

 $sql = "SELECT * FROM data ORDER BY data.fullname ASC ";

 $result = mysqli_query($con, $sql);

 if (!isset ($_GET['page']) ) {  
    $page = 1;  
} else {  
    $page = $_GET['page'];  
} 

$items = 5;  
$offset = ($page-1) * $items;

 $sql .= "LIMIT " . $offset . ',' . $items;

$result = mysqli_query($con, $sql); 

 if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
?>	
    <tr>
        <td><?php echo $row['fullname'];?></td>
        <td><?php echo $row['email'];?></td>
        <td><?php echo $row['gender'];?></td>
        <td><?php echo $row['animal'];?></td>
        <td><?php echo $row['hobbies'];?></td>
        <td>
            <button class="btn btn-info" id="edit" data-id="<?php echo $row['id'];?>">Edit</button>
            <button class="btn btn-danger" id="delete" data-id="<?php echo $row['id'];?>" onclick="return confirm('Are you sure that you want to delete?')">Delete</button>
        </td>
    </tr>
<?php	
}
}
}
// SELECT * FROM `data` ORDER BY `data`.`fullname` DESC 

switch ($_POST['type']) {

case 'down':

    $sql = "SELECT * FROM data ORDER BY data.fullname DESC ";

 $result = mysqli_query($con, $sql);

 if (!isset ($_GET['page']) ) {  
    $page = 1;  
} else {  
    $page = $_GET['page'];  
} 

$items = 5;  
$offset = ($page-1) * $items;

 $sql .= "LIMIT " . $offset . ',' . $items;

$result = mysqli_query($con, $sql); 

 if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
?>	
    <tr>
        <td><?php echo $row['fullname'];?></td>
        <td><?php echo $row['email'];?></td>
        <td><?php echo $row['gender'];?></td>
        <td><?php echo $row['animal'];?></td>
        <td><?php echo $row['hobbies'];?></td>
        <td>
            <button class="btn btn-info" id="edit" data-id="<?php echo $row['id'];?>">Edit</button>
            <button class="btn btn-danger" id="delete" data-id="<?php echo $row['id'];?>" onclick="return confirm('Are you sure that you want to delete?')">Delete</button>
        </td>
    </tr>
<?php	
}
}
}

switch ($_POST['type']) {

    case 'upside':
        
        $sql = "SELECT * FROM data ORDER BY data.email ASC ";
    
     $result = mysqli_query($con, $sql);
     if (!isset ($_GET['page']) ) {  
        $page = 1;  
    } else {  
        $page = $_GET['page'];  
    } 
    
    $items = 5;  
    $offset = ($page-1) * $items;
    
     $sql .= "LIMIT " . $offset . ',' . $items;
    
    $result = mysqli_query($con, $sql); 
    
     if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
    ?>	
        <tr>
            <td><?php echo $row['fullname'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><?php echo $row['gender'];?></td>
            <td><?php echo $row['animal'];?></td>
            <td><?php echo $row['hobbies'];?></td>
            <td>
                <button class="btn btn-info" id="edit" data-id="<?php echo $row['id'];?>">Edit</button>
                <button class="btn btn-danger" id="delete" data-id="<?php echo $row['id'];?>" onclick="return confirm('Are you sure that you want to delete?')">Delete</button>
            </td>
        </tr>
    <?php	
    }
    }
    }

    switch ($_POST['type']) {

        case 'downside':
            
            $sql = "SELECT * FROM data ORDER BY data.email DESC ";
        
         $result = mysqli_query($con, $sql);

         if (!isset ($_GET['page']) ) {  
            $page = 1;  
        } else {  
            $page = $_GET['page'];  
        } 
        
        $items = 5;  
        $offset = ($page-1) * $items;
        
         $sql .= "LIMIT " . $offset . ',' . $items;
        
        $result = mysqli_query($con, $sql); 
        
         if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
        ?>	
            <tr>
                <td><?php echo $row['fullname'];?></td>
                <td><?php echo $row['email'];?></td>
                <td><?php echo $row['gender'];?></td>
                <td><?php echo $row['animal'];?></td>
                <td><?php echo $row['hobbies'];?></td>
                <td>
                    <button class="btn btn-info" id="edit" data-id="<?php echo $row['id'];?>">Edit</button>
                    <button class="btn btn-danger" id="delete" data-id="<?php echo $row['id'];?>" onclick="return confirm('Are you sure that you want to delete?')">Delete</button>
                </td>
            </tr>
        <?php	
        }
        }
        }
?>