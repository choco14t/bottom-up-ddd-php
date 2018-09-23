<?php

namespace BottomUpDDD\ProductionInfrastructure\Eloquents;

use BottomUpDDD\Domain\Users\UserName;
use BottomUpDDD\Domain\Users\User;
use BottomUpDDD\Domain\Users\FullName;
use BottomUpDDD\Domain\Users\UserId;

/**
 * @property string $id
 * @property string $user_name
 * @property string $first_name
 * @property string $family_name
 * @method \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|static[]|static|null find()
 */
final class UserEloquent extends BaseEloquent
{
    public $timestamps = false;

    public $incrementing = false;

    protected $table = 'users';

    protected $fillable = [
        'id',
        'user_name',
        'first_name',
        'family_name'
    ];

    /**
     * @param UserName $userName
     * @return User|null
     */
    public function findByUserName(UserName $userName)
    {
        /** @var \Illuminate\Database\Eloquent\Collection $target */
        $target = static::whereUserName($userName->value())->get();

        if ($target->isEmpty()) {
            return null;
        }

        /** @var self $user */
        $user = $target->first();

        return new User(
            new UserName($user->user_name),
            new FullName($user->first_name, $user->family_name),
            new UserId($user->id)
        );
    }

    /**
     * @param User $user
     * @return void
     */
    public function persist(User $user)
    {
        static::updateOrCreate(
            ['id' => $user->id()->value()],
            [
                'user_name' => $user->userName()->value(),
                'first_name' => $user->fullName()->firstName(),
                'family_name' => $user->fullName()->familyName()
            ]
        );
    }

    /**
     * @param UserId $user
     * @return void
     */
    public function deleteByUserId(UserId $userId)
    {
        static::destroy($userId->value());
    }
}
