<?php

namespace App;
use Illuminate\Support\Facades\Redis;
use Michelf\MarkdownExtra;
use Michelf\SmartyPants;
class Helper {
     /**
     * @param $uid 用户id
     * @param $type 1:评论 2:私信 3:@用户
     * @param bool $flush
     */
    static function set_msg($uid,$type,$flush=false){
        $name = '';
        switch($type){
            case 1:
                $name = 'comment';
                break;
            case 2:
                $name = 'letter';
                break;
            case 3:
                $name = 'atme';
                break;
        }
        $redis = Redis::connection('default');
        $data = json_decode($redis->get('usermsg'.$uid),true);
        //让相应数据清零
        if($flush){
            $data[$name]['total'] = 0;
            $data[$name]['status'] = 0;
            $redis->set('usermsg'.$uid,json_encode($data));
            return;
        }
        //内存数据已存时让相应数据+1
        if(isset($data)){
            $data[$name]['total']++;
            $data[$name]['status']=1;
            $redis->set('usermsg'.$uid,json_encode($data));
        }else{
            //内存数据不存在时，初始化用户数据并写入到内存
            $data = array(
                'comment' => array('total'=>0,'status'=>0),
                'letter' => array('total'=>0,'status' => 0),
                'atme' => array('total' => 0,'status'=>0)
            );
            $data[$name]['total']++;
            $data[$name]['status'] = 1;
            $redis->set('usermsg'.$uid,json_encode($data));
        }
    }
    static function toHTML($text)
    {
        $text = MarkdownExtra::defaultTransform($text);
        $text = SmartyPants::defaultTransform($text);
        return $text;
    }
}