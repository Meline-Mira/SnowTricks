<?php

namespace App\Factory;

use App\Entity\Trick;
use App\Repository\TrickRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Trick>
 *
 * @method        Trick|Proxy                     create(array|callable $attributes = [])
 * @method static Trick|Proxy                     createOne(array $attributes = [])
 * @method static Trick|Proxy                     find(object|array|mixed $criteria)
 * @method static Trick|Proxy                     findOrCreate(array $attributes)
 * @method static Trick|Proxy                     first(string $sortedField = 'id')
 * @method static Trick|Proxy                     last(string $sortedField = 'id')
 * @method static Trick|Proxy                     random(array $attributes = [])
 * @method static Trick|Proxy                     randomOrCreate(array $attributes = [])
 * @method static TrickRepository|RepositoryProxy repository()
 * @method static Trick[]|Proxy[]                 all()
 * @method static Trick[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Trick[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static Trick[]|Proxy[]                 findBy(array $attributes)
 * @method static Trick[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static Trick[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class TrickFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function getDefaults(): array
    {
        return [
            'creationDate' => self::faker()->dateTime(),
            'description' => self::faker()->text(),
            'groupTrick' => GroupFactory::random(),
            'name' => self::faker()->text(60),
            'slug' => self::faker()->text(100),
        ];
    }

    protected static function getClass(): string
    {
        return Trick::class;
    }
}
