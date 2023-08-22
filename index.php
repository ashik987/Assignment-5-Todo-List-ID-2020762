<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <title>ToDo List</title>
  </head>
  <body>
    
    <h1 class="text-center py-4 my-4"></h1>

    <div class="w-50 m-auto">
      <form action="data.php" method="post" autocomplete="off">
          <div class="form-group input-task">
              
              <input class="form-control" type="text" name="title" id="title" placeholder="Add Your Task Here" Required>

          </div><br>
          <!-- <button class="btn btn-success">Add To ToDo'S</button> -->

      </form>

      </div><br>

      <div class="lists w-50 m-auto my-4">
          <h5 style="color: gray">Favourites</h5>
            
          <div id="tasks">
            <?php
                include 'database.php';
                $sql="SELECT * FROM todos WHERE is_favourite=1 ORDER BY id DESC";
                $tasks=mysqli_query($conn, $sql);
                if(!empty($tasks)) {
                    foreach($tasks as $t) {
            ?>
            <div class="task">
                <span><?php echo $t['Title'] ?></span>
                <a class="button" href="delete.php?id=<?php echo $t['id'] ?>" role="button"><i class="fas fa-trash-alt" style="color: #d33636"></i></a>
                <a class="button" href="update.php?id=<?php echo $t['id'] ?>" role="button"><i class="fas fa-star" style="color: #FFD92C;"></i></a>
            </div>
            <?php }} ?>
          </div>
       </div>
    
   
      <div class="lists w-50 m-auto my-4">
          <h5 style="color: gray">Inbox</h5>
            
          <div id="tasks">
            <?php
                include 'database.php';
                $sql="SELECT * FROM todos WHERE is_favourite=0 ORDER BY id DESC";
                $tasks=mysqli_query($conn, $sql);
                if(!empty($tasks)) {
                    foreach($tasks as $t) {
            ?>
            <div class="task">
                <span><?php echo $t['Title'] ?></span>
                <a class="button" href="delete.php?id=<?php echo $t['id'] ?>" role="button"><i class="fas fa-trash-alt" style="color: #d33636"></i></a>
                <a class="button" href="update.php?id=<?php echo $t['id'] ?>" role="button"><i class="fas fa-star" style="color: #D3D3D3;"></i></a>
            </div>
            <?php }} ?>
          </div>
       </div>

    </div>

    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
  </body>
</html>