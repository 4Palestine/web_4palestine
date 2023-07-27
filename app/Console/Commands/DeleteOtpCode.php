<?php

namespace App\Console\Commands;

use App\Models\EmailVerification;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DeleteOtpCode extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:otpCode';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will delete the otp codes from these tables [email_verfications] and [password_reset_tokens] after 24h of being created';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        // $delay = 3600; // in seconds [3600 = 1 hour]
        $delay = 86400; // in seconds [3600 = 24 hour]

        $verifications = EmailVerification::get();
        foreach ($verifications as $verification) {
            $createdAt = Carbon::parse($verification->created_at);
            if ($createdAt->addSeconds($delay)->isPast()) {
                $verification->delete();
            }
        }

        $reset_tokens = DB::table('password_reset_tokens')->get();
        foreach ($reset_tokens as $token) {
            $createdAt = Carbon::parse($token->created_at);
            if ($createdAt->addSeconds($delay)->isPast()) {
                DB::table('password_reset_tokens')->where('email', $token->email)->delete();
            }
        }

        $this->info('Otp Code deleted successfully.');
    }
}
