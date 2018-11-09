#!/usr/bin/expect
set timeout 10  
set username [lindex $argv 0]  
set password [lindex $argv 1]  
set hostname [lindex $argv 2]  

spawn ssh $username@$hostname
expect "*password*"
send "$password\r"
interact
