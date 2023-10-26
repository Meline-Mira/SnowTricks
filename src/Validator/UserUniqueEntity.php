<?php

namespace App\Validator;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraint;

#[\Attribute]
class UserUniqueEntity extends Constraint
{
    public function __construct()
    {
        parent::__construct([]);
    }

    public function getTargets()
    {
        return ['class'];
    }
}