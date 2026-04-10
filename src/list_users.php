<?php require("../config/database.php");
/*SELECT firstname ||'  '||lastname as fullname,
         email,
         mobile_phone,
         CASE when status=true then'Active' else 'Inactive' END as status,
		 profile_photo
		 FROM users;

UPDATE users SET profile_photo='profile_photos/user_default.png';*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Document</title>
</head>
<body>
       <table border="1" align="center">
              <tr>
               <th>Fullname</th>
               <th>E-mail</th>
               <th>Mobile phone</th>
               <th>status</th>
               <th>photo</th>
               <th>options</th>
              </tr>
            <tr>
               <td>Peter Parker</td>
               <td>PeterParker@gmail.com</td>
               <td>3147735216</td>
               <td>Active</td>
               <td><img src="profile_photos/Users.png" width="50" alt="User photo"></td>
               <td>
                      <a href="H">
                             <img src="icons/edit.png"
                             width="50" alt="Edit user">
                          </a>
                      &nbsp;&nbsp;
                            <a href="H">
                               <img src="icons/delete.png"width="50" alt="Delete user">
                          </a>
                   </td>
            </tr>
     </table>
                 

       
</body>
</html>