<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Student Entity
 *
 * @property int $id
 * @property string $nis
 * @property string $name
 * @property string $userame
 * @property string $password
 * @property string|null $email
 * @property string $phone
 * @property string|null $address
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int|null $level_id
 *
 * @property \App\Model\Entity\Level $level
 * @property \App\Model\Entity\Answer[] $answers
 * @property \App\Model\Entity\Result[] $results
 */
class Student extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'nis' => true,
        'name' => true,
        'userame' => true,
        'password' => true,
        'email' => true,
        'phone' => true,
        'address' => true,
        'created' => true,
        'modified' => true,
        'level_id' => true,
        'level' => true,
        'answers' => true,
        'results' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}
