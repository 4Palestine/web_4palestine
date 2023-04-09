<?php

namespace App\Console\Commands;

use App\Models\Mission;
use Illuminate\Console\Command;

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
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $missions = Mission::where('is_active', 1)->get();

        foreach ($missions as $mission) {
            $duration = (integer)$mission->mission_duration * 3600; // Convert mission duration from hour to seconds

            if ($mission->updated_at->addSeconds($duration)->isPast()) {
                $mission->update([
                    'is_active' => 0
                ]);
            }
        }

        $this->info('Mission deactivation completed successfully.');
    }
}
