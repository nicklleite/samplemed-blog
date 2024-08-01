<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Post Entity
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $category_id
 * @property string|null $title
 * @property string|null $slug
 * @property string|null $subtitle
 * @property string|null $full_text
 * @property string|null $tags
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\Comment[] $comments
 */
class Post extends Entity
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
        'category_id' => true,
        'title' => true,
        'slug' => true,
        'subtitle' => true,
        'full_text' => true,
        'tags' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'category' => true,
        'comments' => true,
    ];
}
