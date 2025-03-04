@php
    $i = 1;
    $a = 0;
@endphp
@foreach($state as $s)
    @if($i == 5) @break @endif
    <div data-state="{{$s->id}}">

        <h3 class="state-xl" >{{$s->name}}</h3>

        @foreach($city as &$c)
            @if($c->state_id == $s->id)
                @if($a == 10)  @endif
                <a href="{{route('searchFilter',['state' => $s->id, 'city' => $c->id ])}}"  data-city="{{$c->id}}" class="state-sm">{{$c->name}}</a>

                @php
                    unset($c);

                    $a++;
                @endphp
            @endif
        @endforeach

    </div>

    @php
        $i++;
        $a = 0;

    @endphp
@endforeach
