<?php

namespace App\Console\Commands;

use App\Jobs\SendTaskDueReminder;
use Illuminate\Console\Command;
use App\Models\Task;
use Illuminate\Support\Facades\Mail;
use App\Mail\TaskDueReminder;
use Carbon\Carbon;

class CheckDueTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-due-tasks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Fetch tasks due in the next three hours
        $now = now()->format('Y-m-d\TH:i:s.u\Z');

        $dueTasks = Task::whereBetween('due_date', [$now, Carbon::parse($now)->addHours(6)])
            ->where('email_sent', false)
            ->get();
        // Send reminder email for each due task
        foreach ($dueTasks as $task) {
            // Dispatch the job to send the reminder email
            SendTaskDueReminder::dispatch($task);

            // Update the task to mark that the email has been sent
            $task->update(['email_sent' => true]);
        }
        $this->info('Emails queued for sending');

    }
}
