@extends("backend.layout.main")
@section('after.css')
    <link rel="stylesheet" href="/assets/backend/css/zTreeStyle.css">
    <link rel="stylesheet" href="/assets/backend/css/font-awesome-zTree.css">
@endsection
@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">数据权限</h3>
                    <div class="box-tools">
                        <button id="check-all-true" type="button" class="btn btn-sm btn-flat btn-info">全选</button>
                        <button id="check-all-false" type="button" class="btn btn-sm btn-flat btn-warning">全删</button>
                    </div>
                </div>
                <div class="box-body">
                    <ul id="tree" class="ztree"></ul>
                </div>
                <div class="box-footer">
                    <a href="javascript:history.back(-1);" class="btn btn-default btn-flat">
                        <i class="fa fa-arrow-left"></i>
                        返回
                    </a>
                    <button id="save-role-datarule" type="button" class="btn btn-flat btn-success pull-right">
                        <i class="fa fa-pencil"></i>
                        保存
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("after.js")
    <script src="/assets/backend/js/jquery.ztree.all-3.5.min.js"></script>
    <script type="text/javascript">
        var id = {{ $id }};
        var nodes = {!! $data !!};
        var setting = {
            check: {
                enable: true,
                chkboxType: {"Y": "ps", "N": "ps"}
            },
            data: {
                simpleData: {
                    enable: true
                }
            }
        };

        $(document).ready(function () {
            $.fn.zTree.init($("#tree"), setting, nodes);
            var zTree = $.fn.zTree.getZTreeObj("tree");

            $('#check-all-true').click(function () {
                zTree.checkAllNodes(true);
            });

            $('#check-all-false').click(function () {
                zTree.checkAllNodes(false);
            });

            $('#save-role-datarule').click(function () {
                var tree = zTree.getCheckedNodes(true);

                var datarules = [];
                for (var i = 0; i < tree.length; i++) {
                    datarules.push(Number(tree[i].id));
                }

                Backend.ajax.request({
                    data: {id: id, datarules: datarules},
                    href: "{{route('backend.role.associate.datarule')}}"
                });
            });
        });
    </script>
@endsection
