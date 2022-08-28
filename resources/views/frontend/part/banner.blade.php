<div id="intro-wrap">
    <div class="section" id="main-intro" name="Main Intro">
      <div class="widget Image" data-version="2" id="Image1">
        <div class="widget-content">
          <style type="text/css">
            #intro-wrap {
              display: block;
            }
            #main-intro {
              background-image: url({{URL::to('/')}}/media/settings/banner/{{$allsetting->banner}});
            }
          </style>
          <div class="intro-content">
            <h3 class="intro-title">{{$allsetting->banner_heading}}</h3>
            <p class="intro-snippet">
                {{$allsetting->banner_paragraph}}
            </p>
            <div class="intro-action">
              <script type="text/javascript">
                var ilc = "/#Read More",
                  ima = ilc.split("#"),
                  ili = ima[0].trim(),
                  ilt = ima[1].trim(),
                  kod = "<a href=" + ili + ">" + ilt + "</a>";
                document.write(kod);
              </script>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>