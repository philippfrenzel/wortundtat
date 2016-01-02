<?php

namespace app\models;

use dektrium\user\models\User AS BaseUser;

/**
 * Class User
 * @package app\models
 * @copy Frenzel GmbH <Philipp Frenzel>
 */
class User extends BaseUser
{
    /**
     * @param mixed $token
     * @param null $type
     * @return null|static
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['auth_key' => $token]);
    }

}