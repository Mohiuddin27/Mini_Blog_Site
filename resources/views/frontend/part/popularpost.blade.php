<div class="widget-title">
    <h3 class="title">Popular Posts</h3>
  </div>

  <div class="widget-content">
    @foreach($popular_post as $post)
    <div class="post">
      <div class="post-content">
      
        <a
          class="post-image-link"
          href="{{route('single.post',$post->slug)}}"
        >
          <img
            alt="{{$post->title}}"
            class="post-thumb"
            src="{{URL::to('/')}}/media/posts/{{$post->featured_image}}"
          />
        </a>
        <div class="post-info">
          <h2 class="post-title">
            <a
              href="{{route('single.post',$post->slug)}}"
              >{{$post->title}}</a
            ><br>
          </h2>
        </div>
       
      </div>
    </div>
    @endforeach
  </div>
