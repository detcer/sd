@extends( 'admin.start' );

@section( 'content' )
    <div id="content" class="content">
        <!-- begin breadcrumb -->
        <ol class="breadcrumb float-xl-right">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route( 'admin.categories.index' ) }}">Категории</a></li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">{{ $title ?? "Категории" }}</h1>
        <!-- end page-header -->
        <!-- begin panel -->
        <div class="panel panel-inverse">
            <!-- begin panel-heading -->
            <div class="panel-heading">
                <h4 class="panel-title"></h4>
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <!-- end panel-heading -->
            <!-- begin panel-body -->
            <div class="panel-body" style="overflow: auto">
                @yield( 'table' )
            </div>
            <!-- end panel-body -->
        </div>
        <!-- end panel -->
    </div>

    <div class="modal fade" id="modal-deleteComplain">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete complain</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger m-b-0">
                        <h5><i class="fa fa-info-circle"></i> Delete complain!</h5>
                        <p>Are you sure you want to delete the complain?</p>
                    </div>
                    <p>
                        <br>
                    </p>
                    <div class="alert alert-secondary" role="alert" id="textComplain">

                    </div>
                </div>
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>

                    <button class="btn btn-danger" data-dismiss="modal" data-id="" id="actionDeleteComplain">
                        Delete
                    </button>
                </div>
            </div>
        </div>
    </div>



@endsection;
