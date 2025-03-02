<?php

namespace DotEnv;

class DotEnv {

    /**
     * This method is responsable to fill the environment variabels with the .env
     * 
     * @param string $envPath
     * @return bool
     */
    public static function fill(string $envPath){
        if(file_exists($envPath)) {
            $openedFile = fopen($envPath, 'r');
            
            while(!feof($openedFile)) {
                $line = fgets($openedFile);     
                
                if(strlen($line) <= 1){
                    continue;
                }

                putenv(trim($line));
            }

            fclose($openedFile);
        
            return true;
        }
        return false;
    }
}