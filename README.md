# qwixx
Qwixx Dice Game Scorer (Self Hosted)

Description
---
These files are a simple example of PHP functions and JQuery ajax methods

index.php
---
Makes the game board and sets up JQuery event handlers

action.php
---
Saves scores from players (max 4) to a flat json file

Known Issues
---
Because the scores are saved to flat flie there is a potential of currupt data when two players try and score at the same time
- It would be better to keep the scrores with a sqlite db...

Installation
---
1. Copy all the files to your own web server with PHP.
2. Edit the action.php file and change the json_file and log_file to your directory

