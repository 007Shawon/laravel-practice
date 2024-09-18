 {{-- @break($key == 2)
    @continue($key ==1) --}}
    @if($loop->even)
    <div style="background-color: lightgreen">{{ $key }}.{{ $post['title'] }}</div>
    {{-- <h1 style="background-color: lightgreen">{{ $key }}.{{ $post['content'] }}</h1> --}}
    @else
    <div>{{ $key }}.{{ $post->title }}</div>
    {{-- <h1 >{{ $key }}.{{ $post->content }}</h1> --}}
    @endif

    <div>
      <form action="{{ route('posts.destroy',['post'=>$post->id]) }}" method="POST">
         @csrf
         @method('DELETE')
         <input type="submit" value="Delete!">
      </form>
    </div>