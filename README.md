# SD231-PHP-Forms
Lab exercise

1. Clone this repository (anywhere on your computer) and then copy the `index.php` file in it to the document root of your PHP-enabled web server (e.g. `C:\Program Files\Ampps\www`).  
2. Point your browser to this `index.php` file (`http://localhost/` should do it unless another file takes precedence or you are running the server on a non-default port).
3. Take a look at the page source, using your browser's "View Page Source" feature.
4. Fill out the form and click "Submit."  What happens to the text you entered into the form fields? How does the URL in the address bar change?

When you clicked the form's submit button, your browser formed an HTTP request URL using the "name" attributes of the form inputs and their corresponding values. This is where the longer URL appearing in your address bar comes from. So far, no server-side scripting is happening, and "index.php" contains no PHP code. The part of the URL after "index.php" is called the "QUERY STRING," and we saw it in a previous exercise. Since the query string is sent as part of an HTTP GET request, the name-value pairs in it are sometimes called "GET variables."  

Next, you will insert PHP code into `index.php` so that the form data you sent to the server with your request will appear as part of the server's response.

5. Insert the text `<?php echo($_GET['fname']); ?>` into the HTML line `<input type="text" id="ifname" name="fname" value=""><br>` so that the following line is the result:
`<input type="text" id="firstname" name="fname" value="<?php echo($_GET['fname']); ?>"><br>`

PHP has a global string array called `$_GET` which stores all the name-value pairs sent in the request's query string. We coded our file to `echo` the value of the `$_GET` array indexed by the name `fname`. 

7. Save your changes to the `index.php` file and refresh your browser.  
8. Fill out both fields of the form and hit the "Submit" button again. Which of the two form fields remains populated when the response from the server comes back? Why?  
9. Remove the query-string portion of the URL in your browser's address bar (leaving only `http://localhost/index.php`, for example) and press enter. Do you see an error message?  

The code that we added in Step 5 simply assumed that the value `$_GET['fname']` would be defined. This was not the case, resulting in an `Undefined array key` error.   
Some errors cause a PHP page not to render, and in these cases a developer needs to examine the Apache error logs to find out what went wrong. AMPPS stores this log at 
`C:\Program Files\Ampps\ampps\scripts\error_log.log` by default, but does not have logging turned on unless you tell it to. Go to `http://localhost/ampps-admin/index.php?act=settings` and adjust the "AMPPS Logs Level" setting until you see the log results you need.  

10. Modify your PHP code so that `$_GET['fname']` is only echoed if the variable is set.  
11. Modify your PHP code so that if `$_GET['fname']` set, a script element is echoed as well. This script element will contain JavaScript which changes the content of the paragraph element (with the "demo" ID) to a greeting that includes `$_GET['fname']`.  

Step #11 is intentionally tricky. Yes, you could have just rewritten the paragraph on the server side rather than including a client-side script and making the client do that work. But the point being made here is that PHP can dynamically generate JavaScript as well as HTML. You are also going to need to figure out how to construct a string in PHP that contains quotation marks. PHP makes this relatively painless. If you need a string to contain double-quotation marks, you enclose it in single-quote marks, e.g.: `$string1='My name is "Ishmael."'`; If you need a string to contain single-quote marks, vice versa, e.g.: `$SQLString="SELECT id FROM students WHERE fname='Ishmael'"`;  

12. Submit your updated `index.php` file in Canvas.  

