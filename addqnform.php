<?php
echo "
<html>
<head>
</head>
<body style='font-family:sans-serif;font-size:20px;'>
<form action='saveqn.php' method='post'  enctype='multipart/form-data'>
<br><br><br>
Question Type : <br>Text Based &#160 &#160<input type='radio' name='typ' value='txt'><br>Image Based <input type='radio' name='typ' value='pic'><br><br>
Enter the Question as Text: <input type='text' maxlength='500' style='width:1000px;font-size:20px;' name='qn'><br><br>
OR<br><br>
Enter the Question as Image: <input type='file'  name='IMGX'><br><br>

Enter Option A : <input type='text' maxlength='80' style='width:1000px;font-size:20px;' name='opn1'><br><br>
Enter Option B : <input type='text' maxlength='80' style='width:1000px;font-size:20px;' name='opn2'><br><br>
Enter Option C : <input type='text' maxlength='80' style='width:1000px;font-size:20px;' name='opn3'><br><br>
Enter Option D : <input type='text' maxlength='80' style='width:1000px;font-size:20px;' name='opn4'><br><br>
Answer : <select style='font-size:20px;' name='ans'>
<option>A</option>
<option>B</option>
<option>C</option>
<option>D</option>
</select>
<br><br>
<input type='submit' value='Save Question' style='font-size:20px;'>
</form>
<br>
<a href='adminhome.php'>Back To Main Page</a>
</body>
</html>
";
?>