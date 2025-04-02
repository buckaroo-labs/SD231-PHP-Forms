# SD231-PHP-Forms
Lab exercise

PART 1 INSTRUCTIONS  
1-1. Clone this repository (anywhere on your computer) and then copy the `index.php` file in it to the document root of your PHP-enabled web server (e.g. `C:\Program Files\Ampps\www`).  
1-2. Point your browser to this `index.php` file (`http://localhost/` should do it unless another file takes precedence or you are running the server on a non-default port).
1-3. Take a look at the page source, using your browser's "View Page Source" feature.
1-4. Fill out the form and click "Submit."  What happens to the text you entered into the form fields? How does the URL in the address bar change?

When you clicked the form's submit button, your browser formed an HTTP request URL using the "name" attributes of the form inputs and their corresponding values. This is where the longer URL appearing in your address bar comes from. So far, no server-side scripting is happening, and "index.php" contains no PHP code. The part of the URL after "index.php" is called the "QUERY STRING," and we saw it in a previous exercise. Since the query string is sent as part of an HTTP GET request, the name-value pairs in it are sometimes called "GET variables."  

Next, you will insert PHP code into `index.php` so that the form data you sent to the server with your request will appear as part of the server's response.

1-5. Insert the text `<?php echo($_GET['fname']); ?>` into the HTML line `<input type="text" id="ifname" name="fname" value=""><br>` so that the following line is the result:
`<input type="text" id="firstname" name="fname" value="<?php echo($_GET['fname']); ?>"><br>`

PHP has a global string array called `$_GET` which stores all the name-value pairs sent in the request's query string. We coded our file to `echo` the value of the `$_GET` array indexed by the name `fname`. 

1-6. Save your changes to the `index.php` file and refresh your browser.  
1-7. Fill out both fields of the form and hit the "Submit" button again. Which of the two form fields remains populated when the response from the server comes back? Why?  
1-8. Remove the query-string portion of the URL in your browser's address bar (leaving only `http://localhost/index.php`, for example) and press enter. Do you see an error message?  

The code that we added in Step 1-5 simply assumed that the value `$_GET['fname']` would be defined. This was not the case, resulting in an `Undefined array key` error.   
Some errors cause a PHP page not to render, and in these cases a developer needs to examine the Apache error logs to find out what went wrong. AMPPS stores this log at 
`C:\Program Files\Ampps\ampps\scripts\error_log.log` by default, but does not have logging turned on unless you tell it to. Go to `http://localhost/ampps-admin/index.php?act=settings` and adjust the "AMPPS Logs Level" setting until you see the log results you need.  

1-9. Modify your PHP code so that `$_GET['fname']` is only echoed if the variable is set.  
1-10. Modify your PHP code so that if `$_GET['fname']` set, a script element is echoed as well. This script element will contain JavaScript which changes the content of the paragraph element (with the "demo" ID) to a greeting that includes `$_GET['fname']`.  

Step #1-10 is intentionally tricky. Yes, you could have just rewritten the paragraph on the server side rather than including a client-side script and making the client do that work. But the point being made here is that PHP can dynamically generate JavaScript as well as HTML. You are also going to need to figure out how to construct a string in PHP that contains quotation marks. PHP makes this relatively painless. If you need a string to contain double-quotation marks, you enclose it in single-quote marks, e.g.: `$string1='My name is "Ishmael."'`; If you need a string to contain single-quote marks, vice versa, e.g.: `$SQLString="SELECT id FROM students WHERE fname='Ishmael'"`;  

PART 2 INSTRUCTIONS  
2-1. Change the form method from GET to POST (see the [reading assignment](https://www.w3schools.com/php/php_forms.asp)).  

Note the changed behavior of the page when the form is submitted. Note also that the form data no longer appears in the address bar. If this were a search form, users would now be unable to bookmark their search terms. If, on the other hand, this were a form for more sensitive data, it might be best not to display it once submitted. 

2-3. Change your PHP code to check for a POSTed `fname` value and to display it in the form instead of a GET variable.  
2-4. Put several single- and double-quotation marks and greater-than and less-than signs in the form fields and submit the form. Are you able to produce any unintended results? How do you think it might be possible for a malicious actor to take advantage of a web form that does not validate the input coming from its users?  What if the user-submitted data is made part of a search string that the web server sends to a database? What if someone were to craft a URL that included a malicious query string and sent this URL in a spam email to a web site's registered users? Would the effectiveness of such an attempt be different if the URL were processed as a GET request as opposed to a POST request?  
2-5. Modify your PHP code to screen out problematic characters from the form input using the htmlspecialchars() function.  
2-6. Write a paragraph of 200-300 words answering some or all of the questions in step 2-4.  
2-7. Put your short essay and your updated `index.php` into a single zip file and submit this file in Canvas.    

