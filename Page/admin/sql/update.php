<?php
include 'database.php';
session_start();
$user_id = $_GET['id'];

if(isset($_POST['update_profile'])){

   $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
   $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
$update_role = mysqli_real_escape_string($conn, $_POST['role']);

    if(empty($update_role)){
         $message[] = 'Update Role prems';
      }else{
        mysqli_query($conn, "UPDATE `profile` SET name = '$update_name', email = '$update_email'  ,role = '$update_role' WHERE id = '$user_id'") or die('query failed');
        header('location:../html/table-basic.php');
      }
   
   

   $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
   $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));


    if($new_pass != $confirm_pass){
         $message[] = 'confirm password not matched!';
      }else{
         mysqli_query($conn, "UPDATE `profile` SET password = '$confirm_pass' WHERE id = '$user_id'") or die('query failed');
         $message[] = 'password updated successfully!';
         header('location:../html/table-basic.php');
      
   }

   $update_image = $_FILES['update_image']['name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_folder = '../../../Functions/image/'.$update_image;

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'image is too large';
      }else{
         if(move_uploaded_file($update_image_tmp_name, $update_image_folder)){
            $image_update_query = mysqli_query($conn, "UPDATE `profile` SET image = '$update_image' WHERE id = '$user_id'") or die('query failed');
        
         }
         $message[] = 'image updated succssfully!';
         header('location:../html/table-basic.php');
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>update profile</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../dist/css/table.css">

</head>
<body>
   
<div class="update-profile">

   <?php
      $select = mysqli_query($conn, "SELECT * FROM `profile` WHERE id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <?php
         if($fetch['image'] == ''){
            echo '<img src="images/default-avatar.png">';
         }else{
            echo '<img src="../../../Functions/image/'.$fetch['image'].'">';
         }
         if(isset($message)){
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>';
            }
         }
      ?>
      <div class="flex">
         <div class="inputBox">
            <span>username :</span>
            <input type="text" name="update_name" value="<?php echo $fetch['name']; ?>" class="box">
            <span>your email :</span>
            <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="box">
            <span>update your pic :</span>
            <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
         </div>
         <div class="inputBox">
             <span>Role</span>
            <select name="role"  required class="box">
                <option  name="role"  disabled selected >
                  Change <?php echo  $fetch['role']; ?> role
                </option>
                <option name="role"  value="admin">
                    Admin Role
                </option>
                <option name="role"  value="staff">
                Staff Role
                </option>
                <option name="role"  value="user">
                User Role
                </option>
            </select>
            <span>new password :</span>
            <input type="password" name="new_pass" placeholder="enter new password" class="box">
            <span>confirm password :</span>
            <input type="password" name="confirm_pass" placeholder="confirm new password" class="box">
         </div>
      </div>
      <input type="submit" value="update profile" name="update_profile" class="btn">
      <a href="../html/table-basic.php" class="delete-btn">go back</a>
   </form>

</div>

</body>
</html>