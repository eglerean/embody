
The system setup is such that if you only plan to run the basic data gathering, you don't need to touch most of the files. The rest of this file will describe what you can and need to alter to make the system work with your stimuli and in your chosen language.

settings.php:
Settings-file includes all possible variables which you can play with, and explains what they do. 

instructions.txt: 
this is shown at the first page after login, before getting into the stimuli, and also from help-button on paint pages

page_texts.txt:
This is the file where all random small texts are defined. The system only recognizes lines which have || (two pipes next to each other, no space in between) somewhere : the left side of the line will be matched to a variable name (valid variable values at the moment are welcome, thank-you, instructions, start, uid_error, title, task label, forward, delete, left_label, right_label) and the right side will be the variable value. 

So e.g. a line with 'title || Emotionwords' will convert to title being set to 'Emotionwords'. The description lines above each line tell where that variable will be displayed. You can use other variable values (e.g. user id) in the texts by inputting ##variablename## (in this case it would be ##user##).

stimuli.txt:
the current iteration only supports stimuli which are words (paintwords)

ENRICO TODO:
-inputting variable names to all pagetexts-entries ( i.e. how to bring $helpful into videowordsannotate)
