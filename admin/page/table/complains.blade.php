@extends('admin.page.complain');


@section('table')
    <table id="data-table-default" class="table-hover tableOrder table table-striped table-bordered table-td-valign-middle" style="table-layout: fixed; width: 100%;">
        <thead>
        <tr>
            <th width="1%" style="width: 20px;">ID</th>
            <th class="text-nowrap" style=" width: 100px; " >Date Create</th>
            <th class="text-nowrap" style=" width: 100px; " >Author</th>
            <th class="text-nowrap" style=" width: 400px " >Text</th>
            <th class="text-nowrap" style=" width: 100px; " >To</th>
            <th class="text-nowrap" style=" width: 60px; " >Block</th>
            <th class="text-nowrap" style=" width: 60px; " >Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($complains as $complain)
            @php
                $colorAuthor = '#348fe2';
                if($complain->author_userType == 'provider'){
                    $colorAuthor = "#fb5597";
                }

                $colorFor = '#348fe2';
                if($complain->for_userType == 'provider'){
                    $colorFor = "#fb5597";
                }

            @endphp

            <tr class="odd gradeX">
                <td width="1%" class="f-s-600 text-inverse">{{$complain->id}}</td>
                <td class="text-center" >{{$complain->created_at}}</td>
                <td>
                    <a href="{{ route('client',['id'=>$complain->author_id]) }}" style="color: {{$colorAuthor}}"  target="_blank">
                        ({{$complain->author_userType}}) <b>{{$complain->author_name}}</b>
                    </a>
                </td>
                <td>
                    {{$complain->text}}
                </td>
                <td>
                    <a href="{{ route('client',['id'=>$complain->for_id]) }}" target="_blank" style="color: {{$colorFor}}">
                        {{$complain->for_name}} (<smal>{{$complain->for_userType}}</smal>)
                    </a>
                </td>
                <td>
                    <span style="opacity: 0; position: absolute;"> {{$complain->block}} </span>
                    <!-- switcher -->
                    <div class="switcher switcher-danger">
                        <input type="checkbox" name="block" @if($complain->block) checked="" @endif id="switcher_checkbox_blockUser_{{$complain->id}}" data-id="{{$complain->for_id}}" value="1" class="switcher_checkbox_blockUser  switcher_checkbox_blockUser_{{$complain->for_id}}" >
                        <label for="switcher_checkbox_blockUser_{{$complain->id}}"></label>
                    </div>
                </td>
                <td>
                    <a href="#modal-deleteComplain" class=" jsActionDeleteComplain label label-danger"  data-id="{{$complain->id}}"  data-text="{{$complain->text}}" data-toggle="modal">Delete</a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection;
