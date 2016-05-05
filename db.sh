#!/bin/sh

# Change DBPASSWORD, DBUSER, DBHOST and DBNAME to match the values
# your mysql_db_info file on the webdev server.
mysql --password='e16PQfNF4Hvq' --user='jlin4' --host='dbdev.cs.uiowa.edu' 'db_jlin4'
