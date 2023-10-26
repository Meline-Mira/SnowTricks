<?php

namespace App\Validator;

use App\Repository\UserRepository;
use \Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class UserUniqueEntityValidator extends ConstraintValidator
{
    public function __construct(private UserRepository $repository)
    {
    }

    public function validate(mixed $value, Constraint $constraint): void
    {
        if (!$constraint instanceof UserUniqueEntity) {
            throw new UnexpectedTypeException($constraint, UserUniqueEntity::class);
        }

        // Tester si le username est unique ou non (en utilisant le repository injecté dans le constructeur)
        // Si c'est pas le cas, faire le addViolation
        $user = $this->repository->findOneByEmail($value->getEmail());
        if ($user !== null) {
            $this->context->buildViolation('Cet adresse email est déjà utilisée sur notre site.')
                ->atPath('email')
                ->addViolation();
        }

        $user = $this->repository->findOneByUsername($value->getUsername());
        if ($user !== null) {
            $this->context->buildViolation('Ce nom d\'utilisateur est déjà utilisé sur notre site.')
                ->atPath('username')
                ->addViolation();
        }
    }
}