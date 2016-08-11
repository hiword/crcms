<?php 
echo 3;
interface A {
	
	public function b() : Exception;
	
}

class C implements A
{
	/* 
	 * (non-PHPdoc)
	 * @see A::b()
	 * @author simon
	 */
	public function b(): Exception
	{
		// TODO Auto-generated method stub
		$a = 1;
		if ($a !== 1)
		{echo 2;
			return true;
			
		}
		
		throw new Exception('abc');
	}

	
}
try {
	(new C())->b();
} catch (Exception $e)
{
	echo $e->getMessage();
}


