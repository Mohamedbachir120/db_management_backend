<?php

namespace App\Http\Helpers;

class Crypto
{
    const METHOD = 'aes-256-ctr';
    
    /**
     * Encrypts (but does not authenticate) a message
     * 
     * @param string $message - plaintext message
     * @param string $key - encryption key (raw binary expected)
     * @param boolean $encode - set to TRUE to return a base64-encoded 
     * @return string (raw binary)
     */
    public static function encrypt($message, $encode = true)
    {
        $nonceSize = openssl_cipher_iv_length(self::METHOD);
        $nonce = openssl_random_pseudo_bytes($nonceSize);
        
        $ciphertext = openssl_encrypt(
            $message,
            self::METHOD,
            hex2bin('000102030405060708090a0b0c0d0e0f101112131415161718191a1b1c1d1e1f'),
            OPENSSL_RAW_DATA,
            $nonce
        );
        
        // Now let's pack the IV and the ciphertext together
        // Naively, we can just concatenate
        if ($encode) {
            return base64_encode($nonce.$ciphertext);
        }
        return $nonce.$ciphertext;
    }
    
    /**
     * Decrypts (but does not verify) a message
     * 
     * @param string $message - ciphertext message
     * @param string $key - encryption key (raw binary expected)
     * @param boolean $encoded - are we expecting an encoded string?
     * @return string
     */
    public static function decrypt($message, $encoded = true)
    {
        if ($encoded) {
            $message = base64_decode($message, true);
            if ($message === false) {
                throw new Exception('Encryption failure');
            }
        }

        $nonceSize = openssl_cipher_iv_length(self::METHOD);
        $nonce = mb_substr($message, 0, $nonceSize, '8bit');
        $ciphertext = mb_substr($message, $nonceSize, null, '8bit');
        
        $plaintext = openssl_decrypt(
            $ciphertext,    
            self::METHOD,
            hex2bin('000102030405060708090a0b0c0d0e0f101112131415161718191a1b1c1d1e1f'),
            OPENSSL_RAW_DATA,
            $nonce
        );
        
        return $plaintext;
    }
}

?>