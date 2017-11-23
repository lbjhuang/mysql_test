<?php
function getFilePro($file){

    if(!file_exists($file)){
        echo "目标文件不存在<br>";
        return;
    }
    if(is_file($file)){
        echo $file."是一个文件<br>";
    }

    if(is_dir($file)){
        echo $file."是一个目录<br>";
    }

    echo "文件形态：".getTypes($file)."<br>";
    echo "文件大小".getSize(filesize($file))."<br>";
    if(is_writable($file)){
        echo "文件可写<br>";
    }
    if(is_readable($file)){
        echo "文件可读<br>";
    }
    if(is_executable($file)){
        echo "文件可执行<br>";
    }
    echo "文件的建立时间：".date("Y-m-d H:i:s",filectime($file))."<br>";
    echo "文件的修改时间：".date("Y-m-d H:i:s",filemtime($file))."<br>";
    echo "文件的最后打开时间：".date("Y-m-d H:i:s",fileatime($file))."<br>";
}

function getTypes($file){
    switch(filetype($file)){
        case 'file': $type='普通文件'; break;
        case 'block': $type='块设备文件'; break;
        case 'char':  $type='字符设备文件'; break;
        case 'fifo':  $type='命名管道文件'; break;
        case 'link':  $type='符号链接'; break;
        case 'unknown': $type='未知类型'; break;
        default: $type='没有检测到类型';
    }
    return $type;
}

function getSize($bytes){
    if($bytes >= pow(2,40)){
        $num = round($bytes/pow(2,40));
        $suffix = 'T';
    } elseif($bytes >= pow(2,30)){
        $num = round($bytes/pow(2,30));
        $suffix = 'G';
    } elseif($bytes >= pow(2,20)){
        $num = round($bytes/pow(2,20));
        $suffix = 'M';
    } elseif($bytes >= pow(2,20)){
        $num = round($bytes/pow(2,10));
        $suffix = 'K';
    }else{
        $num = $bytes;
        $suffix = 'B';
    }
    return $num.' '.$suffix;
}
getFilePro('sam.php');