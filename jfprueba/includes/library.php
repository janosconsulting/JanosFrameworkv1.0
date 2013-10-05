<?php

abstract class library{

	public static function load($type)
	{
		return call_user_func(array($type,'getInstance'));
	}
	
}