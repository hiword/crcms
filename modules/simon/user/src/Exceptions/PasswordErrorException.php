<?php
namespace Simon\User\Exceptions;
use App\Exceptions\AppException;
class PasswordErrorException extends AppException
{
	const  APP_CODE = 1020;
	
	const  HTTP_CODE = 403;
}