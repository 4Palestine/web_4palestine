<?php

namespace App\Console\Commands;

use App\Models\Mission;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DeactivateMissionTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deactivate:missions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command will change the is_active from 1 to 0 after passing the (n) hours of each mission, so it will be deactivated';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $missions = Mission::where('is_active', 1)->get();
        foreach ($missions as $mission) {
            $duration = (integer)$mission->mission_duration * 3600; // Convert mission duration from hour to seconds
            // this will take the duration in seconds and add it to updated_at,
            // and check if the result is in the past according to current time or not
            if ($mission->updated_at->addSeconds($duration)->isPast()) {
                $mission->update([
                    'is_active' => 0
                ]);
            }
        }

        $this->info('Mission deactivation completed successfully.');
    }
}
