<?php
header("Content-type: text/html; charset=utf-8");
/**
     * 输入文件夹名
     * 获取文件夹里文件名
     * 输出
     * EN01.jpg#EN02.jpg#EN03.jpg#EN04.jpg#EN05.jpg#EN06.jpg#EN07.jpg#EN08.jpg#EN09.jpg#EN10.jpg#EN11.jpg#EN12.jpg#EN13.jpg#EN14.jpg
     */
    function get_file_list($path,&$arr)
    {
        //$arr = [];//存放文件名
        //$i=0;
        //$path='D:\image\test';//路径
        //$path='E:\360Downloads';//路径
        if(is_dir($path)){
            //$path=iconv('utf-8','gb2312',$path);
        	if($handler = opendir($path)){
        		while (($filename = readdir($handler)) !== false) {
	            	//$filename=iconv('gb2312','utf-8',$filename);
                    if ($filename != "." && $filename != "..") {
                        //$filename=iconv('gb2312','utf-8',$filename);
	                //array_push($arr, $filename);
	            		//$arr[$i]=$filename;
	            		//$i=$i+1;
                        //$filename=iconv('utf-8','gb2312',$filename);
	            		get_file_list($path.'/'.$filename,$arr);
	            	    //$filename=iconv('gb2312','utf-8',$filename);
                    }//if$filename
        		}//while
		        
		        closedir($handler);
        	}//ifopendir当前目录中的文件夹下的文件夹
        }//if(is_dir
        if(is_file($path)){//ifis_dir
            //$path=iconv('gb2312','utf-8',$path);
            //$path=iconv('utf-8','gb2312',$path);
            //$getFile=basename($path);
            $getFile=preg_replace('/^.+[\\\\\\/]/','',$path);//非
            //print_r($getFile);
            $getFile=iconv('gb2312','utf-8',$getFile);//暂
            //$getFile=iconv('utf-8','gb2312',$getFile);
            
        	$arr[]=$getFile;
        }
        
    }//function get_file_list
    //get_file_list();
    function getArr($dir){
        $arr = [];//存放文件名
        get_file_list($dir,$arr);
        return $arr;
    }//function getArr
    //$dir='E:/360Downloads';//实验路径;
    //$dir=iconv('utf-8','gb2312//TRANSLIT',$dir);//$dir=iconv('utf-8','gb2312',$dir);
    $dir="E:/money";//真实路径;
    
    echo "<pre>";
    print_r(getArr($dir));
    $newArr=getArr($dir);
    //拼接字符串
    //$string = implode('#', $arr);
    
    //输出给浏览器用"<br/>"或'<br/>';windows输出到自己的文件里用"\r\n";
    $string=implode("\r\n",$newArr);
    echo $string;//EN01.jpg#EN02.jpg#EN03.jpg#EN04.jpg#EN05.jpg#EN06.jpg#EN07.jpg#EN08.jpg#EN09.jpg#EN10.jpg#EN11.jpg#EN12.jpg#EN13.jpg#EN14.jpg
    file_put_contents('abc.txt', $string);
?>