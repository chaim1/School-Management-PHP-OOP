
<div class="footer-down col-12">
    <div class="mx-auto w-50 p-5">

<!--  for errors -->
        <?php if ($hasErrors) { ?>
                <ul class="list-group">

                    <?php foreach ($arreyOfErrors as $error) { ?>
                    <li class="list-group-item list-group-item-danger"><strong><?php echo $error; ?></strong> </li>
                    <?php } ?>

                </ul>
            </div>
        <?php } ?>

<!-- login input-->

        <form action="" method="post">
            <div class="form-group">   
                <label for="userNameLogin"></label>User name
                <input class="form-control" type="text" name="userNameLogin">
            </div> 
            <div class="form-group">
                <label for="pwdLogin"></label>Password
                <input class="form-control" type="password" name="pwdLogin">
            </div>  
            <div class="text-center form-group">
                <button name="LoginLogin" class="col-md-5  btn-dark btn-lg" type="submit">Login</button>
            </div> 
        </form>
    </div>    
</div>