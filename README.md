# OntraportMiniProject
1) Create a github repo
 
2) Create an html file with a form that collects firstname, lastname, and email
 
3) Create an php file that the form submits to that will echo out firstname, lastname, email.

4) Create a database

5) Create a table on that database with the columns firstname, lastname, email

6) On the action_page.php, connect to the database and store the info into the database while also outputting it.

7) Instead of putting your mysql creds in the same file as the the file using it lets move it out and include it into this file. This way you can remove repeat code when other pages need the creds


8) Next I'd like you to create a class called "Contact". And you will instantiate a Contact and then SetValue for the fields, and then Save to push the info into the db.

9) Next I'd like the thank you page to get passed an Id and then using that id, using the Contact class to "Fetch" the db row and then GetValue and echo out each of the pertinent values.
