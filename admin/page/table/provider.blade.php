@extends('admin.page.users');


@section('table')
    <table id="data-table-default" class=" table-hover tableOrder  table table-striped table-bordered table-td-valign-middle">
    <thead>
    <tr>
        <th width="1%" data-orderable="false"></th>
        <th width="1%">ID</th>
        <th class="text-nowrap">Date Create</th>
        <th class="text-nowrap">Login</th>
        <th class="text-nowrap">Email</th>
        <th class="text-nowrap">Phone</th>
        <th class="text-nowrap">Password (hash)</th>
        <th class="text-nowrap">List ads</th>
        <th class="text-nowrap">Delete</th>
        <th class="text-nowrap">Block</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr class="odd gradeX">
            <td width="1%" class="with-img"><img src="{{asset('admin/assets/img/user.png')}} " class="img-rounded height-30" /></td>
            <td width="1%" class="f-s-600 text-inverse">{{$user->id}}</td>
            <td class="text-center" >{{$user->created_at}}</td>
            <td><a href="{{ route('client',['id'=>$user->id]) }}" target="_blank" style="color: #fb5597;">{{$user->name}}</a></td>
            <td>{{$user->email}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->password}}</td>
            <td>
                @foreach($user['ads'] as $ad)
                    <p>
                        <a href="{{route('viewModel',['id' => $ad->slug ])}}" target="_blank">{{$ad->name}}</a>
                    </p>
                @endforeach
            </td>
            <td>
                <a href="#modal-delete" class=" jsActionDeleteUser label label-danger"  data-userName="{{$user->name}}" data-id="{{$user->id}}" data-toggle="modal">Delete</a>
            </td>
            <td>
                <span style="opacity: 0; position: absolute;"> {{$user->block}} </span>
                <!-- switcher -->
                <div class="switcher switcher-danger">
                    <input type="checkbox" name="block" @if($user->block) checked="" @endif class="switcher_checkbox_blockUser" id="switcher_checkbox_blockUser_{{$user->id}}" data-id="{{$user->id}}" value="1">
                    <label for="switcher_checkbox_blockUser_{{$user->id}}"></label>
                </div>
            </td>
        </tr>
    @endforeach

    </tbody>
</table>
@endsection;
