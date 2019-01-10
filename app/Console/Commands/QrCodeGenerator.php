<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\AttendanceQr;
use App\Klase;
use Carbon\Carbon;

class QrCodeGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {
        echo 'Running';
        $klases = Klase::all();
        foreach($klases as $klase){
            $qrcode = new AttendanceQr;
            $qrcode->class_id = $klase->class_id;
            $qrcode->qrcode = Carbon::now().str_random(6);
            $qrcode->save();
        }
    }
}
