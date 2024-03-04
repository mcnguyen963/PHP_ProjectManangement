<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Questionnaire Entity
 *
 * @property int $id
 * @property int $project_id
 * @property string $business_name
 * @property string|null $website
 * @property string|null $currently_used_technology
 * @property string|null $industry_of_the_client
 * @property string|null $project_proposal
 * @property \Cake\I18n\DateTime|null $completion_time
 *
 * @property \App\Model\Entity\Project $project
 */
class Questionnaire extends Entity
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
        'project_id' => true,
        'business_name' => true,
        'website' => true,
        'currently_used_technology' => true,
        'industry_of_the_client' => true,
        'project_proposal' => true,
        'completion_time' => false,
        'project' => true,
    ];
}
