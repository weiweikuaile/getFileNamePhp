<?php
/**
     * 输入文件夹名
     * 获取文件夹里文件名
     * 输出
     * EN01.jpg#EN02.jpg#EN03.jpg#EN04.jpg#EN05.jpg#EN06.jpg#EN07.jpg#EN08.jpg#EN09.jpg#EN10.jpg#EN11.jpg#EN12.jpg#EN13.jpg#EN14.jpg
     */
    function get_file_list()
    {
        $arr = [];//存放文件名
        $i=0;
        //$path='D:\image\test';//路径
        $path='E:\360Downloads';//路径
        if(is_dir($path)){
        	if($handler = opendir($path)){
        		while (($filename = readdir($handler)) !== false) {
	            	if ($filename != "." && $filename != "..") {
	                array_push($arr, $filename);
	            		//$arr[$i]=$filename;
	            		//$i=$i+1;
	            	}//if$filename
        		}//while
		        //拼接字符串
		        $string = implode('#', $arr);
		        echo $string;//EN01.jpg#EN02.jpg#EN03.jpg#EN04.jpg#EN05.jpg#EN06.jpg#EN07.jpg#EN08.jpg#EN09.jpg#EN10.jpg#EN11.jpg#EN12.jpg#EN13.jpg#EN14.jpg
		        closedir($handler);
        	};//ifopendir当前目录中的文件夹下的文件夹
        }//ifis_dir
        
    }//function get_file_list
    get_file_list();

?>