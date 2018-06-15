<?php
/**
 * Created by PhpStorm.
 * User: haoyanfei <haoyanfei@putao.com>
 * DateTime: 17/5/31 上午10:37
 */

namespace Kerisy\Database;


trait Util
{
    public function causedByLostConnection($message)
    {
        return self::contains($message, [
            'server has gone away',
            'no connection to the server',
            'Lost connection',
            'is dead or not enabled',
            'Error while sending',
            'decryption failed or bad record mac',
            'server closed the connection unexpectedly',
            'SSL connection has been closed unexpectedly',
            'Deadlock found when trying to get lock',
            'Error writing data to the connection',
            'Resource deadlock avoided',
        ]);
    }

    public static function contains($haystack, $needles)
    {
        foreach ((array)$needles as $needle) {
            if ($needle != '' && mb_strpos($haystack, $needle) !== false) {
                return true;
            }
        }
        return false;
    }
}