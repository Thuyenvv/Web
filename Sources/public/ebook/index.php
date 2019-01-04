<?php
    require_once('../../layout/header.php');
    HeaderTemplate('ebook');
    require_once('../../layout/nav.php');   
    require_once('../../configs/db.php');
    $database = new Database();
    $db = $database->connect();
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM book WHERE id = '$id'";
        $result = $db->query($sql);
    }
    $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?>
<section>
    <div class="container">
    <div class="row">
        <div class="col-md-9">
            <?php
                if($result->num_rows > 0){
                    while($row = mysqli_fetch_assoc($result)) {
                        $id_category =  $row['category'];
                        $sql1 = "SELECT * FROM category WHERE id = $id_category";
                        $result1 = $db->query($sql1);
                        $category = null;
                        while($row1 = mysqli_fetch_assoc($result1)) {
                            $category = $row1['name'];
                        }
                        echo '<div class="card">
                        <div class="card-body">
                            <div class="media">
                                <img src="'.$row['img'].'" class="media-left" alt="..." height="300px" width="220px;" style="padding:10px">
                                <div class="media-body" style="margin : 5px 10px">
                                    <h4 class="card-title">'.$row['title'].'</h4>
                                    <p class="card-subtitle mb-2 text-muted">Tác giả : '.$row['author'].'</p>
                                    <p class="card-subtitle mb-2 text-muted">Thể loại : '. $category.'</p>
                                    <p>
                                        <div class="fb-like" data-href="/ebook/?id'.$row['id'].'" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                                    </p>
                                    <p>
                                        <a href="/detail/?id='.$row['id'].'" class="btn btn-warning">
                                            Đọc ngay
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>';
                    }
                }
            ?>  
            <div class="card">
                <div class="card-header">
                    Bình luận
                </div>
                <div class="card-body" style="padding: 2px;">
                    <?php
                        echo '<div class="fb-comments" data-href="'.$url.'" data-numposts="5"></div>';
                    ?> 
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