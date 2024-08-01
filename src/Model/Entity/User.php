<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property int|null $role_id
 * @property string|null $email
 * @property string|null $password
 * @property string|null $access_token
 * @property string|null $secrect_token
 * @property string|null $refresh_token
 * @property int|null $status
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $activated
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\Blacklist[] $blacklist
 * @property \App\Model\Entity\Comment[] $comments
 * @property \App\Model\Entity\Post[] $posts
 */
class User extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'role_id' => true,
        'email' => true,
        'password' => true,
        'access_token' => true,
        'secrect_token' => true,
        'refresh_token' => true,
        'status' => true,
        'created' => true,
        'activated' => true,
        'modified' => true,
        'role' => true,
        'blacklist' => true,
        'comments' => true,
        'posts' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var list<string>
     */
    protected array $_hidden = [
        'password',
    ];
}
