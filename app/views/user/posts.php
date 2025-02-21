<div class="in-content">

<div class="header">
        <div>

        <h2>Posts</h2>


        </div>
        </div>

<div class="in-in-content">

        
        <?php

        $user = new User(); 
        $post = $user->get_posts($username); 

        echo "<div class='posts-container'>";


        if(isset($post['found'])&&$post['found']=='yes'){
            while ($posts=$post['result']->fetch_assoc()) {

                echo "<div class='posts'>";
                
                echo "<h4> <u>" . htmlspecialchars($posts['gym_name']) . "</u> </h5>";
                echo "<br>";
                echo "<h5>" . htmlspecialchars($posts['title']) . "</h5>";

                echo "<div class='postimage'>";
                echo "<img src='". ROOT . "/assets/images/posts/images/" . htmlspecialchars($posts["file"]). "'>";
                echo "</div>";

                echo "<p>" . htmlspecialchars($posts['details']) . "</p>";
            
            echo "</div>";

            }

        }elseif(isset($post['found'])&&$post['found']=='no'){
            echo "<p>There are no posts  </p>";

        }elseif(isset($post['found'])&&$post['found']=='alert'){
            echo "<p>Please join a gym to view posts  </p>";   
        }
        

        echo "</div>";


        ?>

</div>
</div>        