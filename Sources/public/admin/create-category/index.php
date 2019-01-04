<?php
    require_once('../../../layout/header.php');
    if(!isset($_SESSION['user'])){
        header("Location: /login.php");
    }
    HeaderTemplate('Thêm thể loại');
    require_once('../../../layout/nav.php');
    require_once('../../../configs/db.php');
    $database = new Database();
    $db = $database->connect();
    if(isset($_POST['name']) && isset($_POST['path'])){
        $name = $_POST['name'];
        $path = $_POST['path'];
        $sql1 = "INSERT INTO category (`name`,`path`) VALUES ('$name','$path')";
        if($db->query($sql1)===TRUE){
            echo "
            <script>
                Swal({
                    title: 'Thành công!',
                    type:'success',
                    allowOutsideClick: false
                }).then((result) => {
                    window.location.href = 'http://localhost:8080/admin/create-category'
                  })
            </script>
            ";
        } 
    }
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
                    Thêm Thể Loại
                </div>
                <div class="card-body">
                <form action="/admin/create-category/index.php" method="post">
                    <div class="form-group">
                        <label>Tên Thể loại</label>
                        <input type="text" class="form-control" placeholder="Tên Thể loại" required name="name">
                    </div>
                    <div class="form-group">
                        <label>Đường dẫn</label>
                        <input type="text" class="form-control" placeholder="Đường dẫn" required name="path">
                    </div>
                    <button type="submit" class="btn btn-block btn-primary">Thêm</button>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>
<?php
    require_once('../../../layout/footer.php')
?>
