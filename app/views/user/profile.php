<div class="in-content">
        <!-- Dashboard -->
    
      <div class="header">
        <div>
        <h2>Welcome, <?php echo $username; ?>!</h2>       
          <p>
            <?php
            echo date("l, F j, Y"); // Outputs: Wednesday, December 18, 2024
            ?></p>
        </div>
      </div>

      <div class="in-in-content">
        <div class="table">
            <h2>Profile</h2>
                            
                            <div class="row">
                                <div class="title">        Name               </div >
                                <div class="data">   <?php echo $name; ?>     
                                <span class="edit-pin" id="name-edit-pin">🖊️</span> 
                                </div >
                            </div >

                              <div class="row">
                                <div class="title">     User Name           </div>
                                <div class="data">  <?php echo $username; ?>  </div>
                              </div>

                            <div class="row">
                                <div class="title">      Email              </div>
                                <div class="data">  <?php echo $email; ?>   </div>
                            </div>

                            <div class="row">
                                <div class="title">     Phone               </div>
                                <div class="data">  <?php echo $contact; ?> </div>
                            </div>

                            <div class="row">
                                <div class="title">      Address            </div>
                                <div class="data">  <?php echo $address; ?>   </div>
                                <div class="location-googleMap" id="location-googleMap"><i class="fa-solid fa-location-dot fa-2x" style="color:rgb(255, 0, 0);"></i>
                                </div>
                            </div>

                            <div class="row">
                                <div class="title">     Age                 </div>
                                <div class="data">  <?php echo $age; ?>     
                                <span class="edit-pin" id="age-edit-pin">🖊️</span> 
                                </div>
                            </div>

                            <div class="row">
                                <div class="title">     Gender              </div>
                                <div class="data">  <?php echo $gender; ?>  </div>
                            </div>

                            <div class="row">
                                <div class="title">      Goals              </div>
                                <div class="data">  <?php echo $goals; ?>   </div>
                            </div>

                            <div class="row" style="display: none;">
                                <div class="title">     Password            </div>
                                <div class="data">  <?php echo $password; ?></div>
                            </div>

                                <!-- 
                                <div class="editsave">
                                    <button class="save" type="submit">
                                        <i class="fa-solid fa-floppy-disk"></i>Save
                                    </button>

                            <div class="editsave">
                                <button class="edit activebtn" onclick="editable()">
                                    <i class="fa-solid fa-pen-to-square"></i>Edit
                                </button>
                            </div> End of Edit Button -->

                            <button onclick="editProfile('<?= $name ?>', '<?= $contact ?>', '<?= $age ?>', '<?= $address ?>')">Edit</button>

        </div>

    </div> 
</div> 


                            <!-- Hidden Edit Form (Modal) -->
                            <div id="editUserFormModal" class="modal" style="display: none;">
                                <div class="modal-content">
                                    <h3>Edit User</h3>
                                    <form id="editForm" method="POST" action="<?= ROOT ?>/user/editProfile" enctype="multipart/form-data">
                                    <input type="hidden" name="email" id="email" value="<?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?>">
                                    <input type="hidden" name="username" id="username" value="<?= htmlspecialchars($username, ENT_QUOTES, 'UTF-8') ?>">


                                        <label for="name">Name:</label>
                                        <input type="text" name="name" id="name" required><br>

                                        <label for="address">Phone:</label>
                                        <input type="text" name="contact" id="contact" required><br>

                                        <label for="address">Address:</label>
                                        <input type="text" name="location" id="location" required><br>

                                        <label for="address">Age:</label>
                                        <input type="text" name="age" id="age" required><br>
                                        
                                        <label for="gender">Gender:</label>
                                            <select name="gender" id="gender" required>
                                                <option value="" disabled selected>Select your gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="prefer not to say">Prefer Not to Say</option>
                                            </select>

                                            <label for="gender">Goal:</label>
                                            <select name="goals" id="goals" required>
                                                <option value="" disabled selected>Select your gender</option>
                                                <option value="physic">physic</option>
                                                <option value="strength">strength</option>
                                                <option value="endurance">endurance</option>
                                            </select>
                                        

                                        <input type="submit" value="Save">
                                        <button type="button" onclick="closeEditModal()">Cancel</button>
                                    </form>
                                </div>
                            </div>



        <!-- Map Modal -->
        <div id="inlineMapContainer" class="map-modal" style="display:none;">
            <div id="map-modal-content" >
            <h3>Pick your address !</h3>
                <div id="map"></div>
                <form id="timeForm" action="<?= ROOT ?>/user/saveAddress" method="POST">
                <div class="map-controls">
                    <input type="text" id="gymAddress" name="address" placeholder="Selected Address" readonly />
                    <input type="text" id="gymLat" name="lat"/>
                    <input type="text" id="gymLng" name="lang"/>
                </div>
                <div class="map-buttons">
                    <button class="save" type="submit">Save</button>
                    <button class="cancel" type="button" onclick="cancelMapEdit()">Cancel</button>
                    </div>
                </form>
            </div>
        </div>

<!-- Edit Modal -->
<div id="Change-Name" class="modal" style="display:none;">
    <div id="modal-content" class="modal-content">
        <h3>Change your name!</h3>
        <form id="change-name-form">
            <div>
            <input type="text" id="new-name-input" name="new_name" value="<?= htmlspecialchars($name) ?>" />
            </div>
            <div class="buttons">
                <button class="save" id="save-name" type="button">Save</button>
                <button class="cancel" type="button" onclick="cancelNameEdit()">Cancel</button>
            </div>
        </form>
    </div>
</div>


<div id="Change-age" class="modal" style="display:none;">
    <div id="modal-content" class="modal-content">
        <h3>Change your age!</h3>
        <form id="change-age-form">
            <div>
            <input type="text" id="new-age-input" name="new_age" value="<?= htmlspecialchars($age) ?>" />
            </div>
            <div class="buttons">
                <button class="save" id="save-age" type="button">Save</button>
                <button class="cancel" type="button" onclick="cancelAgeEdit()">Cancel</button>
            </div>
        </form>
    </div>
</div>

