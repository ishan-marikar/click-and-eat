<?php
/**
 * Developed by : Ishan Marikar (ishan.marikar@outlook.com)
 * Started on   : 12/29/2014 at 8:22 PM
 * Project name : FinalProjectClickAndEat
 *
 * When I wrote this, only God and I understood what I was doing.
 * Now, God only knows.
 *
 * For the brave souls who get this far: You are the chosen ones,
 * the valiant knights of programming who toil away, without rest,
 * fixing our most awful code. To you, true saviors, kings of men,
 * I say this: never gonna give you up, never gonna let you down,
 * never gonna run around and desert you. Never gonna make you cry,
 * never gonna say goodbye. Never gonna tell a lie and hurt you.
 *
 */
class CryptUtils{

  public static function encrypt($pureString) {
      include_once("crypt.private.inc");
      $ivSize = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
      $iv = mcrypt_create_iv($ivSize, MCRYPT_RAND);
      $encryptedString = mcrypt_encrypt(MCRYPT_BLOWFISH, ENCRYPTION_KEY , utf8_encode($pureString), MCRYPT_MODE_ECB, $iv);
      return $encryptedString;
  }

  /**
   * Returns decrypted original string
   */
  public static function decrypt($encryptedString) {
      include_once("crypt.private.inc");
      $ivSize = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
      $iv = mcrypt_create_iv($ivSize, MCRYPT_RAND);
      $decryptedString = mcrypt_decrypt(MCRYPT_BLOWFISH, ENCRYPTION_KEY, $encryptedString, MCRYPT_MODE_ECB, $iv);
      return $decryptedString;
  }
}
?>