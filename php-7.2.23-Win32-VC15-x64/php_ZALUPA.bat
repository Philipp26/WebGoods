@echo off
echo Starting PHP FastCGI...
set path=C:\Users\FBarinov\Desktop\webgoods\WebGoods\php-7.2.23-Win32-VC15-x64;%PATH%
C:\Users\FBarinov\Desktop\webgoods\WebGoods\php-7.2.23-Win32-VC15-x64\php-cgi.exe -b 127.0.0.1:9123 -c C:\Users\FBarinov\Desktop\webgoods\WebGoods\php-7.2.23-Win32-VC15-x64\php.ini-development