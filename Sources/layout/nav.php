<?php
    define('__ROOT__', dirname(dirname(__FILE__))); 
    require_once(__ROOT__.'./configs/db.php');
    $datab = new Database();
    $db = $datab->connect();
    $sql = "SELECT * FROM category";
    $result = $db->query($sql);
    if (!$result) {
        trigger_error('Invalid query: ' . $db->error);
    }
?>
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
    <a class="navbar-brand" href="/">Ebook</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Thể loại sách
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php
            if($result->num_rows > 0){
              while($row = mysqli_fetch_assoc($result)) {
                  echo '<a class="dropdown-item" href="/category/?id='.$row['id'].'">'.$row['name'].'</a>';
              }
            }
          ?>
        </div>
      </li>
    </ul>
    <?php
        if(!isset($_SESSION['user'])){
          echo '<form class="form-inline my-2 my-lg-0">
                  <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm" aria-label="Search">
                  <button class="btn btn-primary my-2 my-sm-0" type="submit">Tìm kiếm</button>
                </form>';
        }else{
          echo '
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="/admin">Chào ' .$_SESSION['user'].' !</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/logout.php">Đăng xuất <i class="fas fa-sign-out-alt"></i></a>
            </li>
          </ul>
          ';
        }
    ?>
  </div>
    </div>
</nav>