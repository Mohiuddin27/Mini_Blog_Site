<div id="main-wrapper">
    <div class="main section" id="main" name="Main Posts">
      <div class="widget Blog" data-version="2" id="Blog1">
        <div class="blog-posts hfeed container index-post-wrap">
          <div class="grid-posts">
            @foreach ($all_post as $post )
            <div class="blog-post hentry index-post">
                <div class="index-post-inside-wrap">
                  <div class="post-image-wrap">
                    <a
                      class="post-image-link"
                      href="{{route('single.post',$post->slug)}}"
                    >
                      <img
                        alt="I like fishing because it is always the great way of relaxing"
                        class="post-thumb"
                        src="{{URL::to('/')}}/media/posts/{{$post->featured_image}}"
                      />
                    </a>
                  </div>
                  <div class="post-info-wrap">
                    <div class="post-info">
                      <a
                        class="post-tag"
                        href="{{route('single.post',$post->slug)}}"
                      >
                      @foreach($post->categories as $cat_name)
                      {{$cat_name->name}}
                  @endforeach

                      </a>
                      <h2 class="post-title">
                        <a
                          href="{{route('single.post',$post->slug)}}"
                          >{{$post->title}}</a
                        >
                      </h2>
                    </div>
                    <div class="index-post-footer">
                      <div class="post-meta">
                        <span class="post-author"
                          ><a
                            href="https://www.blogger.com/profile/10687789128527805451"
                            target="_blank"
                            title="Sora Blogging Tips"
                            >{{$post->user->name}}</a
                          ></span
                        >
                        <span
                          class="post-date published"
                          datetime="{{ \Carbon\Carbon::parse($post->created_at)->format('M d,Y')}}"
                          >{{ \Carbon\Carbon::parse($post->created_at)->format('M d,Y')}}</span
                        >
                      </div>
                      <p class="post-snippet">
                        Lorem Ipsum is simply dummy text of the printing
                        and typesetting industry. Lorem Ipsum has been the
                        industry&#39;s standard dummy text ever since the
                        1500s, when an unknown printer took a galley of
                        type and scrambled it to make a type specimen book
                        Lorem Ipsum has been the industry&#39;s standard
                        dummy text ever since the 1500s,&#8230;
                      </p>
                      <a
                        class="read-more"
                        href="https://kate-soratemplates.blogspot.com/2016/03/i-like-fishing-because-it-is-always_18.html"
                        >Read more</a
                      >
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
           

          </div>

        </div>
     
        <div class="blog-pager container" id="blog-pager">
          {{ $all_post-> links()}}
        </div>
      </div>
    </div>
  </div>