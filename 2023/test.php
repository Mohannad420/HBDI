<!-- 



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

</head>
<body>



            <table class="  table table-dark table-striped   ">
                <thead class="d-stcky top-0 ">
                    <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Edit || Delete</th>
    
                    </tr>
                </thead>
                <tbody>

                <?php
require 'conn.php';

if(isset($_GET['search'])){

$search = $conn->prepare("SELECT * FROM users WHERE Name LIKE :value ");
$search_value = "%".$_GET['text']."%";

$search->bindParam("value",$search_value);
$search->execute();

    foreach($search as $val){
        echo '
        <tr>
        <th>'.$val['ID'].'</td>
        <td>'.$val['Name'].'</td>
        <td>'.$val['Email'].'</td>
        <td >

            <a href="index.php?id='. $val['ID'].'" type="button" class="btn btn-sm btn-primary"  >
            Edit
            </a>

            <div class="dropdown dropend d-inline">
                <button type="button" class="btn btn-sm btn-danger dropdown-toggle" data-bs-toggle="dropdown">
                    Delete
                </button>
                <ul class="dropdown-menu p-0 m-0 w-25 ">
                <li class=""><a href="index.php?id='. $val['ID'].'&del=1" class=" text-center dropdown-item btn btn-sm btn-Warning " >Confirm Deletion</a></li>

                </ul>
            </div>
        
        </td>
        </tr>
        ';
        
    }

}

?>

</tbody>
            
</body>
</html> -->