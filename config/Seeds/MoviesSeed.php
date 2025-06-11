<?php
declare(strict_types=1);

use Migrations\BaseSeed;

/**
 * Movies seed.
 */
class MoviesSeed extends BaseSeed
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
            ['name' => 'Iron Man', 'actor_id' => 1, 'created' => $now, 'modified' => $now],
            ['name' => 'Sherlock Holmes', 'actor_id' => 1, 'created' => $now, 'modified' => $now],
            ['name' => 'Avengers', 'actor_id' => 1, 'created' => $now, 'modified' => $now],
            ['name' => 'Lucy', 'actor_id' => 2, 'created' => $now, 'modified' => $now],
            ['name' => 'Black Widow', 'actor_id' => 2, 'created' => $now, 'modified' => $now],
            ['name' => 'Marriage Story', 'actor_id' => 2, 'created' => $now, 'modified' => $now],
            ['name' => 'Inception', 'actor_id' => 3, 'created' => $now, 'modified' => $now],
            ['name' => 'Titanic', 'actor_id' => 3, 'created' => $now, 'modified' => $now],
            ['name' => 'The Revenant', 'actor_id' => 3, 'created' => $now, 'modified' => $now],
            ['name' => 'Shawshank Redemption', 'actor_id' => 4, 'created' => $now, 'modified' => $now],
            ['name' => 'Se7en', 'actor_id' => 4, 'created' => $now, 'modified' => $now],
            ['name' => 'Bruce Almighty', 'actor_id' => 4, 'created' => $now, 'modified' => $now],
            ['name' => 'La La Land', 'actor_id' => 5, 'created' => $now, 'modified' => $now],
            ['name' => 'Cruella', 'actor_id' => 5, 'created' => $now, 'modified' => $now],
            ['name' => 'Easy A', 'actor_id' => 5, 'created' => $now, 'modified' => $now],
        ];

        $table = $this->table('movies');
        $table->insert($data)->save();
    }
}
