<?php
    require_once('../../layout/header.php');
    HeaderTemplate('Thể loại');
    require_once('../../layout/nav.php');
    require_once('../../configs/db.php');
    $database = new Database();
    $db = $database->connect();
    if(isset($_GET['id'])){
        $category = $_GET['id'];
        $sql = "SELECT * FROM book WHERE category = '$category'";
        $sql1 = "SELECT * FROM category WHERE id = '$category'";
        $result1 = $db->query($sql1);
        $result = $db->query($sql);
    }
?>
    <section>
        <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <h5 class="card-header">
                        <?php
                            if($result1->num_rows > 0){
                                while($row1 = mysqli_fetch_assoc($result1)) {
                                    echo $row1['name'];
                                }
                            }
                        ?>
                    </h5>
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
                require_once('../../layout/sidebar.php')
            ?>
        </div>
    </section>
    <?php
        require_once('../../layout/footer.php')
    ?>
