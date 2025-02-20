<h2>Profile</h2>
                <hr>
                <form id="profileForm" method="POST" action="./customize/update_profile.php">
                    <table>
                        <tr>
                            <td>Name</td>
                            <td><input type="text" name="trainer_name" value="<?php echo $trainer_name; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="email" name="email" value="<?php echo $email; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td>Social</td>
                            <td><input type="text" name="social" value="<?php echo $social; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td>Experience</td>
                            <td><input type="text" name="experience" value="<?php echo $experience; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td>Age</td>
                            <td><input type="text" name="age" value="<?php echo $age; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td><input type="text" name="gender" value="<?php echo $gender; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td><input type="text" name="contact" value="<?php echo $contact; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td><input type="text" name="location" value="<?php echo $location; ?>" readonly></td>
                        </tr>                   
                        <tr>
                            <td>Availibility</td>
                            <td><input type="text" name="availiblity" value="<?php echo $availiblity; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td>Qualifications</td>
                            <td><input type="text" name="qualify" value="<?php echo $qualify; ?>" readonly></td>
                        </tr>

                        <tr>
                            <td>Specialities</td>
                            <td><input type="text" name="special" value="<?php echo $special; ?>" readonly></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td><input type="hidden" name="password" value="<?php echo $password; ?>" readonly></td>
                        </tr>
                    </table>



                    <div class="editsave">
                        <button class="save" type="submit">
                            <i class="fa-solid fa-floppy-disk"></i>Save
                        </button>
                    </div> <!-- End of Save Button Container -->
                </form>
                <div class="editsave">
                    <button class="edit activebtn" onclick="editable()">
                        <i class="fa-solid fa-pen-to-square"></i>Edit
                    </button>
                </div> <!-- End of Edit Button Container -->