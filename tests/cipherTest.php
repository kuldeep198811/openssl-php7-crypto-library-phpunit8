<?php
namespace MyApp;

use PHPUnit\Framework\TestCase;

/*
 * This is a test class to verify the functionality of crypto library
 * The purpose of this class is to provide the test cases for encryption and decryption testing
 * source code.
*/
class CihperTest extends TestCase
{
	/**
     * This variable contains the value default input value
     *
     * @var string
    */
	public $inputVal  =  'kuldeep';
	
	/**
	 * Checking encryption function and its return value
	 *
	 * @param string
	 * @return void
	*/
	public function testEncryptionReturnValue()
	{
		$encrypt   =  cipher::encrypt($this->inputVal);
		$this->assertIsString($encrypt);
	}
	
	/**
	 * Checking decryption function and its return value
	 *
	 * @param string
	 * @return void
	*/
	public function testDecryptionReturnValue()
	{		
		$encrypt   =  cipher::encrypt($this->inputVal);
		$decrypt   =  cipher::decrypt($encrypt);
		$this->assertIsString($decrypt);
	}
	
	/**
	 * Checking decryption with passed inputVal, That should be always equals after decryption
	 *
	 * @param string
	 * @return void
	*/
    public function testEncryptionDecryptionCheck()
    {
		$encrypt   =  cipher::encrypt($this->inputVal);
		$decrypt   =  cipher::decrypt($encrypt);
		
        $this->assertEquals(
            $this->inputVal,
            $decrypt
        );
    }
}