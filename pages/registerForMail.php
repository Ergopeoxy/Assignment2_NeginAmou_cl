
                        <div class="bg-secondary text-center rounded p-4">
                        
                        <h6 class="mb-0"> Register for mailing list</h6>
                            <div class="">
                            
                             <hr>
                             <?php 
                              
                             ?> 
                                <form action="./pages/confirmRegister.php" method="post">
                                    <label for="fname">First name</label>
                                    <input  class="form-control" name="fname" id="fname" require >

                                    <label for="lname">Last name</label>
                                    <input  class="form-control" name="lname" id="lname" require >

                                    <label for="email">Email</label>
                                    <input  type="email" class="form-control" name="email" id="email"  >

                                    <label for="phone">phone</label>
                                    <input type="tel" placeholder="Ex: 902-333-3333" class="form-control" name="phone" id="phone" pattern="([0-9]{3})-[0-9]{3}-[0-9]{4}" require >

                                    <label for="publication">Which publication would you like?</label>

                                    <input list="subs"  name="publication" id="publication" class="form-control" autocomplete="off" require>
                                    

                                    <?php
                                    include_once './database/forms/registration.php';
                                    $html = getSubscribtion();
                                    echo $html;
                                    ?>
                                   

                                    <h6>Which operating system are you using?</h6>

                                    <!-- get this part from database -->

                                    <?php
                                        
                                        $html = getOs();
                                        echo $html;
                                    ?>




                                    <button type="submit" name="Register" id="Register" class="btn btn-primary">Save</button>
                                </form>
                            </div>

                            
                           <div id=""></div>
                        </div>
                