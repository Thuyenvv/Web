<?php
    require_once('../../../layout/header.php');
    if(!isset($_SESSION['user'])){
        header("Location: /login.php");
    }
    HeaderTemplate('Thêm sách');
    require_once('../../../layout/nav.php');
    require_once('../../../configs/db.php');
    $database = new Database();
    $db = $database->connect();
    $sql = "SELECT * FROM category";
    $result = $db->query($sql);
    if(isset($_POST['title']) && isset($_POST['content']) && isset($_POST['sub_title'])&& isset($_POST['author']) && isset($_POST['img']) && isset($_POST['category'])){
        $title = $_POST['title'];
        $sub_title = $_POST['sub_title'];
        $img = $_POST['img'];
        $category = $_POST['category'];
        $author = $_POST['author'];
        $content = $_POST['content'];
        $sql1 = "INSERT INTO book (`title`,`sub_title`,`img`,`category`,`author`,`content`) VALUES ('$title','$sub_title','$img',$category,'$author','$content')";
        if($db->query($sql1)===TRUE){
            echo "
            <script>
                Swal({
                    title: 'Thành công!',
                    type:'success',
                    allowOutsideClick: false
                }).then((result) => {
                    window.location.href = 'http://localhost:8080/admin/create-book'
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
                    Thêm sách
                </div>
                <div class="card-body">
                <form action="/admin/create-book/index.php" method="post">
                    <div class="form-group">
                        <label>Tên sách</label>
                        <input type="text" class="form-control" placeholder="Tên sách" required name="title">
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea type="text" class="form-control" placeholder="Mô tả" required name="sub_title"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea type="text" class="form-control" placeholder="Nội dung" required name="content"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Link ảnh</label>
                        <input type="text" class="form-control" placeholder="Link ảnh" required name="img">
                    </div>
                    <div class="form-group">
                        <label>Tác giả</label>
                        <input type="text" class="form-control" placeholder="Tác giả" required name="author">
                    </div>
                    <div class="form-group">
                        <label>Thể loại</label>
                        <select class="custom-select mr-sm-2" name="category">
                            <option selected>Choose...</option>
                            <?php
                                if($result->num_rows > 0){
                                    while($row = mysqli_fetch_assoc($result)) {
                                    echo ' <option value="'.$row['id'].'">'.$row['name'].'</option>';
                                    }
                                }
                            ?>
                        </select>
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
