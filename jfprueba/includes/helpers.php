<?php

abstract class helpers{

	public static function load($type)
	{
		return call_user_func(array($type,'getInstance'));
	}
	
}