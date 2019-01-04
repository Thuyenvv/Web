<?php
    require_once('../configs/db.php');
    require_once('../layout/header.php');
    $database = new Database();
    $db = $database->connect();
    $loginFailed = null;
    if(isset($_SESSION['user'])){
        header("Location: /admin");
    }
    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
        $result = $db->query($sql);
        if (!$result) {
            trigger_error('Invalid query: ' . $db->error);
        }
        if($result->num_rows > 0){
            while($row = mysqli_fetch_assoc($result)) {
                $_SESSION['user'] = $row["username"];
                header("Location: /admin");
            }
        }else{
            $loginFailed = true;
        }
    }
    HeaderTemplate('Đăng nhập');
    require_once('../layout/nav.php');   
    $db->close();
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Đăng nhập
                </div>
                <div class="card-body">
                    <?php
                        if($loginFailed){
                            echo '<div class="alert alert-danger" role="alert">
                            Tên đăng nhập hoặc mật khẩu không chính xác!
                          </div>';
                        }
                    ?>
                    <form action="/login.php" method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên đăng nhập</label>
                            <input type="text" name="username" class="form-control" placeholder="Tên đăng nhập" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mật khẩu</label>
                            <input type="password" name="password" class="form-control" placeholder="Mật khẩu" required>
                        </div>
                        <button type="submit" class="btn btn-outline-primary btn-block">Đăng nhập</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    require('../layout/footer.php')
?>
