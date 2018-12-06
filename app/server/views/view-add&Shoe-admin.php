<?php
if($_SESSION['main'] !=='addA'){
 $admin = $abl->ActionGetOneAdmin($_SESSION['adminId']);
}
 ?>

<form action="<?php echo basename($_SERVER['PHP_SELF'])?>" method="POST" enctype="multipart/form-data">

    <div class="form-group">
        <?php if($_SESSION['main'] =='showA' && $_SESSION['mainEdit'] == ''){?>
            <div class="d-flex">
                <div class="mr-auto p-2"><strong><?php echo $admin->getName()?></strong></div>
                <input  name="idOfCourse" style="display:none" type="number" value="<?php echo $admin->getId()?>">
                <button class="p-2 btn btn-secondary" type="submit" name="editAdmin">Edit</button>
            </div>
            <hr>

            <?php if ($_SESSION['hasErrors'] == true) { 
                $arreyOfErrors = $abl->getErrors()?>
                    <ul class="list-group">
                        <?php foreach ($arreyOfErrors as $error) { ?>
                        <li class="list-group-item list-group-item-danger"><strong><?php echo $error; ?></strong> </li>
                        <?php } ?>
                    </ul>
                
            <?php } ?>
        <?php } ?>
        <?php if($_SESSION['main'] =='addA' || $_SESSION['mainEdit'] =='EditA'){?>
            <?php if($_SESSION['main'] =='showA'){?>
                <input name="idOfAdminForEdit" style="display:none" type="number" value="<?php echo $admin->getId()?>">
            <?php }?>
            <button class="mb-5 float-left btn btn-secondary" type="submit" name="SaveAdmin">Save</button>
        <?php }?>
    </div>
    <div class="form-group">
        <?php if($_SESSION['mainEdit'] == 'EditA'&& $_SESSION['rank'] ===1){?>
            <input name="idOfAdmin" style="display:none" type="number" value="<?php echo $admin->getId()?>">
            <button class="float-right btn btn-secondary" type="submit" name="DeleteAdmin">Delete</button>
        <?php }?>
    </div>

    <!--  -->

    <?php if($_SESSION['main'] =='addA' ){ ?>
        <br>
        <br>
            <h3 class="text-center">Add admin</h3>
            <div class="form-group">name
                <input class="form-control" type="text" name="NameAdmin">
            </div>
            <div class="form-group">Phone
                <input class="form-control" type="number" name="PhoneAdmin">
            </div>
            <div class="form-group">Email
                <input class="form-control" type="text" name="EmailAdmin">
            </div>
            <div class="form-group">Role
                <input class="form-control" type="number" name="RoleAdmin">
            </div>
            <div class="form-group">password
                <input class="form-control" type="password" name="pwdAdmin">
            </div>
            <div class="form-group">Image
                <input class="form-control border-0" type="file" name="ImageAdmin">
            </div>
        <?php }elseif($_SESSION['main'] =='showA' &&  $_SESSION['mainEdit'] == ''){?>
        <div class="row">
        <div class="col-3"><img src="images/rols/<?php  echo $admin->getImage() ?>" alt="" height="100" width="152"></div>
        <div class="col-9">
            <div class=" form-group"><strong>Name:</strong>
                <input class="border-0" class="form-control" type="text" name="NameAdmin" value="<?php  echo $admin->getName() ?>">
            </div>  
            <div class=" form-group"><strong>Pone:</strong>
                0<input class="border-0" class="form-control" type="number" name="PhoneAdmin" value="<?php  echo $admin->getPhone() ?>">
            </div> 
            <div class=" form-group"><strong>Email:</strong>
                <input class="border-0" class="form-control" type="text" name="EmailAdmin" value="<?php  echo $admin->getEmail() ?>">
            </div>
            <div class=" form-group"><strong>Role:</strong>
                <input class="border-0" class="form-control" type="number" name="RoleAdmin" value="<?php  echo $admin->getRole_id() ?>">
            </div>
            <div class="form-group"><strong>password:</strong>
                <input class="form-control border-0" type="password" name="pwdAdmin" value="<?php  echo $admin->getPwd() ?>">
            </div>
        </div> 
        <?php }elseif($_SESSION['main'] =='showA'   &&  $_SESSION['mainEdit'] == 'EditA'){?> 
            <div class=" form-group">
                <input   class="form-control" type="text" name="NameAdmin" value="<?php  echo $admin->getName()?>">
             </div>
             <div class=" form-group"><strong>Pone:</strong>
                <input  class="form-control" type="number" name="PhoneAdmin" value="<?php  echo '0'.$admin->getPhone() ?>">
            </div> 
            <div class=" form-group"><strong>Email:</strong>
                <input  class="form-control" type="text" name="EmailAdmin" value="<?php  echo $admin->getEmail() ?>">
            </div>
            <div class=" form-group"><strong>Role:</strong>
                <input  class="form-control" type="number" name="RoleAdmin" value="<?php  echo $admin->getRole_id() ?>">
            </div>
            <div class=" form-group">password
                <input class="form-control" type="password" name="pwdAdmin" value="<?php  echo $admin->getPwd() ?>">
            </div>
            <div class="col-3"><img src="images/rols/<?php  echo $admin->getImage() ?>" alt="" height="100" width="152"></div>
            <input style="display:none" type="text" name="helperAdminImage" value="<?php  echo $admin->getImage() ?>">
            <input class="form-control border-0" type="file" name="ImageAdminForUpdate">

             
        <?php }?>
        
    

    
 
</form>