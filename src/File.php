<?php
/**
 * Created by PhpStorm.
 * User: alexander weiß
 * Date: 28.01.2016
 */

namespace fileserver;


/**
 * Class File
 * @package fileserver
 */
class File
{
    //--------------------------------------------------------------------------------
    // static section: Settings & UTILITIES
    //--------------------------------------------------------------------------------
    /**
     * Pfad zum root-Verzeichnis des Fileserver
     * FILESERVER_ROOT + file->$path + file->filename -> fileDescriptor (fd)
     * @var string
     */
    const FILESERVER_ROOT   = '/opt/df2/storage/app';
    const DB_PASSWD_INI     = __DIR__ . '/DB_PASSWD.ini';

    //--------------------------------------------------------------------------------
    // property section
    //--------------------------------------------------------------------------------
    /**
     * @var integer
     */
    protected $id;
    /**
     * @var string
     */
    protected $filename;
    /**
     * @var string
     */
    protected $path;
    /**
     * @var string
     */
    protected $url;
    /**
     * TODO unötig!!!
     * @var integer
     */
    protected $public;
    /**
     * Typ des Mediums {AUDIO|VIDEO|IMG}
     * @var string
     */
    protected $fileType;
    /**
     * Speicherbelegung durch Datei in Byte
     * @var integer
     */
    protected $fileSize;
    /**
     * User-ID des Eigentümers der Datei und Rechte
     * @var integer
     */
    protected $ownerId;
    /**
     * true, solange file neu codiert wird
     * @var boolean
     */
    protected $encoding;
    /**
     * Datei liegt im kompatiblen Dateiformat vor
     * @var boolean
     */
    protected $encoded;

    //--------------------------------------------------------------------------------
    // method section
    //--------------------------------------------------------------------------------
    /**
     * File constructor.
     */
    public function __construct()
    {

    }


}