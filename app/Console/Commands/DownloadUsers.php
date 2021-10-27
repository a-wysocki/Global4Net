<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\User;

class DownloadUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:download-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parser';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $url="https://reqres.in/api/users?page=2";
                
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL,$url);
        $result=curl_exec($ch);
        curl_close($ch);
 //var_dump($result);
        $users = json_decode($result, true);
        $clean_users = User::where('id','>',0)->delete();
        foreach($users["data"] as $user) {
            $user2 = new User();
            $user2->email = $user["email"];
            $user2->first_name = $user["first_name"];
            $user2->last_name = $user["last_name"];
            $user2->avatar = $user["avatar"];
            $user2->save();
        }

        return Command::SUCCESS;
    }
}
