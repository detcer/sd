@extends('admin.page.other');


@section('table')
    <table id="data-table-default" class=" table-hover tableOrder  table table-striped table-bordered table-td-valign-middle">
        <thead>
        <tr>
            <th width="1%" data-orderable="false"></th>
            <th width="1%">ID</th>
            <th class="text-nowrap">Date Create</th>
            <th class="text-nowrap">Page name</th>
            <th class="text-nowrap">Title</th>
            <th class="text-nowrap">Description</th>
            <th class="text-nowrap">Edit</th>
            <th class="text-nowrap">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pages as $page)
            <tr class="odd gradeX">
                <td width="1%" class="with-img"><img src="{{asset('admin/assets/img/user.png')}} " class="img-rounded height-30" /></td>
                <td width="1%" class="f-s-600 text-inverse">{{$page->id}}</td>
                <td  class="text-center">{{$page->created_at}}</td>
                <td>
                    <a href="{{route('page',['pageName' => $page->pageName ])}}">
                        {{$page->pageName}}
                    </a>
                </td>
                <td>{{$page->title}}</td>
                <td>{{$page->description}}</td>
                <td>
                    <a href="{{route('admin.page.other.edit',['id'=>$page->id])}}" class=" jsActionDeleteUser label label-warning" target="__blank">Edit</a>
                </td>
                <td>
{{--                    <a href="#modal-delete" class=" jsActionDeleteUser label label-danger"  data-userName="{{$page->name}}" data-id="{{$page->id}}" data-toggle="modal">Delete</a>--}}
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection;
