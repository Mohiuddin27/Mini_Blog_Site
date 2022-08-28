


@foreach($cats->posts as $post)
<div class='blog-post hentry index-post'>
    <div class='index-post-inside-wrap'>
        <div class='post-image-wrap'>
            <a class='post-image-link'
                href='{{route('single.post',$post->slug)}}'>
                <img alt='{{$post->title}}'
                    class='post-thumb'
                    src='{{URL::to('/')}}/media/posts/{{$post->featured_image}}' />
            </a>
        </div>
        <div class='post-info-wrap'>
            <div class='post-info'>
                <a class='post-tag'
                    href='https://kate-soratemplates.blogspot.com/search/label/Business'>
                    @foreach($post->categories as $cat_name)
                    {{$cat_name->name}}
                @endforeach
                </a>
                <h2 class='post-title'>
                    <a
                        href='{{route('single.post',$post->slug)}}'>{{$post->title}}</a>
                </h2>
            </div>
            <div class='index-post-footer'>
                <div class='post-meta'>
                    <span class='post-author'><a
                            href='https://www.blogger.com/profile/10687789128527805451'
                            target='_blank' title='Sora Blogging Tips'>{{$post->user->name}}</a></span>
                    <span class='post-date published'
                        datetime='2016-03-17T00:57:00-07:00'>{{ \Carbon\Carbon::parse($post->created_at)->format('M d,Y')}}</span>
                </div>
                <p class='post-snippet'>Lorem Ipsum is simply dummy text of the
                    printing and typesetting industry. Lorem Ipsum has been the
                    industry&#39;s standard dummy text ever since the 1500s, when an
                    unknown printer took a galley of type and scrambled it to make a
                    type specimen book Lorem Ipsum has been the industry&#39;s
                    standard dummy text ever since the 1500s,&#8230;</p>
                <a class='read-more'
                    href='https://kate-soratemplates.blogspot.com/2016/03/camping-in-abandoned-house-under-starry_17.html'>Read
                    more</a>
            </div>
        </div>
    </div>
</div>
@endforeach