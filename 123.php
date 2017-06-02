<?php
header('Content-Type:text/html;charset=utf-8');
$a = <<<myname
<?xml version="1.0" encoding="utf-8" ?>                                   
<book>                        

         <name>
              <haha>尼玛哥哥</haha>
              <hehe>来袭</hehe>
         </name>
         <name>
              <haha>天天</haha>
              <hehe>开心</hehe>
         </name>

         <auhtor>学路的小孩</auhtor>

         <date>2009-03-23</date>

</book> 
myname;
$b =new SimpleXMLElement($a);//将XML文件封装成一个对象，并使$b指向它
$b->asXML("./nima.xml");//执行asXML方法后，XML文件里的数据将存到当前
                        //目录下的nima.xml文件里
/*读出XML数据*/
$c=simplexml_load_file("nima.xml");//载入当前目录下的nima.xml文件 
print_r($c) ;
echo '<br>'.$c->name->haha; //默认为name[0]的哈哈标签
echo '<br>'.$c->name[0]->haha;//注意最外面的<book>标签不算第一层
echo '<br>'.$c->name[1]->haha;//只有在同一级存在相同标签名时，才可以使用数组形式调用。
                              //这里的<name>标签有两个。name[1]将调用第二个name标签



                  
?>