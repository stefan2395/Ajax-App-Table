<html>
<?php require_once 'connection.php'; ?>
<?php include 'header.php'; ?> 

<body>
<div class="content-table">
    <div>
        <a href="index.php">Home</a>
    </div>
    <div class="show-table-container">

        <div class="details-buttons-container">
            <div class="title-details">
              <h3>Details</h3>
            </div>
            <div id="edit-js" class='edit-img save-delete'></div>
        </div>

        <table class="show-table">

            <tbody>
                 <?php

                $id = $_GET['ID'];
                $sql = "SELECT * FROM person where ID in ($id)";
            
                $result = mysqli_query($con, $sql);

                
                    while($row = mysqli_fetch_assoc($result)) {


                        echo "
                            <tr>
                                <td style='display:none;'>
                                <div id='edit'>
                                    <a href='edit.php?ID=".$row['ID']."'>Edit</a>
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>".$row['NAME']."</td>
                            </tr>

                            <tr>
                                <th>Pzn</th>
                                <td>".$row['PZN']."</td>
                            </tr>

                            <tr>
                                <th>Url</th>
                                <td>".$row['URL']."</td>
                            </tr>";

                    }
               
                ?>
            </tbody>
        </table>
    </div>
</div>
 
</body>
</html>

<script>
    var edit = document.getElementById("edit");
    document.getElementById("edit-js").innerHTML = edit.innerHTML;
</script>