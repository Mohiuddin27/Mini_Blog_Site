<div class="widget Label" data-version="2" id="Label3">
    <div class="widget-title">
      <h3 class="title">Categories</h3>
    </div>
    <div class="widget-content list-label">
      <ul>
        @php

        $categories = App\Models\Category::latest()->get();
       @endphp
       @foreach($categories as $cat)
        <li>
          <a
            class="label-name"
            href="{{route('show.category.wise',$cat->slug)}}"
          >
           {{$cat->name}}
            <span class="label-count">({{count($cat->posts)}})</span>
          </a>
        </li>
        @endforeach

      </ul>
    </div>
  </div>