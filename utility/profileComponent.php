<?php


?>
<div class="home-container container my-3 px-5 d-flex justify-content-center align-items-center flex-column flex-sm-row">
<img width="400" height="400" src="./img/book.png" alt="">
                        <form style="width:75vw" action="utility/functions/update_pass_process.php" method="POST">
                        <br><br>
                        <h3>Rubah Password Profile Anda...</h3>    
                            <input type="hidden" name="submit">
                            <input type="hidden" name="id" value="<?=$id?>">
                            <div class="mb-3">
                                <label for="password" class="form-label">Password Lama</label>
                                <input type="password"  class="form-control" id="password" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="newpassword" class="form-label">Password Baru</label>
                                <input type="password"  class="form-control" id="newpassword" name="newpassword" required>
                            </div>
                            <div class="mb-3">
                                <label for="renewpassword" class="form-label">Konfirmasi Password Baru</label>
                                <input type="password"  class="form-control" id="renewpassword" name="renewpassword" required>
                            </div>
                          
                            <button type="submit" class="btn btn-primary">Rubah Password</button>
                            
                        </form>
</div>