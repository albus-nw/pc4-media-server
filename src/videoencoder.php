<?php
/**
 * Modul zur Konvertierung hochgeladener Video-Files
 *
 * Der Videoencoder prüft für alle neu auf dem Server bereitgestellten Videodateien, ob
 * Container-Format,Video- und Audiocodec mit den spezifizierten Zielplattformen kompatibel
 * sind. Ergibt die Prüfung eine Inkompatibilität, wird die entsprechende Datei in ein
 * kompatibles Format formatiert und falls nötig Video- sowie Audiocodec neu kodiert.
 *
 * Zielplattformen:
 *
 *          Android ab 2.4.1, IOS (IPHONE 4), aktuelle Browser ab IE9+/Chrome/FireFox
 *
 * Bestmögliche Kompatibilität bietet ein mp4-Container mit einem h264-Videocodec und einer
 * AAC-Audiospur; Lizenzbedingungen beachten: http://www.mpegla.com/main/default.aspx
 * (http://www.heise.de/newsticker/meldung/Lizenzbedingungen-fuer-Videocodec-H-264-AVC-veroeffentlicht-88771.html)
 *
 * 2. Wahl ist das lizenzfreie webm-format (Container) mit einer V8-Video und
 * Vobis-Audiocodec. Nachteil: Möglicherweise nicht mit IOS (IPhone4) kompatibel.
 * Zusätzlich könnte für Dateien, die nicht schon zufällig in mp4-Format vorliegen, eine
 * ios-kompatible Kopie des Videos gespeichert werden.
 *
 * Änderungen des Zielformat sind über Anpassung der Werte im Abschnitt CONSTANTS & SETTINGS
 * möglich (z.B. TARGET_VIDEO_CODEC).
 *
 * Alexander Weiß 26.01.2016
 *
 * --------------------------------------------------------------------------------------
 * Cordova
 * TODO:BEACHTE https://cordova.apache.org/docs/en/3.1.0/guide/platforms/ios/config.html
 * AllowInlineMediaPlayback
 */

require(fileserver\File::DB_PASSWD_INI);
require(fileserver\File::FILESERVER_ROOT);

/*CONSTANTS & SETTINGS ******************************************************************/
const FILE_SERVER                 = '/opt/df2/storage/app/';
const TARGET_VIDEO_CODEC          = 'libx264';
const TARGET_AUDIO_CODEC          = 'aac';
const TARGET_FILE_CONTAINER       = 'mp4';
const DB=pg_connect((parse_file(fileserver\File::DB_PASSWD_INI))->pg_connect));
$SQL_QUERY_STRING            = <<<QUERY
                select id,file_name,path,url
                    from mediafile
                    WHERE transcoded = FALSE
                    and file_type='video';
QUERY;
//-----------------------------------------------------------------------------------------

/*(globale) Variablen  *******************************************************************/
$files          = pg_query($db, $SQL_QUERY_STRING);
$jobQueue       = [];
class file {

}

//------------------------------------------------------------------------------------------
//TODO: Check FileMetaDaten und jobQueue füllen

/*
$formatInfo=parse_ini_string(shell_exec("ffprobe -v error -of ini -show_format $input | sed -e 's/)//g' | sed -e 's/(//g'"),true);
$streams=array();
$size=$in['format']['size'];
*/

foreach ($files as $f) {


    json_decode(
        shell_exec("ffprobe -v error \\
                            -show_entries format=filename,size,format_name:stream=codec_name,codec_type \\
                            -of json=c=1 $f"));
}

pg_query($db, "UPDATE mediafile SET filesize=$size,transcoding=true WHERE id=$id");


if (!$files) {
    echo "Ein Fehler ist aufgetreten.\n";
    exit;
}

while ($row = pg_fetch_row($files)) {
//      echo "id: $row[0]  file_name: $row[1]".'\n';
    $input = $FILESERVER . $row[2] . $row[1];
    $id = $row[0];

}
//------------------------------------------------------------------------------------------
//TODO: Konvertierung
//------------------------------------------------------------------------------------------
?>