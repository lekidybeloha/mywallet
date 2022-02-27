<?php

namespace App\Console\Commands;

use App\Models\Revenu;
use App\Models\Total;
use App\Services\Mouvement;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateUserRevenu extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:revenu';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cette commande met à jour automatiquement le montant des revenus des utilisateurs lors de la date de reception';
    protected $mouvement;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->mouvement = new Mouvement();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $all    = Revenu::all();
        $today  = Carbon::today()->format('d');
        foreach($all as $one)
        {
            if($one->date_appro == $today)
            {
                $this->mouvement->move($one->id_user, $one->montant, $one->id_source);
            }
        }
    }
}
