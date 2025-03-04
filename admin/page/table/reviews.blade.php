@extends('admin.page.review');


@section('table')
    <table id="data-table-select" class=" tableOrder table table-striped table-hover table-bordered table-td-valign-middle" style="table-layout: fixed; ">
        <thead>
        <tr>
            <th width="1%" style="width: 14px;">ID</th>
            <th class="text-nowrap" style="width: 117px; " >Date Create</th>
            <th class="text-nowrap" style="width: 70px;" >Author</th>
            <th class="text-nowrap" style="width: 60px; " >Rating</th>
            <th class="text-nowrap" style=" width: 400px;   " >Text</th>
            <th class="text-nowrap" style="width: 100px;  " >To</th>
            <th class="text-nowrap" style="width: 50px;   " >Show</th>
            <th class="text-nowrap" style="width: 50px;" >Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($reviews as $review)
            @php
                $colorAuthor = '#348fe2';
                if($review->author_type == 'provider'){
                    $colorAuthor = "#fb5597";
                }

                $colorFor = '#348fe2';
                if($review->torType == 'provider'){
                    $colorFor = "#fb5597";
                }
            @endphp
            <tr class="odd gradeX">

                <td width="1%" class="f-s-600 text-inverse">{{$review->id}}</td>
                <td class="text-center" >{{$review->created_at}}</td>
                <td>
                    <a href="{{ route('client',['id'=>$review->author_id]) }}" style="color: {{$colorAuthor}}"  target="_blank" class="text-center">
                        ({{$review->author_type}}) <b>{{$review->autor}}</b>
                    </a>
                </td>
                <td>
                    <span style="opacity: 0; position: absolute;"> {{$review->ratting}} </span>
                    <input type="number" name="rating" step="0.5" min="1" max="5" class="inputRattingReview form-control form-control-lg" data-review-id="{{$review->id}}" value="{{$review->ratting}}">
                </td>
                <td>

                    <span style="opacity: 0; position: absolute;"> {{$review->text}} </span>
                    <input type="text" name="text" class="inputTextReview form-control form-control-lg" data-review-id="{{$review->id}}" value="{{$review->text}}">
                </td>
                <td><a href="{{ route('client',['id'=>$review->comment_for]) }}" style="color:{{$colorFor}} "  target="_blank">{{$review->targerUser}} ({{$review->torType }})</a></td>
                <td>
                    <!-- switcher -->
                    <div class="switcher switcher-danger">
                        <span style="opacity: 0; position: absolute;"> {{$review->block}} </span>
                        <input type="checkbox" name="block" @if($review->block == 0) checked="" @endif class="switcher_checkbox_blockReview" id="switcher_checkbox_blockUser_{{$review->id}}" data-id="{{$review->id}}" value="1">
                        <label for="switcher_checkbox_blockUser_{{$review->id}}"></label>
                    </div>
                </td>
                <td>
                    <a href="#modal-deleteReview" class=" jsActionDeleteReview label label-danger"  data-id="{{$review->id}}"  data-text="{{$review->text}}" data-toggle="modal">Delete</a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection;
