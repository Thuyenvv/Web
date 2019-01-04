<?php
    require_once('../layout/header.php');
    HeaderTemplate('Đọc sách online');
    require_once('../layout/nav.php');
    require_once('../configs/db.php');
    $database = new Database();
    $db = $database->connect();
    $sql = "SELECT * FROM book";
    $result = $db->query($sql);
    if (!$result) {
        trigger_error('Invalid query: ' . $db->error);
    }
?>
    <section>
        <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <h5 class="card-header">Tất cả sách</h5>
                <div class="card-body">
                    <div class="row">
                        <?php
                             if($result->num_rows > 0){
                                while($row = mysqli_fetch_assoc($result)) {
                                  echo '<div class="col-md-3">
                                            <a href="/ebook?id='.$row['id'].'" class="card" style="text-decoration: none;color:black">
                                                <img src="'.$row['img'].'" class="card-img-top" alt="..." height="200px">
                                                <div class="card-body" style="padding:10px 10px;">
                                                    <p class="card-text">'.$row['title'].'</p>
                                                </div>
                                            </a>
                                        </div>';
                                }
                            }
                        ?>
                    </div>
                </div>
            </div> 
            </div>
            <?php
                require('../layout/sidebar.php')
            ?>
        </div>
    </section>
    <?php
        require('../layout/footer.php')
    ?>
