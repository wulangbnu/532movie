<?php

define("APIURL","http://api.douban.com/v2/movie/[id]"); //api页面
define("MOVIEURL","http://movie.douban.com/subject/[id]/"); //电影页面
define("POSTERURL","http://movie.douban.com/subject/[id]/photos?type=R"); //海报页面
define("STILLSURL","http://movie.douban.com/subject/[id]/photos"); //剧照页面

define("PICURL","http://img3.douban.com/view/photo/photo/public/p[pid].jpg"); //图片地址
define("TRAILERURL","http://movie.douban.com/trailer/video_url?tid=[tid]"); //预告片地址

class AddAction extends HomeAction{
    private $id,$apijson;
    private $title;   //片名
    private $point;   //评分
    private $numRaters; //评分人数
    private $summary; //剧情简介
    private $language; //语言
    private $pubdate; //上映日期
    private $country; //制片国家/地区
    private $writer;  //编剧
    private $director; //导演
    private $cast;     //主演
    private $duration; //片长
    private $year;     //年份
    private $type;    //类型
    private $tags;    //标签
    private $savepath; //存放路径
    private $poster_path;   //电影海报地址
    private $trailer_path;  //电影预告片地址
    private $pics_path;     //电影海报 地址之间用,隔开的字符串
    private $stills_path;   //剧照     地址之间用,隔开的字符串
    private $letter;  //片名首字母
    private $cid; //影片类型

    private $bt_path;  //BT种子路径
    public function index(){
        $this->display('add');
    }
    public function check(){

        set_time_limit(0);
        ini_set('memory_limit','1024M'); 
        ignore_user_abort(true); 
        $array=array();
        $this->id=$_POST['id'];
        $this->savepath = './uploads/'.($this->id).'/';
        $this->bt_path = $this->upload();
        if(!$this->bt_path)  $this->error('上传失败！');
        else{
            $this->getinfo();
            $this->getmedia();
            $this->pics_path=$this->getpic(0);
            $this->stills_path=$this->getpic(1);
            $this->letter=$this->getFirstchar($this->title);
            $this->cid=$this->getcid($this->type);
            if($this->insert_into_db()) $this->success('更新成功！');
            else $this->error('影片已存在！');
        }
    }

    private function upload(){
        import("ORG.Net.UploadFile");
        $upload = new UploadFile();
        $upload->allowExts  = array('torrent');
        $upload->savePath = $this->savepath;
        if(!$upload->upload()){
            return false; 
        }else{
            $uploadList=$upload->getUploadFileInfo();
            return ($upload->savePath).$uploadList[0]['savename'];
        }
    }
    private function __construct($id,$savepath="./upload"){
        $this->id=$id;
        $this->savepath=$savepath;
        $this->getinfo();
        $this->getmedia();
        $this->pics_path=$this->getpic(0);
        $this->stills_path=$this->getpic(1);
        $this->letter=$this->getFirstchar($this->title);
        $this->cid=$this->getcid($this->type);
    }
    private function getinfo(){
        $url=str_replace("[id]",$this->id,APIURL);
        $this->apijson=$this->urlopen($url);
        if(!($this->apijson)){
            echo "获取影片信息出错！";
            return;
        }
        @$obj=json_decode($this->apijson);
        @$attrs=$obj->attrs;

        @$alt_title=$obj->alt_title;
        @$alt_title=explode('/',$alt_title);
        @$title=$attrs->title;
        @$title=array_unique(array_merge($alt_title,$title));
        @$this->title=$this->split_array($title);

        @$this->point=$obj->rating->average;

        @$this->numRaters=$obj->rating->numRaters;

        @$summary=$obj->summary;
        @$summary=htmlentities($summary,ENT_COMPAT,'UTF-8');
        @$summary="&nbsp;&nbsp;&nbsp;&nbsp;".str_replace("\n","\n&nbsp;&nbsp;&nbsp;&nbsp;",$summary);
        @$summary=nl2br($summary);
        @$this->summary=$summary;

        @$this->language =$this->split_array($attrs->language);
        @$this->pubdate  =$this->split_array($attrs->pubdate);
        @$this->country  =$this->split_array($attrs->country);
        @$this->writer   =$this->split_array($attrs->writer);
        @$this->director =$this->split_array($attrs->director);
        @$this->cast     =$this->split_array($attrs->cast);
        @$this->duration =$this->split_array($attrs->movie_duration);
        @$this->year     =$this->split_array($attrs->year);
        @$this->type     =$this->split_array($attrs->movie_type);
        
        @$tags=$obj->tags;
        foreach($tags as $i) $this->tags.=$i->name."/";
        $this->tags=substr($this->tags,0,strlen($this->tags)-1);

    }
    //数组转为字符串
    private function  split_array($ar){
        if(gettype($ar)=="array"){
            foreach($ar as $i) $ret.=$i."/";
            return substr($ret,0,strlen($ret)-1); 
        }else{
            return "未知";
        }
    }

