<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets') }}/img/apple-icon.png">
  <link rel="icon" type="image/png" href="{{ asset('assets') }}/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!-- Extra details for Live View on GitHub Pages -->
  <!-- Canonical SEO -->
  <link rel="canonical" href="" />

  <!--  Social tags      -->
  <meta name="keywords" content="Al-Syed Store">
  <meta name="description" content="POS Dashboard">

  <!-- Schema.org markup for Google+ -->
  <meta itemprop="name" content="POS Dashboard by Al-Syed Store">
  <meta itemprop="description" content="POS Dashboard">

  <meta itemprop="image" content="">

  <!-- Twitter Card data -->
  <meta name="twitter:card" content="product">
  <meta name="twitter:site" content="">
  <meta name="twitter:title" content="[POS Dashboard] by Al-Syed Store">

  <meta name="twitter:description" content="POS Dashboard">
  <meta name="twitter:creator" content="">
  <meta name="twitter:image" content="">

  <!-- Open Graph data -->
  <meta property="fb:app_id" content="655968634437471">
  <meta property="og:title" content="POS Dashboard by Al-Syed Store" />
  <meta property="og:type" content="article" />
  <meta property="og:url" content="" />
  <meta property="og:image" content=""/>
  <meta property="og:description" content="POS Dashboard" />
  <meta property="og:site_name" content="Al-Syed Store" />
  
  <title>
    POS Dashboard by Al-Syed Store
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="{{ asset('assets') }}/css/bootstrap.min.css" rel="stylesheet" />
  <link href="{{ asset('assets') }}/css/now-ui-dashboard.css?v=1.3.0" rel="stylesheet" />
  {{-- <link href="{{ asset('assets') }}/css/dropzone.css')" media="all" rel="stylesheet" type="text/css" /> --}}
  <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('assets') }}/demo/demo.css" rel="stylesheet" />
  <!-- Google Tag Manager -->
  {{-- <script>
    (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-NKDMSK6');
  </script> --}}
  <!-- End Google Tag Manager -->
  <script>
    // Facebook Pixel Code Don't Delete
    ! function(f, b, e, v, n, t, s) {
      if (f.fbq) return;
      n = f.fbq = function() {
        n.callMethod ?
          n.callMethod.apply(n, arguments) : n.queue.push(arguments)
      };
      if (!f._fbq) f._fbq = n;
      n.push = n;
      n.loaded = !0;
      n.version = '2.0';
      n.queue = [];
      t = b.createElement(e);
      t.async = !0;
      t.src = v;
      s = b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t, s)
    }(window,
      document, 'script', '//connect.facebook.net/en_US/fbevents.js');
    try {
      fbq('init', '111649226022273');
      fbq('track', "PageView");
    } catch (err) {
      console.log('Facebook Track Error:', err);
    }
  </script>
</head>

<body class="{{ $class ?? '' }}">
  <noscript>
    <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=111649226022273&ev=PageView&noscript=1" />
  </noscript>
  <!-- Google Tag Manager (noscript) -->
  <noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe>
  </noscript>
  <!-- End Google Tag Manager (noscript) -->
  <div class="wrapper">
    @auth
      @include('layouts.page_template.auth')
    @endauth
    @guest
      @include('layouts.page_template.guest')
    @endguest
  </div>
  <!--   Core JS Files   -->
  <script src="{{ asset('assets') }}/js/core/jquery.min.js"></script>
  <script src="{{ asset('assets') }}/js/core/popper.min.js"></script>
  <script src="{{ asset('assets') }}/js/core/bootstrap.min.js"></script>
  <script src="{{ asset('assets') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="{{ asset('assets') }}/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('assets') }}/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for POS Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('assets') }}/js/now-ui-dashboard.min.js?v=1.3.0" type="text/javascript"></script>
  {{-- <script src="{{ asset('assets') }}/js/dropzone.js" type="text/javascript"></script> --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
  <!-- POS Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{ asset('assets') }}/demo/demo.js"></script>
  @stack('js')
  <script>
    $(document).on('click','#newImage', function(){
        var image_src = $('.thumbnail.selected').children('img').attr('src');
      if(image_src != undefined){
        $('#selectedthumbnail').html('<img src="'+image_src+'" class = "thumbnail" style="max-height: 100px; margin-top: 20px;">');
        $('#selectedthumbnail').show();
        $('#image-close').show();
        $('#imageselected').removeClass('has-error');
        $('#newImage').removeClass('field-validate');
        $('.thumbnail.selected').removeClass('selected');
        alert('abcdefgh');
      }
      alert('hgfedcba');
    });
    $(document).on('click','#image-close', function(){
      $("select.show-html:not(#countertop_countertype_id)").val('').imagepicker({
            // show_label:   true,
            clicked:function(){
                $(this).find("option[value='" + $(this).val() + "']").empty();
            }
        });
        $('#selectedthumbnail').hide();
        $('#image-close').hide();
        $('#imageselected').removeClass('has-error');
    });
  </script>
  <script>
    function loadPreview(input, id) {
      id = id || '#preview_img';
      if (input.files && input.files[0]) {
          var reader = new FileReader();
   
          reader.onload = function (e) {
              $(id)
                      .attr('src', e.target.result)
                      .width(130)
                      .height(100);
          };
   
          reader.readAsDataURL(input.files[0]);
      }
   }
  </script>
  {{-- <script type="text/javascript">
    Dropzone.options.myDropzone = {
        maxFilesize         :       1,
        acceptedFiles: ".jpeg,.jpg,.png,.gif"
    };
  </script> --}}
  {{-- <script>
    Dropzone.options.myDropzone = {
    paramName: 'file',
    maxFilesize: 5, // MB
    maxFiles: 20,
    acceptedFiles: ".jpeg,.jpg,.png,.gif",
    // uploadMultiple: true,
    // addRemoveLinks: true,
    // maxFiles:8,
    // parallelUploads : 100,
    // maxFilesize:5,
      init: function() {
          this.on("success", function(file, response) {
              var a = document.createElement('span');
              // a.className = "thumb-url btn btn-info";
              a.setAttribute('data-clipboard-text','{{url('admin/media/uploadimage')}}'+'/'+response);
              // a.innerHTML = "copy url";
              file.previewTemplate.appendChild(a);

          });

          this.on("success", function(){
              $("#compelete").removeAttr("disabled");
              $("#compelete").click(function(){

              location.reload()})});

      }
    };
  </script> --}}
</body>

</html>