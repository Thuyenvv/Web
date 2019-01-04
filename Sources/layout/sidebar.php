<?php
    require_once(__ROOT__.'./configs/db.php');
    $database = new Database();
    $db = $database->connect();
    $sql = "SELECT * FROM category";
    $result = $db->query($sql);
?>
<div class="col-md-3">
        <div class="card">
            <div class="card-header">
            Thể loại sách
            </div>
            <div class="card-body" style="padding: 2px;">
                <ul class="list-group list-group-flush">
                    <?php
                        if($result->num_rows > 0){
                            while($row = mysqli_fetch_assoc($result)) {
                               echo '<li class="list-group-item"><a href="/category/?id='.$row['id'].'">'.$row['name'].'</a></li>';
                            }
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>