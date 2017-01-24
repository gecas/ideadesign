<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->



    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>idea&design valdymo pultas</title>
        <link rel="icon" type="image/ico" href="/assets/images/favicon.ico" />
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">




        <!-- ============================================
        ================= Stylesheets ===================
        ============================================= -->
        <!-- vendor css files -->
        <link rel="stylesheet" href="/assets/css/vendor/bootstrap.min.css">
        <link rel="stylesheet" href="/assets/css/vendor/animate.css">
        <link rel="stylesheet" href="/assets/css/vendor/font-awesome.min.css">
        <link rel="stylesheet" href="/assets/js/vendor/animsition/css/animsition.min.css">
        <link rel="stylesheet" href="/assets/js/vendor/daterangepicker/daterangepicker-bs3.css">
        <link rel="stylesheet" href="/assets/js/vendor/morris/morris.css">
        <link rel="stylesheet" href="/assets/js/vendor/owl-carousel/owl.carousel.css">
        <link rel="stylesheet" href="/assets/js/vendor/owl-carousel/owl.theme.css">
        <link rel="stylesheet" href="/assets/js/vendor/rickshaw/rickshaw.min.css">
        <link rel="stylesheet" href="/assets/js/vendor/datetimepicker/css/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="/assets/js/vendor/datatables/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="/assets/js/vendor/datatables/datatables.bootstrap.min.css">
        <link rel="stylesheet" href="/assets/js/vendor/chosen/chosen.css">
        <link rel="stylesheet" href="/assets/js/vendor/summernote/summernote.css">
        <link rel="stylesheet" href="/sweetalert/dist/sweetalert.css">
        <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon.png">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,300&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.12.5/css/jquery.fileupload.css">

        <!-- project main css files -->
        <link rel="stylesheet" href="/assets/css/main.css">
        <!--/ stylesheets -->

    
        <style>
        .admin-main{
            font-family: 'Open Sans', sans-serif;
        }
        .dropzone{
          height: auto;
          position: relative;
          width: 85%;
        }
        .flash {
          background: #F6624A;
          color: #fff;
          width: 200px;
          position: fixed;
          right: 20px;
          bottom: 20px;
          padding: 1em;
          display: none;
         }
        .flash::after{
        content: '';
        position: absolute;
        left: -20px;
        top: 5px;
        border-left: 10px solid transparent;
        border-top: 10px solid transparent;
        border-right: 10px solid #F6624A;
        border-bottom: 10px solid transparent;
        } 
        </style>
        <!-- ==========================================
        ================= Modernizr ===================
        =========================================== -->
        <script src="https://code.jquery.com/jquery-2.2.4.js"></script>
        <script src="/assets/js/vendor/modernizr/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <!--/ modernizr -->
        
    </head>





    <body id="minovate" class="appWrapper admin-main">






        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- ====================================================
        ================= Application Content ===================
        ===================================================== -->
        <div id="wrap" class="animsition">






            <!-- ===============================================
            ================= HEADER Content ===================
            ================================================ -->
            <section id="header">
                <header class="clearfix">

                    <!-- Branding -->
                    <div class="branding">
                        <a class="brand" href="/admin">
                            <span><strong>idea</strong>&design</span>
                        </a>
                        <a role="button" tabindex="0" class="offcanvas-toggle visible-xs-inline"><i class="fa fa-bars"></i></a>
                    </div>
                    <!-- Branding end -->



                    <!-- Search -->
                    {{-- <div class="search" id="main-search">
                        <input type="text" class="form-control underline-input" placeholder="Search...">
                    </div> --}}
                    <!-- Search end -->

                </header>

            </section>
            <!--/ HEADER Content  -->





            <!-- =================================================
            ================= CONTROLS Content ===================
            ================================================== -->
            <div id="controls">





                <!-- ================================================
                ================= SIDEBAR Content ===================
                ================================================= -->
                <aside id="sidebar">


                    <div id="sidebar-wrap">

                        <div class="panel-group slim-scroll" role="tablist">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#sidebarNav">
                                            Navigacija <i class="fa fa-angle-up"></i>
                                        </a>
                                    </h4>
                                </div>
                                <div id="sidebarNav" class="panel-collapse collapse in" role="tabpanel">
                                    <div class="panel-body">


                                        <!-- ===================================================
                                        ================= NAVIGATION Content ===================
                                        ==================================================== -->
                                        <ul id="navigation">
                                            <li class="active"><a href="/admin"><i class="fa fa-dashboard"></i> <span>Valdymo pultas</span></a></li>
                                            {{-- <li>
                                                <a role="button" tabindex="0"><i class="fa fa-picture-o"></i> <span>Tapetai</span> </a>
                                                <ul>
                                                    <li><a href="/admin/wallpapers/categories/create"><i class="fa fa-caret-right"></i> Sukurti naują gamintoją</a></li>
                                                    <li><a href="/admin/wallpapers/categories"><i class="fa fa-caret-right"></i> Visi gamintojai</a></li>
                                                    <li><a href="/admin/wallpapers"><i class="fa fa-caret-right"></i> Peržiūrėti</a></li>
                                                    <li><a href="/admin/wallpapers/create"><i class="fa fa-caret-right"></i> Pridėti naują</a></li>
                                                </ul>
                                            </li> --}}
                                            <li>
                                                <a role="button" tabindex="0"><i class="fa fa-newspaper-o"></i> <span>Naujienos</span></a>
                                                <ul>
                                                    <li><a href="/admin/news"><i class="fa fa-caret-right"></i> Peržiūrėti naujienas</a></li>
                                                    <li><a href="/admin/news/create"><i class="fa fa-caret-right"></i> Sukurti naujieną</a></li>
                                                </ul>
                                            </li>

                                            <li>
                                                <a role="button" tabindex="0"><i class="fa fa-file-image-o"></i> <span>Navigacijos nuotraukos</span></a>
                                                <ul>
                                                    <li><a href="/admin/nav-photos/news"><i class="fa fa-caret-right"></i> Naujienų nuotrauka</a></li>
                                                    <li><a href="/admin/nav-photos/wallpapers"><i class="fa fa-caret-right"></i> Tapetų nuotrauka</a></li>
                                                    <li><a href="/admin/nav-photos/fabrics"><i class="fa fa-caret-right"></i> Audinių nuotrauka</a></li>
                                                    <li><a href="/admin/nav-photos/flooring"><i class="fa fa-caret-right"></i> Parketlenčių nuotrauka</a></li>
                                                    <li><a href="/admin/nav-photos/accessories"><i class="fa fa-caret-right"></i> Aksesuarų nuotrauka</a></li>
                                                    <li><a href="/admin/nav-photos/contacts"><i class="fa fa-caret-right"></i> Kontaktų nuotrauka</a></li>
                                                </ul>
                                            </li>

                                            <li>
                                                <a role="button" tabindex="0"><i class="fa fa-file-image-o"></i> <span>Tapetai</span></a>
                                                <ul>
                                                    <li>
                                                        <a href="/admin/wallpapers/categories" role="button" tabindex="0"><i class="fa fa-caret-right"></i> Tapetų gamintojas</a>
                                                        <ul>
                                                            <li><a href="/admin/wallpapers/categories/create" role="button" tabindex="0"><i class="fa fa-caret-right"></i> Naujas gamintojas</a></li>
                                                            <li><a href="/admin/wallpapers/categories" role="button" tabindex="0"><i class="fa fa-caret-right"></i> Peržiūrėti gamintojus</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a role="button" tabindex="0"><i class="fa fa-caret-right"></i> Tapetai</a>
                                                        <ul>
                                                            <li><a href="/admin/wallpapers/create" role="button" tabindex="0"><i class="fa fa-caret-right"></i> Pridėti tapetų</a></li>
                                                            <li><a href="/admin/wallpapers" role="button" tabindex="0"><i class="fa fa-caret-right"></i> Peržiūrėti tapetus</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>

                                            <li>
                                                <a role="button" tabindex="0"><i class="fa fa-file-image-o"></i> <span>Parketlentės</span></a>
                                                <ul>
                                                    <li>
                                                        <a href="/admin/wallpapers/categories" role="button" tabindex="0"><i class="fa fa-caret-right"></i> Parketlenčių gamintojas</a>
                                                        <ul>
                                                            <li><a href="/admin/flooring/categories/create" role="button" tabindex="0"><i class="fa fa-caret-right"></i> Naujas gamintojas</a></li>
                                                            <li><a href="/admin/flooring/categories" role="button" tabindex="0"><i class="fa fa-caret-right"></i> Peržiūrėti gamintojus</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a role="button" tabindex="0"><i class="fa fa-caret-right"></i> Parketlentės</a>
                                                        <ul>
                                                            <li><a href="/admin/flooring/create" role="button" tabindex="0"><i class="fa fa-caret-right"></i> Pridėti parketlenčių</a></li>
                                                            <li><a href="/admin/flooring" role="button" tabindex="0"><i class="fa fa-caret-right"></i> Peržiūrėti parketlentes</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>

                                            <li>
                                                <a role="button" tabindex="0"><i class="fa fa-file-image-o"></i> <span>Aksesuarai</span></a>
                                                <ul>
                                                    <li>
                                                        <a role="button" tabindex="0"><i class="fa fa-caret-right"></i> Visi aksesuarai</a>
                                                        <ul>
                                                            {{-- <li><a href="/admin/accessories/create" role="button" tabindex="0"><i class="fa fa-caret-right"></i> Pridėti aksesuarų</a></li> --}}
                                                            <li><a href="/admin/accessories/edit" role="button" tabindex="0"><i class="fa fa-caret-right"></i> Peržiūrėti aksesuarus</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>

                                            <li>
                                                <a role="button" tabindex="0"><i class="fa fa-file-image-o"></i> <span>Audiniai</span></a>
                                                <ul>
                                                    <li>
                                                        <a href="/admin/fabrics/categories" role="button" tabindex="0"><i class="fa fa-caret-right"></i> Audinių kategorijos</a>
                                                        <ul>
                                                            <li><a href="/admin/fabrics/categories/create" role="button" tabindex="0"><i class="fa fa-caret-right"></i> Nauja kategorija</a></li>
                                                            <li><a href="/admin/fabrics/categories" role="button" tabindex="0"><i class="fa fa-caret-right"></i> Peržiūrėti kategorijas</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a role="button" tabindex="0"><i class="fa fa-caret-right"></i> Audiniai</a>
                                                        <ul>
                                                            <li><a href="/admin/fabrics/create" role="button" tabindex="0"><i class="fa fa-caret-right"></i> Pridėti audinių</a></li>
                                                            <li><a href="/admin/fabrics" role="button" tabindex="0"><i class="fa fa-caret-right"></i> Peržiūrėti audinius</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>

                                            <li class=""><a href="/logout"><i class="fa fa-sign-out"></i> <span>Atsijungti</span></a></li>



                                        </ul>
                                        <!--/ NAVIGATION Content -->


                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                </aside>
                <!--/ SIDEBAR Content -->





                <!-- =================================================
                ================= RIGHTBAR Content ===================
                ================================================== -->
                <aside id="rightbar">

                    <div role="tabpanel">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#users" aria-controls="users" role="tab" data-toggle="tab"><i class="fa fa-users"></i></a></li>
                            <li role="presentation"><a href="#history" aria-controls="history" role="tab" data-toggle="tab"><i class="fa fa-clock-o"></i></a></li>
                            <li role="presentation"><a href="#friends" aria-controls="friends" role="tab" data-toggle="tab"><i class="fa fa-heart"></i></a></li>
                            <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab"><i class="fa fa-cog"></i></a></li>
                        </ul>

                    </div>

                </aside>
                <!--/ RIGHTBAR Content -->




            </div>
            <!--/ CONTROLS Content -->




            <!-- ====================================================
            ================= CONTENT ===============================
            ===================================================== -->
            <section id="content">
                @yield('content')
            </section>
            <!--/ CONTENT -->


        </div>
        <!--/ Application Content -->


        <!-- ============================================
        ============== Vendor JavaScripts ===============
        ============================================= -->
        
        {{-- <script>window.jQuery || document.write('<script src="/assets/js/vendor/jquery/jquery-1.11.2.min.js"><\/script>')</script> --}}

        <script src="/assets/js/vendor/bootstrap/bootstrap.min.js"></script>

        <script src="/assets/js/vendor/jRespond/jRespond.min.js"></script>

        <script src="/assets/js/vendor/d3/d3.min.js"></script>
        <script src="/assets/js/vendor/d3/d3.layout.min.js"></script>

        <script src="/assets/js/vendor/rickshaw/rickshaw.min.js"></script>

        <script src="/assets/js/vendor/sparkline/jquery.sparkline.min.js"></script>

        <script src="/assets/js/vendor/slimscroll/jquery.slimscroll.min.js"></script>

        <script src="/assets/js/vendor/animsition/js/jquery.animsition.min.js"></script>

        <script src="/assets/js/vendor/daterangepicker/moment.min.js"></script>
        <script src="/assets/js/vendor/daterangepicker/daterangepicker.js"></script>

        <script src="/assets/js/vendor/screenfull/screenfull.min.js"></script>

        <script src="/assets/js/vendor/flot/jquery.flot.min.js"></script>
        <script src="/assets/js/vendor/flot-tooltip/jquery.flot.tooltip.min.js"></script>
        <script src="/assets/js/vendor/flot-spline/jquery.flot.spline.min.js"></script>

        <script src="/assets/js/vendor/easypiechart/jquery.easypiechart.min.js"></script>

        <script src="/assets/js/vendor/raphael/raphael-min.js"></script>
        <script src="/assets/js/vendor/morris/morris.min.js"></script>

        <script src="/assets/js/vendor/owl-carousel/owl.carousel.min.js"></script>

        <script src="/assets/js/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

        <script src="/assets/js/vendor/datatables/js/jquery.dataTables.min.js"></script>
        <script src="/assets/js/vendor/datatables/extensions/dataTables.bootstrap.js"></script>

        <script src="/assets/js/vendor/summernote/summernote.min.js"></script>

        <script src="/assets/js/vendor/coolclock/coolclock.js"></script>
        <script src="/assets/js/vendor/coolclock/excanvas.js"></script>
        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <script src="/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.12.5/js/vendor/jquery.ui.widget.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.12.5/js/jquery.fileupload.js"></script>
        <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
        <script src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
        <!-- The Canvas to Blob plugin is included for image resizing functionality -->
        <script src="//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
        <!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
        <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
        <script src="/js/fileupload/jquery.iframe-transport.js"></script>
        <!-- The basic File Upload plugin -->
        <script src="/js/fileupload/jquery.fileupload.js"></script>
        <!-- The File Upload processing plugin -->
        <script src="/js/fileupload/jquery.fileupload-process.js"></script>
        <!-- The File Upload image preview & resize plugin -->
        <script src="/js/fileupload/jquery.fileupload-image.js"></script>
        <!-- The File Upload audio preview plugin -->
        <script src="/js/fileupload/jquery.fileupload-audio.js"></script>
        <!-- The File Upload video preview plugin -->
        <script src="/js/fileupload/jquery.fileupload-video.js"></script>
        <!-- The File Upload validation plugin -->
        <script src="/js/fileupload/jquery.fileupload-validate.js"></script>
        
        <!--/ vendor javascripts -->




        <!-- ============================================
        ============== Custom JavaScripts ===============
        ============================================= -->
        <script src="/assets/js/main.js"></script>
        <!--/ custom javascripts -->

        @yield('scripts')






        <!-- ===============================================
        ============== Page Specific Scripts ===============
        ================================================ -->
        <script>
            
        </script>
        <!--/ Page Specific Scripts -->






        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>

        <script>
    function showMessage(title, message, type){
            swal({   
                title: title,   
                text: message,   
                type: type,   
                timer:1500,
                showConfirmButton:false
            });
        }

         function flashMessage(message){
             var block = document.createElement("div");
             $(block).addClass("flash").html(message);

             $("body").append(block);

             $(block).fadeIn(1000);
             setTimeout(function(){
                 $(block).fadeOut(1000, function(){
                     $(this).remove();
                 });
             }, 2000);
         }
    </script>

     @include ('flash')
    </body>
</html>
