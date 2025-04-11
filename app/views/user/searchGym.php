
                <div class="header">
                <div>
                <h2>Search Gyms</h2>
                </div>
                </div>

                <div class="in-in-content">

                        <div class="search-box">
                        <input type="text" id="searchQuery2" name="search" placeholder="Search by gym name, gym username, or email">
                        </div>
                        <br>

                        
                        <div class="search-container">
                        <?php
                        echo '<input type="hidden" id="username" name="username" value="' . htmlspecialchars($username) . '">';
                        echo '<input type="hidden" id="name" name="name" value="' . htmlspecialchars($userDetails['name']) . '">';
                        ?>

                        </div>

                        
                        <div id="searchGymResults"><!-- This using renderer.php ( auto load ) --> 
                                
                        </div>



                </div>
</div>  