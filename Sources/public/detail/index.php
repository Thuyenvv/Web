<?php
    require_once('../../layout/header.php');
    require_once('../../layout/nav.php');
    require_once('../../configs/db.php');
    $database = new Database();
    $db = $database->connect();
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM book WHERE id = '$id'";
        $result = $db->query($sql);
        $data = null;
        if($result->num_rows > 0){
            while($row = mysqli_fetch_assoc($result)) {
                HeaderTemplate($row['title']);
                $data = $row;
            }
        }
    }
?>
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <?php
                    echo '<div class="jumbotron" style="margin-top:30px;">
                            <h3 class="text-center">'.$data['title'].'</h3>
                            <p class="lead">'.$data['sub_title'].'  <div class="fb-like" data-href="http://localhost/detail/?id'.$data['id'].'" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div></p>
                            <hr class="my-4">
                            <p>'.$data['content'].'</p>
                        </div>';
                ?>
                <div class="card">
                    <div class="card-header">
                        Bình luận
                    </div>
                    <div class="card-body" style="padding: 2px;">
                        <?php
                            echo '<div class="fb-comments" data-href="http://localhost/detail/?id'.$data['id'].'" data-numposts="5"></div>'
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
    require_once('../../layout/footer.php')
?>