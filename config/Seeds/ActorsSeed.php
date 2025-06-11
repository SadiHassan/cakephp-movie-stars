<?php
declare(strict_types=1);

use Migrations\BaseSeed;

/**
 * Actors seed.
 */
class ActorsSeed extends BaseSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/migrations/4/en/seeding.html
     *
     * @return void
     */
    public function run(): void
    {
        $now = date('Y-m-d H:i:s');
        $data = [
            ['name' => 'Robert Downey Jr.', 'created' => $now, 'modified' => $now],
            ['name' => 'Scarlett Johansson', 'created' => $now, 'modified' => $now],
            ['name' => 'Leonardo DiCaprio', 'created' => $now, 'modified' => $now],
            ['name' => 'Morgan Freeman', 'created' => $now, 'modified' => $now],
            ['name' => 'Emma Stone', 'created' => $now, 'modified' => $now],
        ];

        $table = $this->table('actors');
        $table->insert($data)->save();
    }
}
