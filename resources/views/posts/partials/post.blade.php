 {{-- @break($key == 2)
    @continue($key ==1) --}}
    @if($loop->odd)
    <div style="background-color: lightgreen">{{ $key }}.{{ $post['title'] }}</div>
    <h1 style="background-color: lightgreen">{{ $key }}.{{ $post['content'] }}</h1>
    @else
    <div>{{ $key }}.{{ $post['title'] }}</div>
    <h1 >{{ $key }}.{{ $post['content'] }}</h1>
    @endif