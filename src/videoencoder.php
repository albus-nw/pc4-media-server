<?php
/**
 * Modul zur Konvertierung hochgeladener Video-Files
 *
 * TODO: Funktionsweise beschreiben
 * Alexander Weiß 26.01.2016
 */

/*CONSTANTEN & Settings********************************************************************/
/**
 * @var  $FILESERVER                 absolute Pfad zu root-Verzeichins des Fileservers
 */
$FILESERVER = '/opt/df2/storage/app/';
$ffprobeParamVideoStream = ''
//-----------------------------------------------------------------------------------------

/*(globale) Variablen  *******************************************************************/

/** @var $db Datenbankverbindung */
$db = pg_connect("host=localhost port=5432 dbname=placity user=placity password=placity");
$files = pg_query($db, "SELECT id,file_name,path FROM mediafile where transcoded=false");
$jobQueue = [];
$fileMetaData = json_decode('{  "location"{
                                    "inputfile" :"" ,
                                    "outputFile":"",
                                    "size"      :0,
                                    ""          :""
                                    },
                                 "video" {
                                    "vCodec"    :"",
                                    "aCodec"    :"",
                                    "vBitRate"  :0,
                                    "height"    :0,
                                    "width"     :0,
                                    "frames"    :0
                                    }
                                }'
                                },TRUE);


//------------------------------------------------------------------------------------------
//TODO: Check FileMetaDaten und jobQueue füllen
//------------------------------------------------------------------------------------------
//TODO: Konvertierung
//------------------------------------------------------------------------------------------
?>