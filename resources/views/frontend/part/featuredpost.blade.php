<div class="row" id="hot-wrapper">
    <div class="section" id="hot-section" name="Hot Posts">
      <div class="widget PopularPosts" data-version="2" id="PopularPosts2">
        <div class="widget-content">
          <ul class="hot-posts">
            @foreach($featured_post as $post)
            <li class="hot-item item-0">
            
             <div class="hot-item-inner">
              <a
                class="post-image-link"
                href="{{route('single.post',$post->slug)}}"
              >
                <img
                  alt="{{$post->title}}"
                  class="post-thumb"
                  src="{{URL::to('/')}}/media/posts/{{$post->featured_image}}"
                />
                <div class="post-info-wrap">
                  <div class="post-info">
                    <span class="post-tag">
                      @foreach($post->categories as $cat_name)
                          {{$cat_name->name}}
                      @endforeach
                    </span>
                    <h2 class="post-title">
                      <a
                        href="{{route('single.post',$post->slug)}}"
                        >{{$post->title}}</a
                      >
                    </h2>
                    <div class="post-meta">
                      <span class="post-author">{{$post->user->name}}</span
                      ><span
                        class="post-date published"
                        datetime="{{ \Carbon\Carbon::parse($post->created_at)->format('M d,Y')}}"
                        >{{ \Carbon\Carbon::parse($post->created_at)->format('M d,Y')}}
                        </span
                      >
                    </div>
                  </div>
                </div>
              </a>
            </div>


            
            </li>
            @endforeach

          </ul>
        </div>
      </div>
    </div>
  </div>