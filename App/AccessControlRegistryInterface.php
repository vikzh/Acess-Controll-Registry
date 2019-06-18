<?php

namespace App;

interface AccessControlRegistryInterface
{
    public function setRequests($accessRequest);
    public function hasAccessForUserType($userType);
}
