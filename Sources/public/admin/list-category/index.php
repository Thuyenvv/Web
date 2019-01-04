<?php
    require_once('../../../layout/header.php');
    if(!isset($_SESSION['user'])){
        header("Location: /login.php");
    }
    HeaderTemplate('Danh sách thể loại');
    require_once('../../../layout/nav.php');
    require_once('../../../configs/db.php');
    $database = new Database();
    $db = $database->connect();
    $sql = "SELECT * FROM category";
    $result = $db->query($sql);
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <?php
                    require('../../../layout/adminNav.php')
                ?>
            </div>
            <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    Thêm sách
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                            <th scope="col">Tên</th>
                            <th scope="col">Đường dẫn</th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if($result->num_rows > 0){
                                    while($row = mysqli_fetch_assoc($result)) {
                                    echo '<tr>
                                            <td>'.$row['name'].'</td>
                                            <td>'.$row['path'].'</td>
                                            <td><a href="./delete.php?id='.$row['id'].'" class="btn btn-danger"><i class="far fa-trash-alt"></i></a></td>
                                        </tr>';
                                    }
                                }else{
                                    echo '<div class="alert alert-warning" role="alert">
                                        Bạn chưa có thể loại nào ! <a href="/admin/create-category">Thêm ngay</a>
                                    </div>';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>
<?php
    require_once('../../../layout/footer.php')
?>
