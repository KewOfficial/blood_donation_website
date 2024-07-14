<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\BloodBankEvent;
use Carbon\Carbon;

class DeletePastEvents extends Command
{
    protected $signature = 'events:delete-past';
    protected $description = 'Delete past blood bank events';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $deletedEvents = BloodBankEvent::where('date', '<', Carbon::now())->delete();
        $this->info("Deleted $deletedEvents past events.");
    }
}
