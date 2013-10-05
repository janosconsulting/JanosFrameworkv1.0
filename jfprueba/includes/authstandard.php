<?php
class authstandard implements authenticatorinterface
{
	public function authenticate(user $user, $password){
        
        $users = new usercollection();
        $users->getwithdata();
        //var_dump($users);
        $var = 0;
        foreach ($users as $val) {
        	if($val->password==$password && $val->name==$user->name)
        	{
                 $var = 1;
                 $user->__set('id',$val->id);
                 break;
        	}
            else
            {
            	$var = 0;
            	break;
            }
        }
        if($var == 1){
        	return true;
        }
        else{
        	return false;
        }
		
	}
}