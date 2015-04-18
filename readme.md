## Slack Saver

Basic message archiving for Slack

The slack webhook sends messages to this service which then saves them to text files in an s3 bucket.
One file is created per channel and new messages are appended to the top.


The webhook should be configured to send messages to the url /message
The webhook key should be placed in the env file