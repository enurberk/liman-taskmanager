<?php
namespace App\Controllers;

use Liman\Toolkit\Shell\Command;

class FileManagerController
{
	function getList()
    {
        // cd /liman/extensions/taskmanager; ls -la
        // Komut çalıştırdık
        $cmd = Command::run("cd /home/sisadmin; ls -la");
        //$cmd = Command::runSudo("ps -Ao user,pid,pcpu,stat,unit,pmem,comm --sort=-pcpu");
        
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
                "permission" => $process[0],
                "linkCount" => $process[1],
                "owner" => $process[2],
                "group" => $process[3],
                "size" => $process[4],
                "month" => $process[5],
                "day" => $process[6],
                "year" => $process[7],
                "fileName" => $process[8]
            ];
        }

        return view("table", [
            "value" => $cmd,
            "display" => ["owner", "group", "size", "month", "day", "year", "fileName", "permission"],
            "title" => ["Dosya Sahibi", "Grup", "Dosya Boyutu", "Ay", "Gün", "Saat/Yıl", "Dosya Adı","izinler"],
            "menu" => [
                "Dosya Silme" => [
                    "target" => "jsDeleteFile",
                    "icon" => "fa-location-arrow"
                ]
            ]
        ]);
    }
    
    function deleteFile()
    {
        validate([
            "fileName" => "required|string"
        ]);

        $fileName = Command::runSudo("rm -rf @{:fileName}", [
            "fileName" => request("fileName")
        ]);

        return respond($fileName);
    }

}
