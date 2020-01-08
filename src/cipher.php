<?php
namespace MyApp;

/*
 * This package is Open Source plugable Encyption Client Library.
 * The purpose of this class is to provide the secure encryption for any input value.
 * source code.
*/
class Cipher
{
	/**
     * This variable contains the value of unique hash code
     *
     * @var string
    */
    static private $securekey;
    
	/**
	 * Generating unique secretkey
	 *
	 * @param string
	 * @return void
	*/
    function __construct()
    {
        self::$securekey =  (floor(phpversion()) >= 7)? bin2hex(random_bytes(32)):bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
    }

	/**
	 * Encyrpt given text using OpenSSL crypto method
	 *
	 * @param string
	 * @return string
	*/
    public static function encrypt(string $inputVal):string
	{
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        $encrypted = openssl_encrypt($inputVal, 'aes-256-cbc', self::$securekey, 0, $iv);
        return base64_encode($encrypted . '::' . $iv);
	}

	/**
	 * Decrypt given encrypt value using OpenSSL crypto method
	 *
	 * @param string
	 * @return string
	*/
    public static function decrypt(string $encyptedInput):string
	{
        list($encrypted_data, $iv) = explode('::', base64_decode($encyptedInput), 2);
        return openssl_decrypt($encrypted_data, 'aes-256-cbc', self::$securekey, 0, $iv);
    }
}
