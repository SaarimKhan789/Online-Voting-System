<?php
  $connect=mysqli_connect("localhost","root","","voting");

  if($connect){
      echo "chal rha hai";
  }
  else{
      echo " nahichal rha hai";
  }
   $name=$_POST['name'];
   $mobile=$_POST['mobile'];
   $password=$_POST['password'];
   $cpassword=$_POST['cpassword'];
   $address=$_POST['address'];
   $image=$_FILES['photo']['name'];
   $tmp_name=$_FILES['photo']['tmp_name'];
   $role=$_POST['role'];
    
   if($cpassword==$password){
        
        move_uploaded_file($tmp_name,"../uploads/$image");
        
        $insert = mysqli_query($connect, "INSERT into user (name, mobile, password, address, photo, status, votes, role) VALUES('$name','$mobile','$password','$address','$image',0,0,'$role')");
        // $sql="insert into user(name,mobile,password,address,photo,status,voter,role) values('$name',$mobile',$password','$address','$image',0,0,'$role')";
        // echo $sql;
       


        if($insert){
            echo 
                "<script>
                alert('Registration successfull');
                window.location = '../';
                </script>";
        }
        else{
            echo 
                "<script>
                alert('Some error occured');
                window.location = '../routes/register.html';
                </script>";
        }
    }
    else{
        echo 
            "<script>
            alert('Password and confirm password do not match!');
            window.location = '../routes/register.html';
            </script>";
    }  
?> 

