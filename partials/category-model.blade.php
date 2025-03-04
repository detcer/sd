
<div class="col-xl-3 col-lg-4 col-md-6 col-12 text-center text-lg-left">

    <div class="worker-girls-box">
        <a class="@if($model['rate'] == 'premium') premium-photo-girl @endif" href="{{ route('viewModel', ['name' => $model['name']]) }}">
            @if(isset($model['src_foto'][0]) && $model['src_foto'][0] != '')
                <img src="{{ asset('storage')  }}/{{$model['src_foto'][0]}}" class=" photo-girls" alt="{{ $model['name'] . " Profile, Escort " . $model['phone'] }}">
            @endif
        </a>
        @if($model['rate'] == 'premium')
            <img src="{{asset('img/icon/prime-smal.svg')}}" class="prime-class" alt="prime">
            @else
                    @php
    $lastTimeBamps = strtotime($model['lastTimeBamps']);
    $today = strtotime('today');
    $yesterday = strtotime('yesterday');
@endphp

@if($lastTimeBamps == $today)
    <p style="top: 0; right: 10px; position: absolute; color: #8E157C; font-weight: 700; " class="date-ads">Today</p>
@elseif($lastTimeBamps == $yesterday)
    <p style="top: 0; right: 10px; position: absolute; color: #8E157C; font-weight: 700; " class="date-ads">Yesterday</p>
@endif
        @endif
                @if($model['verification'] == 'verified')
            <p class="verified-ads">Verified</p>
        @endif



        <div class="worker-spec">
            <!-- <a href="tel:{{$model['phone']}}"> -->
                 <a href="sms:{{$model['phone']}};?&body=Hi,%20{{$model['name']}}!%20I%20saw%20your%20ad%20on%20Secret%20Desire.%20I%20would%20like%20to%20book%20an%20appointment%20on%20___%20for%20___%20hours.">
                <img src="{{asset('img/icon/Phone.svg')}}" alt="">
            </a>
            <a href="#" data-id="{{$model['id']}}"
               class="BigLike to__favorite @if(in_array($model['id'], $fav)) added @endif">
            </a>
            <a href="#" data-toggle="modal" data-target="#userComplaint" class="showModalComplain" data-id="{{$model['user_id']}}">
                <img src="{{asset('img/icon/Flag.svg')}}" alt="">
            </a>
            <a class="review-open" href="{{route('viewModel',['name' => $model['slug']]) }}">
                <span class="messages" style="color: #9d378c;font-weight: bold;">{{$model['comments']}}</span>
                <img src="{{asset('img/icon/Message.svg')}}" alt="">

            </a>
        </div>
        <div class="worker-name-box">
            <p class="worker-name h3"><strong>{{$model['name']}}</strong></p>
            <br>

           <p class="worker-name">
    @php
        $description = $model['description'];
        $truncated = '';
        $words = explode(' ', $description);
        $chars = 0;
        
        foreach ($words as $word) {
            $wordLength = mb_strlen($word);
            if ($chars + $wordLength + 1 <= 250) { // +1 для пробела
                $truncated .= $word . ' ';
                $chars += $wordLength + 1;
            } else {
                break;
            }
        }
        
        $truncated = trim($truncated);
        if ($truncated !== $description) {
            $truncated .= '...';
        }
    @endphp
    {{ $truncated }}
</p>

<!-- <p class="worker-name">{{$model['description']}}</p> -->
        </div>
    </div>
</div>