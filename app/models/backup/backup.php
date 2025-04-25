<?php
class Backup
{
    use Model;  
    
    public function getBackup()
    {
        $conn = $this->getConnection();  
    
        // Absolute path to the backup directory from the model
        $backupDir = __DIR__ . "/../../../public/assets/backup/";
    
        if (!file_exists($backupDir)) {
            mkdir($backupDir, 0777, true);
        }
    
        $fileName = DBNAME . "_" . date("Y-m-d_H-i-s") . ".sql";
        $filePath = $backupDir . $fileName;
    
        // mysqldump path
        $mysqldumpPath = '"C:\\xampp\\mysql\\bin\\mysqldump.exe"';
        $command = "$mysqldumpPath --user=" . DBUSER . " --password=" . DBPASS . " --host=" . DBHOST . " " . DBNAME . " > \"$filePath\" 2>&1";
    
        $output = shell_exec($command);
    
        if (file_exists($filePath) && filesize($filePath) > 0) {
            return true;
        } else {
            return false;
        }
    }
    
}
?>
