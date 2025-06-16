<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class BackupDatabase extends Command
{
    protected $signature = 'database:backup';
    protected $description = 'Backup the database and store it in the storage folder';

    public function handle()
    {
        // Récupérer les informations de la base de données depuis .env
        $dbHost = env('DB_HOST', '127.0.0.1');
        $dbPort = env('DB_PORT', '3306');
        $dbUser = env('DB_USERNAME', 'root');
        $dbPassword = env('DB_PASSWORD', '');
        $dbName = env('DB_DATABASE', 'actualitetogo');

        // Nom du fichier de sauvegarde avec horodatage
        $fileName = 'backup-' . Carbon::now()->format('Y-m-d_H-i-s') . '.sql';
        $filePath = storage_path("app\\public\\backups\\{$fileName}");

        // Assurer que le dossier de sauvegarde existe
        if (!Storage::exists('backups')) {
            Storage::makeDirectory('backups');
        }

        // Construire la commande mysqldump
        $command = "mysqldump --host={$dbHost} --port={$dbPort} --user={$dbUser} --password={$dbPassword} {$dbName} > \"{$filePath}\"";

        $process = Process::fromShellCommandline($command);

        try {
            $process->mustRun();
            $this->info("Backup de la base de données créé : " . $fileName);
        } catch (ProcessFailedException $exception) {
            $this->error("Erreur lors de la sauvegarde : " . $exception->getMessage());
        }
    }
}
