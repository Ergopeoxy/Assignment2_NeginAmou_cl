
                   
                   
                   <div class="bg-secondary text-center rounded p-4">
                        
                        <h6 class="mb-0"> Create your account to register your trademark</h6>
                            <div class="">
                            
                             <hr>
                             <?php 
                              
                             ?> 
                                <form action="./pages/confirmRegister.php" method="post" onsubmit="return checkPassword(this)">
                                    <label for="fname">First name</label>
                                    <input  class="form-control" name="fname" id="fname" require >

                                    <label for="lname">Last name</label>
                                    <input  class="form-control" name="lname" id="lname" require >

                                    <!-- <label for="lname">username</label>
                                    <input  class="form-control" name="lname" id="lname" require > -->

                                    <label for="email">Email</label>
                                    <input  type="email" class="form-control" name="email" id="email"  >

                                    <label for="pass">Password</label>
                                    <input  type="password" class="form-control" name="pass" id="pass" require >
                                    <label for="pass2">Confirm password</label>
                                    <input  type="password" class="form-control" name="pass2" id="pass2"  require>

                                    <label for="phone">phone</label>
                                    <input type="tel" placeholder="Ex: 902-333-3333" class="form-control" name="phone" id="phone" pattern="([0-9]{3})-[0-9]{3}-[0-9]{4}" require >


                                    <hr>
                                    <button type="submit" name="Register" id="Register" class="btn btn-primary">Save</button>
                                </form>
                                <br>
                                Already have an account? <a href="./pages/signin.php"> sign in</a>
                            </div>

                            
                           <div id=""></div>
                        </div>
                