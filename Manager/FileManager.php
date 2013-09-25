<?php
namespace Thrace\MediaBundle\Manager;

use Gaufrette\Exception\FileNotFound;

use Gaufrette\Filesystem;

use Thrace\MediaBundle\Model\FileInterface;

use Gaufrette\Adapter;

class FileManager extends AbstractManager implements FileManagerInterface
{   

    public function getFile(FileInterface $object)
    {
        return $this->temporaryFilesystem->get($object->getName());
    }
    
    public function getPermenentFileByKey($key)
    {
        return $this->mediaFilesystem->read($key);
    }
    
    public function copyFileToPermenentDirectory(FileInterface $object)
    {
        $tempFile = $this->temporaryFilesystem->read($object->getName());
        return $this->mediaFilesystem->write($object->getFilePath(), $tempFile, true);
    }
    
    public function removeFileFromTemporaryDirectory(FileInterface $object)
    {
        try {
            return $this->temporaryFilesystem->delete($object->getName());
        } catch (FileNotFound $e){} 
    }
    
    public function removeFileFromPermenentDirectory(FileInterface $object)
    {
        try {
            return $this->mediaFilesystem->delete($object->getFilePath());
        } catch (FileNotFound $e){} 
    }
    
    public function removeAllFiles(FileInterface $object)
    {
        $this->removeFileFromTemporaryDirectory($object);
        $this->removeFileFromPermenentDirectory($object);
    }
}