<?php
class FileSystem{

    /**
     * 删除目录及子文件
     * @param $directory
     */
    public function delDir($directory){
        if(file_exists($directory)){
            if($dir_handle=@opendir($directory)){
                while ($filename=readdir($dir_handle)){
                    if($filename!='.'&&$filename!=".."){
                        $subFile=$directory."/".$filename;
                        if(is_dir($subFile)){
                            $this->delDir($subFile);
                        }
                        if(is_file($subFile)){
                            unlink($subFile);
                        }
                    }
                }
                closedir($dir_handle);
                rmdir($directory);
            }
        }
    }

    /**
     * 复制目录
     * @param $dirSrc
     * @param $dirTo
     */
    public function copyDir($dirSrc,$dirTo){
        if(is_file($dirTo)){
            echo "目标不是目录不能创建";
            return;
        }
        if(!file_exists($dirTo)){
            @mkdir($dirTo);
        }
        if($dir_handle=@opendir($dirSrc)){
            while ($filename=readdir($dir_handle)){
                if($filename!="."&&$filename!=".."){
                    $subSrcFile=$dirSrc."/".$filename;
                    $subToFile=$dirTo."/".$filename;
                    if(is_dir($subSrcFile)){
                        $this->copyDir($subSrcFile,$subToFile);
                    }
                    if(is_file($subSrcFile)){
                        copy($subSrcFile,$subToFile);
                    }
                }
            }
        }
    }
}