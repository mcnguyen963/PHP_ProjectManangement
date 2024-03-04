<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Client Entity
 *
 * @property int $id
 * @property string $email
 * @property string $first_name
 * @property string $surname
 * @property string $phone_number
 * @property string $address
 *
 * @property \App\Model\Entity\Project[] $projects
 */
class Client extends Entity
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
        'email' => true,
        'first_name' => true,
        'surname' => true,
        'phone_number' => true,
        'address' => true,
        'projects' => true,
    ];

    // Virtual fields of Clients (firstname surname (email))
    protected function _getFullNameEmail() {
        return $this->first_name . " " . $this->surname . " (" . $this->email . ")";
    }
}
