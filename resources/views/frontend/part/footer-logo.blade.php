<div class="widget Image" data-version="2" id="Image150">
    <a
      class="footer-logo custom-image"
      href="{{route('home.index')}}"
    >
      <img
        alt="Kate"
        id="Image150_img"
        src="{{URL::to('/')}}/media/settings/logo/{{$allsetting->logo}}"
      />
    </a>
    <p class="image-caption excerpt">
    {{$allsetting->footer_paragraph}}
    </p>
  </div>