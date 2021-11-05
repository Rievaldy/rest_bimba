warning: LF will be replaced by CRLF in application/config/autoload.php.
The file will have its original line endings in your working directory
warning: LF will be replaced by CRLF in application/config/config.php.
The file will have its original line endings in your working directory
[1mdiff --git a/application/config/autoload.php b/application/config/autoload.php[m
[1mindex 5fcf6fc..a95dc03 100644[m
[1m--- a/application/config/autoload.php[m
[1m+++ b/application/config/autoload.php[m
[36m@@ -89,7 +89,7 @@[m [m$autoload['drivers'] = array();[m
 |[m
 |	$autoload['helper'] = array('url', 'file');[m
 */[m
[31m-$autoload['helper'] = array();[m
[32m+[m[32m$autoload['helper'] = array('url');[m
 [m
 /*[m
 | -------------------------------------------------------------------[m
[1mdiff --git a/application/config/config.php b/application/config/config.php[m
[1mindex ed971ca..e70ba16 100644[m
[1m--- a/application/config/config.php[m
[1m+++ b/application/config/config.php[m
[36m@@ -23,7 +23,7 @@[m [mdefined('BASEPATH') OR exit('No direct script access allowed');[m
 | a PHP script and you can easily do that on your own.[m
 |[m
 */[m
[31m-$config['base_url'] = 'http://192.168.43.178/rest_bimba/api/';[m
[32m+[m[32m$config['base_url'] = '';[m
 [m
 /*[m
 |--------------------------------------------------------------------------[m
