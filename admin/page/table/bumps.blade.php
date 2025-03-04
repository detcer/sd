@extends('admin.page.users');


@section('table')
    <table id="data-table-default" class=" table-hover tableOrder  table table-striped table-bordered table-td-valign-middle">
    <thead>
    <tr>
        <th width="1%" data-orderable="false"></th>
        <th width="1%">ID</th>
        <th class="text-nowrap">Login</th>
        <th class="text-nowrap">Email</th>
        <th class="text-nowrap">USD</th>
        <th class="text-nowrap">Bumps</th>
        <th class="text-center text-nowrap">Update</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr class="odd gradeX" id="user_{{$user->id}}">
            <td width="1%" class="with-img"><img src="{{asset('admin/assets/img/user.png')}} " class="img-rounded height-30" /></td>
            <td width="1%" class="f-s-600 text-inverse">{{$user->id}}</td>
            <td><a href="{{ route('client',['id'=>$user->id]) }}" target="_blank">{{$user->name}}</a></td>
            <td>{{$user->email}}</td>
            <td>
                <span style="opacity: 0; position: absolute;"> {{$user->money}} </span>
                <input type="number" class="form-control money" placeholder="Enter money" value="{{$user->money}}"/>

            </td>
            <td>
                <span style="opacity: 0; position: absolute;"> {{$user->bumps}} </span>
                <input type="number" class="form-control bumps" placeholder="Enter bumps" value="{{$user->bumps}}"/>

            </td>
            <td>
                <a href="javascript:;" data-id="{{$user->id}}" class="updateUser toggleSpin btn btn-success btn-icon btn-circle btn-lg" style="padding: 8px; margin: 0 auto;display: block;">
                    <i class="fa fa-redo"></i>
                </a>
            </td>
        </tr>
    @endforeach

    </tbody>
</table>
@endsection;
