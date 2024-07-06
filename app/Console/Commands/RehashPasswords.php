<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RehashPasswords extends Command
{
    protected $signature = 'rehash:passwords';
    protected $description = 'Rehash all user passwords using Bcrypt';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $users = User::all();
        
        foreach ($users as $user) {
            // Assuming the old password is stored in plain text (for demonstration purposes)
            // In a real scenario, you'd need the original plain text passwords to rehash them correctly
            if ($user->user_id) {
                $user->password = Hash::make($user->password);
                $user->save();
            }
        }

        $this->info('All passwords have been rehashed.');
    }
}
