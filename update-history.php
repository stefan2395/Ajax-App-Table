<html>
<?php require_once 'connection.php'; ?>
<?php include 'header.php'; ?> 

<body>
    <div class="update-history-content">
        <div>
            <h3>Add update</h3>
        </div>
        
        <label for="">Note</label>
        <input type="text"> 
    </div>

    <table border="1" cellspacing="0" cellpadding="0" class="sortable table pagination">
        <thead>
            <tr>
                <th>Date</th>
                <th>Author</th>
                <th>Note</th>
            </tr>
        </thead>

        <tbody>
            <?php 
                $sqlNoteUdate = "SELECT * FROM person WHERE user = '".$_SESSION['username']."' AND update_row != '' ";
                $resultNoteUdate = mysqli_query($con, $sqlNoteUdate);

                while($rowNoteUdate = mysqli_fetch_assoc($resultNoteUdate)) { 
                ?>

                <tr>
                    <td><?php echo $rowNoteUdate['update_row']; ?></td>
                    <td><?php echo $initials; ?></td>
                    <td><?php echo $rowNoteUdate['commentar'];; ?></td>3
                </tr>

            <?php } ?>
        </tbody>

    </table>



<?php include 'footer.php'; ?>
</body>
</html>
