<?php
function backDb($host, $user, $pass, $dbname, $tables = '*'){
        //Aqui preparo la conexion a la base de datos.
        
        $conn = new mysqli($host, $user, $pass, $dbname);
        if ($conn->connect_error) {
        die("La conexión falló: " . $conn->connect_error);
        }
        $fecha = date("Ymd-His");
        //Mando a llamar todas las tablas relacionadas a la base de datos.
        if($tables == '*'){
            $tables = array();
            $sql = "SHOW TABLES";
            $query = $conn->query($sql);
            while($row = $query->fetch_row()){
                $tables[] = $row[0];
            }
        }
        else{
            $tables = is_array($tables) ? $tables : explode(',',$tables);
            
        }

        //Obtenga cada una de las estructuras de las tablas.
        $outsql = '';
        foreach ($tables as $table) {
    
        //Preparar SQLscript para crear la estructura de la tabla
        $sql = "SHOW CREATE TABLE $table";
        $query = $conn->query($sql);
        $row = $query->fetch_row();
        
        $outsql .= "\n\n" . $row[1] . ";\n\n";
        
        $sql = "SELECT * FROM $table";
        $query = $conn->query($sql);
        
        $columnCount = $query->field_count;
 
        //Prepare SQLscript para sacar datos de cada tabla
        for ($i = 0; $i < $columnCount; $i ++) {
            while ($row = $query->fetch_row()) {
        $outsql .= "INSERT INTO $table VALUES(";
            for ($j = 0; $j < $columnCount; $j ++) {
        $row[$j] = $row[$j];

        if (isset($row[$j])) {
            $outsql .= '"' . $row[$j] . '"';
            } else {
                $outsql .= '""';
            }
            if ($j < ($columnCount - 1)) {
                $outsql .= ',';
                    }
                }
            $outsql .= ");\n";
            }
        }
    
        $outsql .= "\n"; 
        
        }

        //Guarde el script SQL en un archivo de copia de seguridad
        $backup_file_name = $dbname . '_'.$fecha.'.sql';
        
        $fileHandler = fopen($backup_file_name, 'w+');
        fwrite($fileHandler, $outsql);
        fclose($fileHandler);
        
        //Hago la funcion de descargar el archivo de copia de seguridad de SQL en el navegador
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($backup_file_name));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($backup_file_name));
        ob_clean();
        flush();
        readfile($backup_file_name);
        exec('rm ' . $backup_file_name); 
        unlink($backup_file_name);
        
            
    }
    

?>