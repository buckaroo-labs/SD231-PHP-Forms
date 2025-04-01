<!DOCTYPE HTML>
<HTML>
  <HEAD>
    <TITLE>PHP Form Example</TITLE>

    <link rel="stylesheet" href="styles.css">
  </HEAD>
  <BODY>
<h2>HTML Form</h2>
    
<!-- code adapted from https://www.w3schools.com/html/tryit.asp?filename=tryhtml_form_submit -->
<!--
    This PHP file is given to you, the student, with no PHP in it. 
    Your assignment is to insert PHP into this file to process the form data.
-->
<form action="index.php">
  <label for="fname">First name:</label><br>
  <input type="text" id="fname" name="fname" value=""><br>
  <label for="lname">Last name:</label><br>
  <input type="text" id="lname" name="lname" value=""><br><br>
  <input type="submit" value="Submit">
</form> 

<p>When you click the "Submit" button, the form data will be sent to this same page URL.</p>


  </BODY>
</HTML>
