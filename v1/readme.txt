
The system setup is such that if you only plan to run the basic data gathering, you don't need to touch most of the files. The rest of this file will describe what you can and need to alter to make the system work with your stimuli and in your chosen language.

### INSTALLATION ###

Installation from the terminal of a Linux-like distribution (i.e. it works on Linux and Mac). In case the user does not have access to a terminal, the files can be downloaded from the web and then the content of the subfolder v1 moved to the public documents folder (= the folder of your webserver that is accessible from the web).

1. go to your local folder where you wish to store the git project
2. type
  git clone https://git.becs.aalto.fi/eglerean/embody.git 
  [it can also be done via ssh, google to find how to]
3. copy the subfolder v1 to the folder where you have your public documents. The final url of the experiment is now http://name.of.your.server/v1/ . You can rename the folder v1 with your favourite acronym
4. edit the file settings.php inside the folder v1:
	i. in line 4: variable $path should point to where the folder is on the server
5. create a subfolder "subjects" and make sure that it is writable by the server by doing
	chmod 777 subjects
   This is because the data is stored on the disk, and not on a database.



### CONFIGURATION ###

settings.php:
Settings-file includes all possible variables which you can play with, and explains what they do. 

instructions.txt: 
this is shown at the first page after login, before getting into the stimuli, and also from help-button on paint pages

page_texts.txt:
This is the file where all random small texts are defined. The system only recognizes lines which have || (two pipes next to each other, no space in between) somewhere : the left side of the line will be matched to a variable name (valid variable values at the moment are welcome, thank-you, instructions, start, uid_error, title, task label, forward, delete, left_label, right_label) and the right side will be the variable value. 

So e.g. a line with 'title || Emotionwords' will convert to title being set to 'Emotionwords'. The description lines above each line tell where that variable will be displayed. You can use other variable values (e.g. user id) in the texts by inputting ##variablename## (in this case it would be ##user##).

stimuli.txt:
the current iteration only supports stimuli which are words (paintwords)


### FAQ ###

1) Q: You run 'system' calls from PHP and my server administrator does not allow PHP with system calls. Can we have a version without 'system'?
A: Although the calls in the code are not a security issue, administrators have always good reasons to be paranoid. The paranoia-free solution is to host the virtualhost on a machine that serves only that purpose (i.e. not part of the intranetwork of your dept). This is a good practice with any website anyway. Future versions of emBODY will remove all instances of 'system'.

2) Q: The interface gives the following error: "There was an error with saving the data. Please report the error to enrico.glerean@aalto.fi". How can I fix it?
A: make sure that this is not a permission error (see Installation point 5 above). Then, the problem is with default Apache settings on the size of POST variables. The tool sends all data at once through a POST. You can check the error.log of your apache and you should be able to see something like:
"[error] [client ::1] PHP Warning: Unknown: Input variables exceeded 1000. To increase the limit change max_input_vars in php.ini."
To fix it, please add the following line to php.ini and restart Apache:
	max_input_vars = 2147483648

If you use fcgi to process php, the line to add to the fcgi module configuration is:
	FcgidMaxRequestLen 2147483648



### ENRICO TODO:
-inputting variable names to all pagetexts-entries ( i.e. how to bring $helpful into videowordsannotate)
