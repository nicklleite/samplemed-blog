<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'role_id' => 1,
                'email' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'access_token' => 'Lorem ipsum dolor sit amet',
                'secrect_token' => 'Lorem ipsum dolor sit amet',
                'refresh_token' => 'Lorem ipsum dolor sit amet',
                'status' => 1,
                'created' => 1722488739,
                'activated' => 1722488739,
                'modified' => 1722488739,
            ],
        ];
        parent::init();
    }
}
