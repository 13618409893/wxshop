<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use app\admin\model\Category;

class Goods extends Common
{
    public function index(){
        //获取分类树
        $categoryArray = Db::name('category')->order('sort')->select();
        $categoryList = Category::tree($categoryArray);
        $this->assign('categoryList',$categoryList);
        return view();
    }

    public function content($id = 0){
        if($id){
            $infoList = Db::name('goods')->where('cid_two',$id)->order('id desc')->select();
            //获取分类名称
            $catname = getCatInfoById($id,'name');
            $this->assign(['name'=>$catname,'infoList'=>$infoList]);
        }
        return view();
    }

    public function add($id = 0){
        if(request()->isPost()){
            $data = input('post.');
            //获取上级分类ID
            $data['cid_one'] = Db::name('category')->where('id',$data['cid_two'])->value('pid');
            $result = Db::name('goods')->strict(false)->insert($data);
            if($result){
                return success('商品添加成功',url('index',['id'=>$data['cid_two']]));
            }else{
                return error('商品添加失败');
            }
        }elseif($id==0){
            return error('请选择相应商品分类');
        }else{
            //获取分类名称
            $catname = getCatInfoById($id,'name');
            $this->assign('name',$catname);
            return view();
        }
    }

    public function getDataTables($id = 0) {
        if($id){
            //获取请求过来的数据
            $getParam = request()->param();

            $draw = $getParam['draw'];

            //排序
            $orderSql = $getParam['order'][0]['dir'];

            //自定义查询参数
            $extra_search = $getParam['extra_search'];

            // 总记录数
            $recordsTotal = Db::name('goods')->where('cid_two',$id)->count();
            //过滤条件后的总记录数
            $search = $getParam['search']['value'];
            $recordsFiltered = strlen($search) ?  Db::name('goods')->where('cid_two',$id)->where($extra_search,'like','%'.$search.'%')->count() : $recordsTotal;

            //分页
            $start = $getParam['start']; //起始下标
            $length = $getParam['length']; //每页显示记录数

            //根据开始下标计算出当前页
            $page = intval($start/$length) + 1;
            $config = ['page'=>$page, 'list_rows'=>$length];
            $list = Db::name('goods')->where('cid_two',$id)->where($extra_search,'like','%'.$search.'%')->order($orderSql)->paginate(null,false,$config);
            $lists = [];
            $uploads_tem = config('view_replace_str.__UPLOADS__').'/';
            if(!empty($list)){
                foreach ($list as $key => $value) {
                    $lists[$key] = $value;
                    $lists[$key]['img'] = "<img src='".$uploads_tem.$value['img']."' alt='".$value['name']."' width='36'>";
                    $lists[$key]['operate'] = "<a href='". url('edit',['id'=>$value['id']]) ."' title='编辑' target='_parent'><i class='fa fa-edit text-navy'></i></a>&nbsp;&nbsp;
                    <a href='". url('addImg',['id'=>$value['id'], 'cid_two'=>$value['cid_two']]) ."' title='添加图片' target='_parent'><i class='fa fa-picture-o text-navy'></i></a>&nbsp;&nbsp;
                    <a name='delete' href='". url('delete',['id'=>$value['id'], 'cid_two'=>$value['cid_two']]) ."' title='删除'><i class='fa fa-trash-o text-navy'></i></a>";
                }
            }
        } else{
            $draw = 1;
            $recordsTotal = 0;
            $recordsFiltered = 0;
            $lists = [];
        }

        $data = array(
            "draw"=>$draw,
            "recordsTotal"=>$recordsTotal, //数据总数
            "recordsFiltered"=>$recordsFiltered, //过滤之后的记录总数
            "data"=>$lists
        );

        echo json_encode($data);
    }
}