    //下载首页海报和预告片
     private function getmedia(){
        
        //豆瓣电影页面
        $url=str_replace("[id]",$this->id,MOVIEURL);
        $content=$this->urlopen($url);
        if(!$content) return false;

        //下载首页海报
        $regex='#<img src="http://img3.douban.com/view/photo/thumb/public/p([0-9]*).jpg" title#'; 
        if(preg_match($regex, $content, $matches)){
            //print_r($matches); 
            $pid=$matches[1];
            if( !empty($pid) ){
                $url=str_replace("[pid]",$pid,PICURL);
                $path=$this->savepath.$pid.".jpg";
                if( $this->urlretrieve($url,$path) ) $this->poster_path=$path;
            }
        }

        //下载预告片
        $regex='#<a class="related-pic-video" href="http://movie.douban.com/trailer/([0-9]*)/#'; 
        if(preg_match($regex, $content, $matches)){
            //print_r($matches);
            $tid=$matches[1];
            if( !empty($tid) ){
                $url=str_replace("[tid]",$tid,TRAILERURL);
                $headers=get_headers($url,true);
                //print_r($headers);
                $url=$headers['Location'];
                if(!empty($url)){
                    $path=$this->savepath.strrchr($url,'/');
                    if( $this->urlretrieve($url,$path) ){
                       $this->trailer_path=$path;
                    }
                }
            }
        } 
    }

    //下载海报(0)或剧照(1)第一页
    private function getpic($ptype){
        if($ptype==0) $url=str_replace("[id]",$this->id,POSTERURL); //海报
        else $url=str_replace("[id]",$this->id,STILLSURL); //剧照
        $content=$this->urlopen($url);
        if(!$content) return false;
        $regex='#<img src="http://img3.douban.com/view/photo/thumb/public/p([0-9]*).jpg" /></a></div>#';
        $ret="";
        if(preg_match_all($regex, $content, $matches)){
            //print_r($matches);
            if(empty($matches)) return;
            foreach($matches[1] as $pid){
                if(empty($pid)) continue;
                $url=str_replace("[pid]",$pid,PICURL);
                $path=$this->savepath.$pid.".jpg";
                if( $this->urlretrieve($url,$path) ){
                    $ret.=$path.",";      
                }
            }
        }
        if( strlen($ret)>0 ) $ret=substr($ret,0,strlen($ret)-1);
        return $ret;
    }

    //输出影片信息
    public function outputinfo(){
        header("Content-type:text/html; charset=utf-8");
        echo "<html><head></head><body>";

        echo "<h2>片名</h2>".$this->title;
        echo "<h2>评分</h2>".$this->point;
        echo "<h2>评分人数</h2>".$this->numRaters;
        echo "<h2>剧情简介</h2>".$this->summary;
        echo "<h2>语言</h2>".$this->language;
        echo "<h2>上映日期</h2>".$this->pubdate;
        echo "<h2>制片国家/地区</h2>".$this->country;
        echo "<h2>编剧</h2>".$this->writer;
        echo "<h2>导演</h2>".$this->director;
        echo "<h2>主演</h2>".$this->cast;
        echo "<h2>片长</h2>".$this->duration;
        echo "<h2>年份</h2>".$this->year;
        echo "<h2>类型</h2>".$this->type;
        echo "<h2>标签</h2>".$this->tags;
        echo "<hr/>";
        echo "<h2>海报</h2>";
        echo "<img src='". $this->poster_path ."'/>";
        echo "<a href=' ".$this->trailer_path ."'> 预告片 </a>";

        echo "<h2>更多海报</h2>";
        $ar=explode(',',$this->pics_path);
        foreach ($ar as $i) echo "<img src=' $i '/>";
        
        echo "<h2>剧照</h2>";
        $ar=explode(',',$this->stills_path);
        foreach ($ar as $i) echo "<img src=' $i '/>";

        echo "</body></html>";
    }

    //下载页面html的urlopen函数
    private function urlopen($url){
        set_time_limit(0);
         @$stream=fopen($url,'rb');
        if(!$stream) return false;
        $content=stream_get_contents($stream);
        @fclose($stream);
        return $content;
    }

