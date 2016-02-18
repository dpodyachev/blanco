xml parser

For instalation run from target folder:
sh install.sh
will message "Update start" or "wrong path, cd to portal folder" if can't read config.ini

Known issues:
Be careful with non ascii letters in names of XML_EPG !


Content description:
template	- absent files
administrator	- correction for execute new parser, links and crosslinks (link into re.php for your token2.php)
lib		- epg classes correction
locale		- some messages fix when no media, but is a EPG
storage		- fix for records
c/		- fixes for remove media info about streams (URL)
