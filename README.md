# One line file protection with PHP

This file enables you to protect any file by just including it in the header.

```php
include_once("secure.php");
```

# Setup

Change below parameters in the secure.php file
```php
	/**    TIMEOUT  - Minutes * */
	const TIMEOUT_MINUTES = 43200;
	/**   Time after which user can re-attempt to login - Minutes * */
	const ATTEMPT_COOKIE = 5;
	/**   Number Of Login Attempts allowed * */
	const ATTEMPTS = 5;
	/**   USERNAME  * */
	const USERNAME = "YOURUSERNAME";
	/**    PASSWORD  * */
	const PASSWORD = "YOURPASSWORD";
	/**    LOGIN FORM TITLE  * */
	const LOGIN_NAME = "TITLE";
```
