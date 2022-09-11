<?php require('connection.php') ?>

    <div class="container">
        <h2>To-do List</h2>
        <form method="POST">
            <input type="text" name="nm_task" id="nm_task" placeholder="Enter a task">
            <input type="submit" value="Enviar">
        </form>

        <?php
            if(isset($_POST['nm_task'])){
                RegisterTask($_POST['nm_task']);
            }
        ?>

        <ul>
            <?php
                if(isset($_GET['delete_task'])){
                    DeleteTask($_GET['delete_task']);
                }
            
                $view = ViewTask("");

                while($list = $view->fetch_object()){
                    echo '
                        <li>
                            <a>'.$list->nm_task.'</a>
                            <a href="#"><i class="fa-solid fa-pen-to-square"></i></a>
                            <td><a href="?delete_task='.$list->cd_task.'"><i class="fa-solid fa-trash"></i></a>
                        </li> ';		
                }
            ?>
        </ul>

    </div>

    <script src="https://kit.fontawesome.com/07cc412226.js" crossorigin="anonymous"></script>