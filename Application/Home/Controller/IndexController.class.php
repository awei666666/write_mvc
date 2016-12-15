<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    /**
     * @author 张鹏宇^life <292697808@qq.com>
     * @copyright 2016 - 2016 粮易网 <jztl2012@163.com>
     * @version $Id: 2016/8/26 9:44 liangyi2.0 manage.php 张鹏宇^life $
     */

    public function index() {
        $Product_classify = M("Product_classify");
        $p_cass           = $Product_classify->where('p_id=0 && status=1')->order('reorder')->select();
        foreach ($p_cass as $k => $v) {
            $where   = "p_id = $v[id]";
            $p_cass1 = $Product_classify->where($where)->order('reorder')->select();
            foreach ($p_cass1 as $kk => $vv) {
                $where2               = "p_id = $vv[id]";
                $p_cass2              = $Product_classify->where($where2)->order('reorder')->select();
                $p_cass1[$kk]['scat'] = $p_cass2;
            }
            $p_cass[$k]['scat'] = $p_cass1;
        }
        $this->assign('p_cass', $p_cass);

        //猜你喜欢
        $model_home = M('product');
        $data_like  = $model_home->where('status=3')->field('name,brand,now_price,pic,detail')->limit('3')->select();
        //dump(M()->getLastSql());exit;
        $this->assign('like', $data_like);
        //热卖产品
        $model_home = M('product');
        $data_home  = $model_home->where('status=2')->field('name,brand,now_price,pic,detail')->limit('3')->select();
        //$model['detail']=htmlspecialchars($model_home['detail']);
        //$data_home['detail']=htmlspecialchars_decode($data_home['detail']);
        $this->assign('hot', $data_home);
        //新品上架
        $model_home = M('product');
        $data_new   = $model_home->where('status=4')->field('name,brand,now_price,pic,detail')->limit('3')->select();
        $this->assign('new', $data_new);
        //粮易快报
        $model_news = M('news');
        $table_name_point=get_table_name('product_classify');
        $data_news  = $model_news->where('status=1')->field('title')->limit('4')->order('id')->select();
        $this->assign('news', $data_news);
        //男装的遍历
        $model_goods =M('product');
        $data_goods=$model_goods->alias('p')
            ->field('p.*')
            //->join('left join ly_product_classify c1 on p.classify_id = c1.id ')
            ->join('left join '.$table_name_point.' c1 on p.classify_id = c1.id ')
            //->join('left join ly_product_classify c2 on c2.id = c1.p_id')
            ->where('c1.p_id =100002')
            ->limit('8')
            ->select();
        $this->assign('man', $data_goods);

        //女装的遍历
        $model_goods =M('product');
        $data_goods=$model_goods->alias('p')
            ->field('p.*')
            //->join('left join ly_product_classify c1 on p.classify_id = c1.id ')
            ->join('left join '.$table_name_point.' c1 on p.classify_id = c1.id ')
            //->join('left join ly_product_classify c2 on c2.id = c1.p_id')
            ->where('c1.p_id =100001')
            ->limit('8')
            ->select();
        $this->assign('woman', $data_goods);

        //鞋靴的遍历
        $model_goods =M('product');
        $data_goods=$model_goods->alias('p')
            ->field('p.*')
            //->join('left join ly_product_classify c1 on p.classify_id = c1.id ')
            ->join('left join '.$table_name_point.' c1 on p.classify_id = c1.id ')
            //->join('left join ly_product_classify c2 on c2.id = c1.p_id')
            ->where('c1.p_id =100201')
            ->limit('8')
            ->select();
        $this->assign('shoe', $data_goods);
        //dump($data_goods);exit;

        //箱包首饰的遍历
        $model_goods =M('product');
        $data_goods=$model_goods->alias('p')
            ->field('p.*')
            //->join('left join ly_product_classify c1 on p.classify_id = c1.id ')
            ->join('left join '.$table_name_point.' c1 on p.classify_id = c1.id ')
            //->join('left join ly_product_classify c2 on c2.id = c1.p_id')
            ->where('c1.p_id =1006')
            ->limit('8')
            ->select();
        $this->assign('luggage', $data_goods);

        //内衣的遍历
        $model_goods =M('product');
        $data_goods=$model_goods->alias('p')
            ->field('p.*')
            //->join('left join ly_product_classify c1 on p.classify_id = c1.id ')
            ->join('left join '.$table_name_point.' c1 on p.classify_id = c1.id ')
            //->join('left join ly_product_classify c2 on c2.id = c1.p_id')
            ->where('c1.p_id =100205')
            ->limit('8')
            ->select();
        $this->assign('underwear', $data_goods);
        //dump($data_goods);exit;

        //手机的遍历
        $model_goods =M('product');
        $data_goods=$model_goods->alias('p')
            ->field('p.*')
            //->join('left join ly_product_classify c1 on p.classify_id = c1.id ')
            ->join('left join '.$table_name_point.' c1 on p.classify_id = c1.id ')
            //->join('left join ly_product_classify c2 on c2.id = c1.p_id')
            ->where('c1.p_id =101101')
            ->limit('8')
            ->select();
        $this->assign('mobile', $data_goods);
        //dump($data_goods);exit;

        //合约机的遍历       没有合约机的内容用手机的ID
        $model_goods =M('product');
        $data_goods=$model_goods->alias('p')
            ->field('p.*')
            //->join('left join ly_product_classify c1 on p.classify_id = c1.id ')
            ->join('left join '.$table_name_point.' c1 on p.classify_id = c1.id ')
            //->join('left join ly_product_classify c2 on c2.id = c1.p_id')
            ->where('c1.p_id =101101')
            ->limit('8')
            ->select();
        $this->assign('contract', $data_goods);
        //dump($data_goods);exit;

        //DIY主机的遍历
        $model_goods =M('product');
        $data_goods=$model_goods->alias('p')
            ->field('p.*')
            //->join('left join ly_product_classify c1 on p.classify_id = c1.id ')
            ->join('left join '.$table_name_point.' c1 on p.classify_id = c1.id ')
            //->join('left join ly_product_classify c2 on c2.id = c1.p_id')
            ->where('c1.p_id =101103')
            ->limit('8')
            ->select();
        $this->assign('mainframe', $data_goods);
        //dump($data_goods);exit;

        //电脑外设的遍历       不怎么合适
        $model_goods =M('product');
        $data_goods=$model_goods->alias('p')
            ->field('p.*')
            //->join('left join ly_product_classify c1 on p.classify_id = c1.id ')
            ->join('left join '.$table_name_point.' c1 on p.classify_id = c1.id ')
            //->join('left join ly_product_classify c2 on c2.id = c1.p_id')
            ->where('c1.p_id =10060108')
            ->limit('8')
            ->select();
        $this->assign('Peripherals', $data_goods);
        //dump($data_goods);exit;

        //平板电脑的遍历
        $model_goods =M('product');
        $data_goods=$model_goods->alias('p')
            ->field('p.*')
            //->join('left join ly_product_classify c1 on p.classify_id = c1.id ')
            ->join('left join '.$table_name_point.' c1 on p.classify_id = c1.id ')
            //->join('left join ly_product_classify c2 on c2.id = c1.p_id')
            ->where('c1.p_id =10110302')
            ->limit('8')
            ->select();
        $this->assign('tabletPC', $data_goods);
        //dump($data_goods);exit;

        //功效的遍历
        $model_goods =M('product');
        $data_goods=$model_goods->alias('p')
            ->field('p.*')
            //->join('left join ly_product_classify c1 on p.classify_id = c1.id ')
            ->join('left join '.$table_name_point.' c1 on p.classify_id = c1.id ')
            //->join('left join ly_product_classify c2 on c2.id = c1.p_id')
            ->where('c1.p_id =100402')
            ->limit('8')
            ->select();
        $this->assign('efficacy', $data_goods);
        //dump($data_goods);exit;

        //护肤的遍历
        $model_goods =M('product');
        $data_goods=$model_goods->alias('p')
            ->field('p.*')
            //->join('left join ly_product_classify c1 on p.classify_id = c1.id ')
            ->join('left join '.$table_name_point.' c1 on p.classify_id = c1.id ')
            //->join('left join ly_product_classify c2 on c2.id = c1.p_id')
            ->where('c1.p_id =1004')
            ->limit('8')
            ->select();
        $this->assign('skin', $data_goods);
        //dump($data_goods);exit;

        //彩妆的遍历
        $model_goods =M('product');
        $data_goods=$model_goods->alias('p')
            ->field('p.*')
            ->join('left join '.$table_name_point.' c1 on p.classify_id = c1.id ')
            ->where('c1.p_id =100404')
            ->limit('8')
            ->select();
        $this->assign('cosmetics', $data_goods);
        //dump($data_goods);exit;

        //香水的遍历
        $model_goods =M('product');
        $data_goods=$model_goods->alias('p')
            ->field('p.*')
            ->join('left join '.$table_name_point.' c1 on p.classify_id = c1.id ')
            ->where('c1.p_id =10040401')
            ->limit('8')
            ->select();
        $this->assign('perfume', $data_goods);
        //dump($data_goods);exit;

        //男士的遍历  没有ID
        $model_goods =M('product');
        $data_goods=$model_goods->alias('p')
            ->field('p.*')
            ->join('left join '.$table_name_point.' c1 on p.classify_id = c1.id ')
            ->where('c1.p_id =10040401')
            ->limit('8')
            ->select();
        $this->assign('perfume', $data_goods);
        //dump($data_goods);exit;

        //潮品的遍历,没有这个ID
        $model_goods =M('product');
        $data_goods=$model_goods->alias('p')
            ->field('p.*')
            ->join('left join '.$table_name_point.' c1 on p.classify_id = c1.id ')
            ->where('c1.p_id =10040401')
            ->limit('8')
            ->select();
        $this->assign('Shop', $data_goods);
        //dump($data_goods);exit;

        //运动服的遍历
        $model_goods =M('product');
        $data_goods=$model_goods->alias('p')
            ->field('p.*')
            ->join('left join '.$table_name_point.' c1 on p.classify_id = c1.id ')
            ->where('c1.p_id =10000117')
            ->limit('8')
            ->select();
        $this->assign('sportsWear', $data_goods);
        //dump($data_goods);exit;10020109

        //运动鞋的遍历
        $model_goods =M('product');
        $data_goods=$model_goods->alias('p')
            ->field('p.*')
            ->join('left join '.$table_name_point.' c1 on p.classify_id = c1.id ')
            ->where('c1.p_id =10020203')
            ->limit('8')
            ->select();
        $this->assign('sportsShoe', $data_goods);
        //dump($data_goods);exit;

        //运动鞋的遍历
        $model_goods =M('product');
        $data_goods=$model_goods->alias('p')
            ->field('p.*')
            ->join('left join '.$table_name_point.' c1 on p.classify_id = c1.id ')
            ->where('c1.p_id =10020601')
            ->limit('8')
            ->select();
        $this->assign('sportsShoe', $data_goods);
        //dump($data_goods);exit;101502

        //运动鞋的遍历
        $model_goods =M('product');
        $data_goods=$model_goods->alias('p')
            ->field('p.*')
            ->join('left join '.$table_name_point.' c1 on p.classify_id = c1.id ')
            ->where('c1.p_id =101502')
            ->limit('8')
            ->select();
        $this->assign('outdoors', $data_goods);
        //dump($data_goods);exit;

        //智能运动的遍历 没有ID 现用ID为运动鞋遍历
        $model_goods =M('product');
        $data_goods=$model_goods->alias('p')
            ->field('p.*')
            ->join('left join '.$table_name_point.' c1 on p.classify_id = c1.id ')
            ->where('c1.p_id =101502')
            ->limit('8')
            ->select();
        $this->assign('capacity', $data_goods);
        //dump($data_goods);exit;

        //家装建材的遍历
        $model_goods =M('product');
        $data_goods=$model_goods->alias('p')
            ->field('p.*')
            ->join('left join '.$table_name_point.' c1 on p.classify_id = c1.id ')
            ->where('c1.p_id =100701')
            ->limit('8')
            ->select();
        $this->assign('furnishing', $data_goods);
        //dump($data_goods);exit;

        //厨卫用品的遍历 没有ID现在用的是建材ID
        $model_goods =M('product');
        $data_goods=$model_goods->alias('p')
            ->field('p.*')
            ->join('left join '.$table_name_point.' c1 on p.classify_id = c1.id ')
            ->where('c1.p_id =100701')
            ->limit('8')
            ->select();
        $this->assign('kitchen', $data_goods);
        //dump($data_goods);exit;

        //床上用品的遍历 没有ID现在用的是建材ID
        $model_goods =M('product');
        $data_goods=$model_goods->alias('p')
            ->field('p.*')
            ->join('left join '.$table_name_point.' c1 on p.classify_id = c1.id ')
            ->where('c1.p_id =100701')
            ->limit('8')
            ->select();
        $this->assign('bedding', $data_goods);
        //dump($data_goods);exit;

        //居家百货的遍历 没有ID现在用的是建材ID
        $model_goods =M('product');
        $data_goods=$model_goods->alias('p')
            ->field('p.*')
            ->join('left join '.$table_name_point.' c1 on p.classify_id = c1.id ')
            ->where('c1.p_id =100701')
            ->limit('8')
            ->select();
        $this->assign('living', $data_goods);
        //dump($data_goods);exit;

        //品质家居的遍历 没有ID现在用的是建材ID
        $model_goods =M('product');
        $data_goods=$model_goods->alias('p')
            ->field('p.*')
            ->join('left join '.$table_name_point.' c1 on p.classify_id = c1.id ')
            ->where('c1.p_id =1008')
            ->limit('8')
            ->select();
        $this->assign('qualityHome', $data_goods);
        //dump($data_goods);exit;

        //生活电器的遍历
        $model_goods =M('product');
        $data_goods=$model_goods->alias('p')
            ->field('p.*')
            ->join('left join '.$table_name_point.' c1 on p.classify_id = c1.id ')
            ->where('c1.p_id =101202')
            ->limit('8')
            ->select();
        $this->assign('lifeElectric', $data_goods);
        //dump($data_goods);exit;

        //厨卫电器的遍历 没有ID
        $model_goods =M('product');
        $data_goods=$model_goods->alias('p')
            ->field('p.*')
            ->join('left join '.$table_name_point.' c1 on p.classify_id = c1.id ')
            ->where('c1.p_id =101202')
            ->limit('8')
            ->select();
        $this->assign('Bathroom', $data_goods);
        //dump($data_goods);exit;

        //大型电器的遍历 没有ID
        $model_goods =M('product');
        $data_goods=$model_goods->alias('p')
            ->field('p.*')
            ->join('left join '.$table_name_point.' c1 on p.classify_id = c1.id ')
            ->where('c1.p_id =101202')
            ->limit('8')
            ->select();
        $this->assign('LargeScale', $data_goods);
        //dump($data_goods);exit;

        //空净/净水的遍历 没有ID
        $model_goods =M('product');
        $data_goods=$model_goods->alias('p')
            ->field('p.*')
            ->join('left join '.$table_name_point.' c1 on p.classify_id = c1.id ')
            ->where('c1.p_id =10120206')
            ->limit('8')
            ->select();
        $this->assign('purification', $data_goods);
        //dump($data_goods);exit;

        //智能家电的遍历 没有ID
        $model_goods =M('product');
        $data_goods=$model_goods->alias('p')
            ->field('p.*')
            ->join('left join '.$table_name_point.' c1 on p.classify_id = c1.id ')
            ->where('c1.p_id =10120206')
            ->limit('8')
            ->select();
        $this->assign('intelligentHousehold', $data_goods);
        //dump($data_goods);exit;

        //童装童鞋的遍历
        $model_goods =M('product');
        $data_goods=$model_goods->alias('p')
            ->field('p.*')
            ->join('left join '.$table_name_point.' c1 on p.classify_id = c1.id ')
            ->where('c1.p_id =100206')
            ->limit('8')
            ->select();
        $this->assign('childrensGarments', $data_goods);
       //dump($data_goods);exit;

        //奶粉副食的遍历
        $model_goods =M('product');
        $data_goods=$model_goods->alias('p')
            ->field('p.*')
            ->join('left join '.$table_name_point.' c1 on p.classify_id = c1.id ')
            ->where('c1.p_id =100301')
            ->limit('8')
            ->select();
        $this->assign('milk', $data_goods);
        //dump($data_goods);exit;

        //尿布湿巾的遍历
        $model_goods =M('product');
        $data_goods=$model_goods->alias('p')
            ->field('p.*')
            ->join('left join '.$table_name_point.' c1 on p.classify_id = c1.id ')
            ->where('c1.p_id =10080201')
            ->limit('8')
            ->select();
        $this->assign('diaper', $data_goods);
        //dump($data_goods);exit;

        //玩具/童车的遍历
        $model_goods =M('product');
        $data_goods=$model_goods->alias('p')
            ->field('p.*')
            ->join('left join '.$table_name_point.' c1 on p.classify_id = c1.id ')
            ->where('c1.p_id =100303')
            ->limit('8')
            ->select();
        $this->assign('toy', $data_goods);
        //dump($data_goods);exit;

        //妈妈专区的遍历
        $model_goods =M('product');
        $data_goods=$model_goods->alias('p')
            ->field('p.*')
            ->join('left join '.$table_name_point.' c1 on p.classify_id = c1.id ')
            ->where('c1.p_id =100304')
            ->limit('8')
            ->select();
        $this->assign('Mum', $data_goods);
        //dump($data_goods);exit;
        $this->display();

    }

    public function pro($model_goods,$table_name_point,$p_id){
        //内衣的遍历
        $model_goods =M('product');
        $data_goods=$model_goods->alias('p')
            ->field('p.*')
            //->join('left join ly_product_classify c1 on p.classify_id = c1.id ')
            ->join('left join '.$table_name_point.' c1 on p.classify_id = c1.id ')
            //->join('left join ly_product_classify c2 on c2.id = c1.p_id')
            ->where('c1.p_id ='.$p_id)
            ->limit('8')
            ->select();
        return $data_goods;
        //$this->assign('underwear', $data_goods);
    }
    public function nam(){
        $this->pro();
    }
}


