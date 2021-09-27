<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

.field {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
</head>
<body align="center" style="background-color: #eee; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #333333;">
    
<br><br>
    <h1 style="font-size: 20px;">Paris Private Transfer - Contact Us</h1><br>
    
    <table width="70%" cellpadding="0" cellspacing="0" border="0" align="center">
        
        <tr>            
            <td width="20%" cellpadding="0" cellspacing="0">  
                <p align="left"><b>Name:</b> </p>  
                <hr>        
            </td>
            <td  cellpadding="0" cellspacing="0">  
                <p align="left">{{ $details['name'] }}</p> 
                <hr>                
            </td>
        </tr>
        <tr>            
            <td width="20%" cellpadding="0" cellspacing="0">
                <p align="left"><b>Email:</b> </p>
                <hr>
            </td>
            <td  cellpadding="0" cellspacing="0">     
                <p align="left">{{ $details['email'] }}</p>  
                <hr>         
            </td>
        </tr>
        <tr>            
            <td width="20%" cellpadding="0" cellspacing="0">  
                <p align="left"><b>Subject:</b> </p>  
                <hr>        
            </td>
            <td  cellpadding="0" cellspacing="0">  
                <p align="left">{{ $details['subject'] }}</p> 
                <hr>                
            </td>
        </tr>
        <tr>            
            <td width="20%" cellpadding="0" cellspacing="0">   
                <p align="left"><b>Message:</b></p>
            </td>
            <td  cellpadding="0" cellspacing="0">
                <p align="left">{{ $details['message'] }}</p>             
            </td>
        </tr>
    </table>
    <br><br>
</body>
</html>
