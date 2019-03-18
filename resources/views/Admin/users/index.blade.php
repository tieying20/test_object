@include('Admin/layout/header')
  
  <body class="layui-anim layui-anim-up">
    <!-- <div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="">首页</a>
        <a href="">演示</a>
        <a>
          <cite>导航元素</cite>
        </a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div> -->
    <div class="x-body">
      <div class="layui-row">
        <form class="layui-form layui-col-md12 x-so" action="/user" method="get">
        {{ csrf_field() }}
          <!-- <input class="layui-input" placeholder="开始日" name="start" id="start"> -->
          <!-- <input class="layui-input" placeholder="截止日" name="end" id="end"> -->
          <input type="text" name="search"  placeholder="请输入手机号" autocomplete="off" class="layui-input" value="{{ $search }}">
          <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
        </form>
      </div>
      <xblock>
        <!-- <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
        <button class="layui-btn" onclick="x_admin_show('添加用户','/admin/user/create',600,400)"><i class="layui-icon"></i>添加</button> -->
        <!-- <button class="layui-btn" onclick="location.href='/admin/user/create'"><i class="layui-icon"></i>添加</button> -->
        <span class="x-right" style="line-height:40px">共有数据：{{ $user->total() }}条</span>
      </xblock>
      <table class="layui-table">
        <thead>
          <tr>
            <th>
              <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
            </th>
            <th>编号</th>
            <th>昵称</th>
            <th>手机号</th>
            <!-- <th>手机</th>
            <th>邮箱</th>
            <th>地址</th> -->
            <th>注册时间</th>
            <th>状态</th>
            <th>操作</th></tr>
        </thead>
        <tbody>

        <!-- 单条前台用户列表开始 -->
        @foreach($user as $key => $val)
          <tr>
            <td>
              <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='2'><i class="layui-icon">&#xe605;</i></div>
            </td>
            <td>{{ $i++ }}</td>
            <td>{{ $val['u_name'] }}</td>
            <td>{{ $val['phone'] }}</td>
            <td>{{ $val['created_at'] }}</td>
             <td>
              @if($val['status'] == '0')
                正常
              @else
                冻结
              @endif
            </td>
            </td>
            <!-- <td class="td-status">
              <span class="layui-btn layui-btn-normal layui-btn-mini">正常</span>
            </td> -->
            <td class="td-manage">
              <a onclick="member_stop(this,'10001')" href="javascript:;"  title="冻结">
                <i class="layui-icon">&#xe601;</i>
              </a>
              <a title="详情"  onclick="x_admin_show('用户详情','/userinfo/{{ $val['id'] }}/edit',1000,400)" href="javascript:;">
                <i class="layui-icon">&#xe642;</i>
              </a>
              <!-- <a onclick="x_admin_show('修改密码','member-password.html',600,400)" title="修改密码" href="javascript:;">
                <i class="layui-icon">&#xe631;</i>
              </a>
              <a title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                <i class="layui-icon">&#xe640;</i>
              </a> -->
            </td>
          </tr>
        @endforeach
        <!-- 单条前台用户列表结束 -->

        </tbody>
      </table>

      <!-- 分页开始 -->
      <div class="page">
        {{ $user->links() }}
      </div>
      <!-- 分页结束 -->

    </div>
    <script>
      layui.use('laydate', function(){
        var laydate = layui.laydate;
        
        //执行一个laydate实例
        laydate.render({
          elem: '#start' //指定元素
        });

        //执行一个laydate实例
        laydate.render({
          elem: '#end' //指定元素
        });
      });

       /*用户-停用*/
      function member_stop(obj,id){
          layer.confirm('确认要冻结吗？',function(index){

              if($(obj).attr('title')=='冻结'){

                //发异步把用户状态进行更改
                $(obj).attr('title','启用')
                $(obj).find('i').html('&#xe62f;');

                $(obj).parents("tr").find(".td-status").find('span').addClass('layui-btn-disabled').html('已冻结');
                layer.msg('已冻结!',{icon: 5,time:1000});

              }else{
                $(obj).attr('title','冻结')
                $(obj).find('i').html('&#xe601;');

                $(obj).parents("tr").find(".td-status").find('span').removeClass('layui-btn-disabled').html('已启用');
                layer.msg('已启用!',{icon: 5,time:1000});
              }
              
          });
      }

      /*用户-删除*/
      // function member_del(obj,id){
      //     layer.confirm('确认要删除吗？',function(index){
      //         //发异步删除数据
      //         $(obj).parents("tr").remove();
      //         layer.msg('已删除!',{icon:1,time:1000});
      //     });
      // }



      // function delAll (argument) {

      //   var data = tableCheck.getData();
  
      //   layer.confirm('确认要删除吗？'+data,function(index){
      //       //捉到所有被选中的，发异步进行删除
      //       layer.msg('删除成功', {icon: 1});
      //       $(".layui-form-checked").not('.header').parents('tr').remove();
      //   });
      // }
    </script>

  </body>

</html>