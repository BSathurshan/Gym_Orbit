<div class="in-content">
        <!-- Dashboard -->
    
      <div class="header">
        <div>
        <h1>Welcome, <?php echo $username; ?>!</h1>       

        </div>
      </div>

      <div class="in-in-content">
        <div class="table">
            <h2>Profile</h2>
               
                   
                            <div class="row">
                                <div class="title">        Name               </div >
                                <div class="data">   <?php echo $trainer_name; ?>     </div >
                            </div >
                            
                            <div class="row">
                                <div class="title">     Email          </div>
                                <div class="data">  <?php echo $email; ?>  </div>
                            </div>
                           
                            <div class="row">
                                <div class="title">     Social        </div>
                                <div class="data">  <?php echo $social; ?>  </div>
                            </div>
                              
                            <div class="row">
                                <div class="title">     Experience     </div>
                                <div class="data">  <?php echo $experience;?>  </div>
                            </div>
                            
                            <div class="row">
                                <div class="title">     Age      </div>
                                <div class="data">  <?php echo $age; ?>  </div>
                            </div>

                               <div class="row">
                                <div class="title">    Gender     </div>
                                <div class="data">  <?php echo $gender; ?>  </div>
                            </div>

                            <div class="row">
                                <div class="title">    Phone     </div>
                                <div class="data">  <?php echo $contact; ?>  </div>
                            </div>

                            <div class="row">
                                <div class="title">    Adress     </div>
                                <div class="data">  <?php echo $location; ?> </div>
                            </div>

                            <div class="row">
                                <div class="title">    Availability     </div>
                                <div class="data">  <?php echo $availiblity; ?> </div>
                            </div>

                            <div class="row">
                                <div class="title">    Qualifications    </div>
                                <div class="data">  <?php echo $qualify; ?> </div>
                            </div>

                            <div class="row">
                                <div class="title">    Specialities    </div>
                                <div class="data">  <?php echo $special; ?> </div>
                            </div>

                            <div class="row" style="display: none;">
                                <div class="title">     Password            </div>
                                <div class="data">  <?php echo $password; ?> </div>
                            </div>

                            </div>


                <div class="profile-image-container">
                <div class="profile-title">Profile</div>
                <div class="profile-image">
                    <img src="<?php echo htmlspecialchars(ROOT . '/assets/images/instructor/profile/images/' . $profile_image); ?>" alt="Instructor Image" class="gym-profile-img">
                </div>
                </div>
</div>
</div>
s



                           

                            
                            
    
                            
                           

 

                     <!-- <div class="editsave">
                        <button class="save" type="submit">
                            <i class="fa-solid fa-floppy-disk"></i>Save
                        </button>
                    </div>  
                </form>
                <div class="editsave">
                    <button class="edit activebtn" onclick="editable()">
                        <i class="fa-solid fa-pen-to-square"></i>Edit
                    </button>
                </div>  End of Edit Button Container  -->