<div class="log-sx">

<!-- FORM -->

<h1>Login</h1>
<form action="<?php echo URL."user/login";?>" method="post">
                <table border="0">
                    <tr>
                        <td> <label for="email">Email </label> </td>
                        <td> <input type="text" value="<?php if(isset($email)){ echo $email;} ?>" name="email" placeholder="john@gmail.com" required> </td> 
                        
                    </tr>
                
                    <tr>
                        <td> <label for="password">Password </label> </td>
                        <td> <input type="password" name="password" placeholder="******" required> </td> 
                        
                    </tr>
                    
                    <tr>
                        <td>&nbsp;</td>
                        <td colspan="2"> <input type="submit" value="Login"> </td>
                    </tr>
                    
            </table>
</form>

</div>

<div class="log-dx">

<h1>Register</h1>
<form action="<?php echo URL."user/register";?>" method="post" id="form">
             <table border="0">
             <tr>
             	<td><label for="firstname">First Name </label></td>
             	<td><input type="text" value="<?php if(isset($firstName)){echo $firstName;} ?>" name="firstname" placeholder="Sam" required> </td>
			               
             </tr>
             
             <tr>
                 <td><label for="lastname">Last Name </label></td>
                 <td><input type="text" value="<?php if(isset($lastName)){echo $lastName;} ?>" name="lastname" placeholder="Smith" required> </td>
			      
            </tr>

           
            
             <tr>
                 <td><label for="email">Email </label></td>
                 <td><input type="text" value="<?php if(isset($email)){echo $email;} ?>" name="email" placeholder="sam@gmail.com" required> </td> 
			     
            </tr>
           
            <tr>
                <td><label for="password">Password</label></td>
                <td><input type="password" name="password" placeholder=" ******" required> </td>
             
            </tr>

             <tr>
                <td><label for="re-password">ReType Password</label></td>
                <td><input type="password" name="re-password" placeholder=" ******" required> </td>
   
            </tr>
         
         <tr>
             <td>&nbsp;</td> 
             <td colspan="2"><input type="submit" value="Register"> </td> 
             
         </tr>
      
		 
		</table>
		</form>
</div>

