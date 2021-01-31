# guestbook
The task is to write a guestbook app in PHP with no third-party frameworks/libraries.

The users should be able to:
- Create an account
- Log in
- Log out
- Write/Edit/Delete Messages
- And reply to messages

Concepts and workflow:
- auth check when you want to post a message or replay.
- check if the logged in user is the owner user when you want to delete or edit message.
- CSRF protection for POST requests.
- auth token creation when register.
- message and replies order by post time form newest to oldest.

Update database connection variables in config.php and access the application in browser with index.php
