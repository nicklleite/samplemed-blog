<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Blacklist Entity
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $last_ip_address
 * @property string|null $reason
 * @property \Cake\I18n\DateTime|null $blocked
 *
 * @property \App\Model\Entity\User $user
 */
class Blacklist extends Entity
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
        'user_id' => true,
        'last_ip_address' => true,
        'reason' => true,
        'blocked' => true,
        'user' => true,
    ];
}
