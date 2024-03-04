<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Project Entity
 *
 * @property int $id
 * @property int $client_id
 * @property string $semester
 * @property string $status
 * @property \Cake\I18n\DateTime|null $last_contact
 * @property string $level_of_necessity
 * @property string|null $description
 * @property string|null $internal_comments
 * @property bool $attend_meet_and_greet
 *
 * @property \App\Model\Entity\Client $client
 * @property \App\Model\Entity\Questionnaire[] $questionnaires
 */
class Project extends Entity
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
        'client_id' => true,
        'semester' => true,
        'status' => true,
        'last_contact' => true,
        'level_of_necessity' => true,
        'description' => true,
        'internal_comments' => true,
        'attend_meet_and_greet' => true,
        'client' => true,
        'questionnaires' => true,
        ' ' => true,
    ];

    protected function _getMeetingString(){
        $temp="False";
        if ($this->general_availability==1){
            $temp="True";
        }
        return $temp;
    }

    // Virtual fields of Projects (client's firstname client's surname's Project (semester, status))
    protected function _getFullName() {
        return $this->client->first_name . " " . $this->client->surname . "'s Project (" . $this->semester . ", " . $this->status . ")";
    }
}