    //下载网页文件的urlretrieve函数
    private function urlretrieve($url,$path){
        set_time_limit(0);
        if(file_exists($path)) return true;
        @$stream=fopen($url,"rb");
        if(!$stream) return false;
        @$fp = fopen($path,"w");
        if(!$fp) return false;
        while(!feof($stream)){
            @fwrite($fp,fgets($stream,1024));
        }
        @fclose($stream);
        @fclose($fp);
        return true; 
    }
    private function getFirstChar($str){
        @$str=iconv("UTF-8","gb2312",$str);
        $asc=ord(substr($str,0,1));
        if ($asc<160){ //非中文
            if ($asc>=48 && $asc<=57){
                return chr($asc); //数字
            }elseif ($asc>=65 && $asc<=90){
                return chr($asc);    // A--Z
            }elseif ($asc>=97 && $asc<=122){
                return chr($asc-32); // a--z
            }else{
                return '~'; //其他
            }
        }
        else{ //中文
            $asc=$asc*1000+ord(substr($str,1,1));
            //获取拼音首字母A--Z
            if ($asc>=176161 && $asc<176197){
                return 'A';
            }elseif ($asc>=176197 && $asc<178193){
                return 'B';
            }elseif ($asc>=178193 && $asc<180238){
                return 'C';
            }elseif ($asc>=180238 && $asc<182234){
                return 'D';
            }elseif ($asc>=182234 && $asc<183162){
                return 'E';
            }elseif ($asc>=183162 && $asc<184193){
                return 'F';
            }elseif ($asc>=184193 && $asc<185254){
                return 'G';
            }elseif ($asc>=185254 && $asc<187247){
                return 'H';
            }elseif ($asc>=187247 && $asc<191166){
                return 'J';
            }elseif ($asc>=191166 && $asc<192172){
                return 'K';
            }elseif ($asc>=192172 && $asc<194232){
                return 'L';
            }elseif ($asc>=194232 && $asc<196195){
                return 'M';
            }elseif ($asc>=196195 && $asc<197182){
                return 'N';
            }elseif ($asc>=197182 && $asc<197190){
                return 'O';
            }elseif ($asc>=197190 && $asc<198218){
                return 'P';
            }elseif ($asc>=198218 && $asc<200187){
                return 'Q';
            }elseif ($asc>=200187 && $asc<200246){
                return 'R';
            }elseif ($asc>=200246 && $asc<203250){
                return 'S';
            }elseif ($asc>=203250 && $asc<205218){
                return 'T';
            }elseif ($asc>=205218 && $asc<206244){
                return 'W';
            }elseif ($asc>=206244 && $asc<209185){
                return 'X';
            }elseif ($asc>=209185 && $asc<212209){
                return 'Y';
            }elseif ($asc>=212209){
                return 'Z';
            }else{
                return '~';
            }
        }
    }
    private function getcid($type){
        if(stristr($type,'动画')||stristr($type,'动漫')) return 3;
        if(stristr($type,'综艺')||stristr($type,'访谈')) return 4;
        if(stristr($type,'体育')）return 5;
        if(stristr($type,'纪录')||stristr($type,'写实')) return 6;

        if(stristr($type,'科幻')||stristr($type,'奇幻')) return 11;
        if(stristr($type,'动作')||stristr($type,'冒险'))return 8;
        if(stristr($type,'恐怖')||stristr($type,'惊悚')) return 13;
        if(stristr($type,'战争')||stristr($type,'斗争')) return 14;
        if(stristr($type,'爱情'))return 10;
        if(stristr($type,'喜剧')) return 9;
        return 12; //剧情
    }
    private function insert_into_db(){
        $video=M("video");
         
        //影片查重 
        $doubanid=$this->id;
        $result=$video->where(" doubanid='$doubanid' ")->find();
        if( empty($result['doubanid']) ) return false;

        $data['doubanid']=$this->id;
        $data['cid']=$this->cid;
        $data['title']=$this->title;
        $data['keywords']=$this->tags;
        $data['actor']=$this->cast;
        $data['director']=$this->director;
        $data['writer']=$this->writer;
        $data['content']=$this->summary;
        $data['picurl']=$this->poster_path;
        $data['area']=$this->country;
        $data['language']=$this->language;        
        $data['year']=$this->year;
        $data['addtime']=time();
        $data['stars']=($this->score)/2;
        $data['playurl']=$this->bt_path;
        $data['downurl']=$this->bt_path;
        $data['inputer']='wulang';
        $data['letter']=$this->letter;
        $data['score']=$this->score;
        $data['scoreer']=$this->numRaters;
        $data['trailer']=$this->trailer_path;
        $data['posters']=$this->pics_path; 
        $data['stills']=$this->stills_path;
        $video->add($data);
        return true;
    }

}
?>
