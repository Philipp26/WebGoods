@echo off
echo Starting PHP FastCGI...
set path=D:\sites\php-7.2.23-Win32-VC15-x64;%PATH%
D:\sites\php-7.2.23-Win32-VC15-x64\php-cgi.exe -b 127.0.0.1:9123 -c D:\sites\php-7.2.23-Win32-VC15-x64\php.ini-development