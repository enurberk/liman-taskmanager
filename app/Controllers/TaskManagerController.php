<?php
namespace App\Controllers;

use Liman\Toolkit\Shell\Command;

class TaskManagerController
{
	function getList()
    {
        // Komut çalıştırdık
        $cmd = Command::runSudo("ps -Ao user,pid,pcpu,stat,unit,pmem,comm --sort=-pcpu");

        // Komutu newline ile böldük
        $cmd = explode("\n", $cmd);

        // İlk satırı attık
        array_splice($cmd, 0, 1);

        // her satır üzerinde işlem yapalım.
        foreach ($cmd as $key => &$process)
        {
            // fazlalık boşluklarımı sildim
            $process = preg_replace('/\s+/', ' ', $process);

            // boşluklara göre parçalayalım
            $process = explode(" ", $process);

            // veriyi formatlayalim
            $process = [
                "user" => $process[0],
                "pid" => $process[1],
                "cpu" => $process[2],
                "status" => $process[3],
                "service" => $process[4],
                "ram" => $process[5],
                "command" => $process[6]
            ];
        }

        return view("table", [
            "value" => $cmd,
            "display" => ["user", "pid", "cpu", "status", "service", "ram", "command"],
            "title" => ["Kullanıcı", "PID", "% İşlemci", "Durum", "Servis", "% Bellek", "İşlem"],
            "menu" => [
                "Dosya Konumu" => [
                    "target" => "jsGetFileLocation",
                    "icon" => "fa-location-arrow"
                ],
                "Servis Durumu" => [
                    "target" => "jsGetServisStat",
                    "icon" => "fa-location-arrow"
                ],
                "İşlemi Sonlandır" => [
                    "target" => "jsKillPid",
                    "icon" => "fa-location-arrow"
                ],
                "Tüm İşlemi Sonlandır" => [
                    "target" => "jsKillAll",
                    "icon" => "fa-location-arrow"
                ],
                "İşlem Ağacı" => [
                    "target" => "jsProcessTree",
                    "icon" => "fa-location-arrow"
                ],
                "Çalışma Argümanı" => [
                    "target" => "jsRunArgumants",
                    "icon" => "fa-location-arrow"
                ],
            ]
        ]);
    }

    function getFileLocation()
    {
        validate([
            "pid" => "required|numeric"
        ]);

        $location = Command::runSudo("readlink -f /proc/@{:pid}/exe", [
            "pid" => request("pid")
        ]);

        return respond($location);
    }

    function getServiceStat()
    {
        validate([
            "service" => "required|string"
        ]);

        $service = Command::runSudo("systemctl status @{:service}", [
            "service" => request("service")
        ]);

        return respond($service);
    }

    function killPid()
    {
        validate([
            "pid" => "required|string"
        ]);

        $command = Command::runSudo("kill @{:pid}", [
            "pid" => request("pid")
        ]);

        return respond($command);
    }

    function killAllCommand()
    {
        validate([
            "command" => "required|numeric"
        ]);

        $command = Command::runSudo("pkill @{:command}", [
            "command" => request("command")
        ]);

        return respond($command);
    }

    function processTree()
    {
        $command = Command::runSudo("pstree");

        return respond($command);
    }

    function runArgumentsPid()
    {
        validate([
            "pid" => "required|numeric"
        ]);

        $runAr = Command::runSudo("ps -fp @{:pid}", [
            "pid" => request("pid")
        ]);

        $runAr = explode("\n", $runAr);

        array_splice($runAr, 0, 1);

        return respond($runAr);
    }
}
