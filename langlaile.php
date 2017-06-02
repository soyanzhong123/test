<?php
header('Content-Type:text/html;charset=utf-8');
interface wolfCome{                   //狼来了的故事
	public function attach(villager $b);//注册
	public function detach(villager $b);//注销
	public function notify();
}
class boy implements wolfCome{
	protected $foolman =array();
	public static $fooltimes=0;
	public function attach(villager $b)
	{
       $this->foolman[]=$b;
	}
	public function detach(villager $b){         //注销观察者
		foreach ($this->foolman as $k => $v) {  //注意这是是三个等号“===”
			if($v===$b){                        //这样才能判断二者是否指向同一个地址  
				array_splice($this->foolman,$k,1);//注意这里要写成$this->foolman才行
			}                                     
		}
	}
	public function notify(){
		foreach ($this->foolman as $key => $man) {
			$man->getNotify($this);
		}
	}
	public function setFoolTimes()         //每调用一次静态变量$fooltimes加1
	{
		self::$fooltimes +=1;
	}
	public function getFoolTimes()
	{
		return self::$fooltimes;
	}	
}

interface adult{
	public function getNotify($b);
}

class  villager  implements adult{

	public function getNotify($b){
      if($b->getFoolTimes()>2){   //当上当两次以后再
      	echo "信你才怪".'<br>';
      }
      else
      	echo "友军正在赶来".'<br>';
	}
}
$b=new boy();//创建一个被观察者
$b->attach($a=new villager());//注册观察者
$b->attach($c=new villager());//注册观察者
$b->attach($d=new villager());//注册观察者
$b->setFoolTimes();           //第一次骗人
$b->notify();  //友军正在赶来
$b->setFoolTimes();           //第二次骗人
$b->notify();  //友军正在赶来
$b->detach($d);               //将d村民移除观察者数组
$b->setFoolTimes();           //第三次骗人
$b->notify();  //信你才怪
?>