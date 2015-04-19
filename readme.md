# Slack Saver

### Basic message archiving for Slack

Slack is a brilliant service and one we are starting to use a lot at Build Brighton.
Unfortunately as a not for profit community we simply cannot afford to pay the monthly fee,
this means that we don't have very big message archive.
 
This service is meant to be a really simple way of archiving everything that gets said,
webhooks send every message to this system which then saves them for future reference.

Slack doesn't allow a single webhook to relay all messages so a webhook will need to be 
created for each channel, all sending messages with the same key to the same url.


The webhooks should be configured to send messages to the url /message
The webhook key should be placed in the env file along with the other required parameters.