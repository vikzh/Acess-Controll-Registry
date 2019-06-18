<?php

namespace App;

use App\User;

class AccessControlRegistry implements AccessControlRegistryInterface
{
    private $requestedClass;
    private $requestedMethod;

    const ACCESS_RESTRICTIONS = [

    ];

    public function setRequests($accessRequest)
    {
        [$this->requestedClass,  $this->requestedMethod] = $accessRequest;

        return $this;
    }

    public function hasAccessForUserType($userType)
    {
        if (!array_key_exists($this->requestedClass, self::ACCESS_RESTRICTIONS)) {
            return false;
        }

        if (!array_key_exists($this->requestedMethod, self::ACCESS_RESTRICTIONS[$this->requestedClass])) {
            return false;
        }

        return in_array($userType, self::ACCESS_RESTRICTIONS[$this->requestedClass][$this->requestedMethod]);
    }
}
