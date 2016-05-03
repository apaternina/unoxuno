<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head id="ctl00_Head1"><title>:: Portal de Distibuidores - Persianas Pentagrama ::</title>     
      
    <link rel="shortcut icon" type="image/x-icon" href="/Themes/Pentagrama/Images/favicon.ico"/>
    <script src="/JS/jquery-1.4.3.min.js" type="text/javascript"></script>
    <script src="/JS/jquery-1.7.min.js" type="text/javascript"></script>
    <script src="/Themes/Pentagrama/js/jquery.easytree.js" type="text/javascript"></script>
    <script>
        var $jq = $.noConflict(true); //jquery-1.7.min.js
    </script>
    <script src="/JS/main.js?v=1.0" type="text/javascript"></script>
    <script type="text/javascript" src="/js/jquery.validate.js"></script> 
    <script src="/JS/jquery.fancybox-1.3.3.pack.js" type="text/javascript"></script>
    <script src="/Scripts/MicrosoftAjax.debug.js"  type="text/javascript"></script>  
    <script src="/Scripts/MicrosoftMvcAjax.debug.js" type="text/javascript"></script>
    <link href="/styles/jquery-ui-1.8.17.custom.css" rel="stylesheet" type="text/css" />
    <script src="/js/jquery.ui.datepicker-es.js" type="text/javascript"></script>
    <script src="/js/jquery-ui-1.8.9.custom.min.js" type="text/javascript"></script>  
    <script src="/js/jquery.validate.js" type="text/javascript"></script>
    <script src="/Themes/Pentagrama/js/jquery.price_format.1.3.js" type="text/javascript"></script>
    <script src="/Themes/Pentagrama/js/dateFormat.js" type="text/javascript"></script>
    <link href="/Themes/Pentagrama/styles/freeow/freeow.css" rel="stylesheet" type="text/css" />        
    <link href="/Themes/Pentagrama/styles/site.css?v=2.2" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/Styles/jquery.fancybox-1.3.3.css" type="text/css" media="screen" />      
    <script src="/Themes/Pentagrama/js/custom.validator.js?v=2.0" type="text/javascript"></script>
    <link href="/Themes/Pentagrama/styles/jquery.timeentry.css" rel="stylesheet" type="text/css" />
    <script src="/Themes/Pentagrama/js/jquery.timeentry.min.js" type="text/javascript"></script>  
    <link href="/Themes/Pentagrama/styles/easyjstree-skin-win8/ui.easytree.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/Themes/Pentagrama/styles/flexslider.css" type="text/css" media="screen" />  
    <script src="/Themes/Pentagrama/js/jquery.flexslider.js" type="text/javascript"></script> 
<title>

</title>

    <style type="text/css">

    @media (min-width: 768px) {
  .navbar-collapse {
    height: auto;
    border-top: 0;
    box-shadow: none;
    max-height: none;
    padding-left:0;
    padding-right:0;
  }
  .navbar-collapse.collapse {
    display: block !important;
    width: auto !important;
    padding-bottom: 0;
    overflow: visible !important;
  }
  .navbar-collapse.in {
    overflow-x: visible;
  }

.navbar
{
    max-width:300px;
    margin-right: 0;
    margin-left: 0;
}   

.navbar-nav,
.navbar-nav > li,
.navbar-left,
.navbar-right,
.navbar-header
{float:none !important;}

.navbar-right .dropdown-menu {left:0;right:auto;}
.navbar-collapse .navbar-nav.navbar-right:last-child {
    margin-right: 0;
}
}

</style>

</head>   
<script type="text/javascript">

    function openWindow(url, width, height) {
        window.open(url, 'policies', 'width=' + width + ',height=' + height);
        return false;
    }

    $(document).ready(function() {         

        $("a.iframe").fancybox({
            'transitionIn': 'elastic',
            'transitionOut': 'elastic',
            'speedIn': 400,
            'speedOut': 200,
            'height': 450,
            'width': 630,
            'type': 'iframe',
            'overlayShow': true,
            'overlayColor': '#000',
            'overlayOpacity': 0.4,
            'overlayShow': true,
            'onComplete': function() {
                $("#fancybox-content").css({ 'border-width': 0, 'width': 650, 'height': 470 });
            }
        });
    });
</script>
<body>

    <nav class="navbar navbar-default" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">Brand</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Link</a></li>
      <li><a href="#">Link</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#">Action</a></li>
          <li><a href="#">Another action</a></li>
          <li><a href="#">Something else here</a></li>
          <li><a href="#">Separated link</a></li>
          <li><a href="#">One more separated link</a></li>
        </ul>
      </li>
    </ul>
    <form class="navbar-form navbar-left" role="search">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#">Link</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#">Action</a></li>
          <li><a href="#">Another action</a></li>
          <li><a href="#">Something else here</a></li>
          <li><a href="#">Separated link</a></li>
        </ul>
      </li>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>






    <div class="row">
  <div class="col-sm-3">
    <div class="sidebar-nav">
      <div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <span class="visible-xs navbar-brand">Sidebar menu</span>
        </div>
        <div class="navbar-collapse collapse sidebar-navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Menu Item 1</a></li>
            <li><a href="#">Menu Item 2</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
            <li><a href="#">Menu Item 4</a></li>
            <li><a href="#">Reviews <span class="badge">1,118</span></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
  </div>
  <div class="col-sm-9">
    Main content goes here
  </div>
</div>





    
    <div class="masterContent">
    <div id="wrapper">
        <div id="HeaderPrincipal" class="block headerBanner">
            <div class="node-list">
                <div class="node" style="background: url('/Themes/Pentagrama/images/banner.jpg') no-repeat scroll center center;">
                    <div id="HeaderWrapper">
                        <div id="HeaderIndex">
                            <div class="menuPrincipal">
                                <div id="languaje">
                                    <div>                                                                            
                                        <nav class="portal">
                                            <a href="http://www.persianaspentagrama.com" target="_blank">Persianas Pentagrama</a>
                                        </nav>
                                        <nav class="rightPortal">
                                        </nav>
                                    </div>
                                </div>                        
                                <a href="#">
                                    <img border="0" alt="" src="/Themes/Pentagrama/images/logoPentagrama.png">
                                </a>                        
                            </div>
                            <div id="MenuLink">
                                <a href="http://www.persianaspentagrama.com/">  www.persianaspentagrama.com</a>
                            </div>
                        </div>
                    </div>                    
                    <div class="captionWrapper">
                        <div class="caption">
                            <div class="Title">Portal de Distribuidores</div>
                            <div class="Detail">
                                
                                    Bienvenid@ Despachos Almacencito
                                                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        </div>                
        <div class="content">        
            <div class="contentLeft">                
                    <div class="contentTitle"></div>
                    <div class="mainContent">
                        <div class="contentSupport">
                            

        
        <!--Api usada para mostrar mensaje si el Distribuidor tiene estados de cartera pendientes-->
        <script src="/Themes/Pentagrama/js/jquery.freeow.js" type="text/javascript"></script>
        
        <script type="text/javascript">
            var CarteraPendiente = '$ 0,00';            
            var menorCero = "";
            var title = "";
            if(0 < 0){
                menorCero = "greenTotal"; 
                var title = "En estos momentos tiene saldo a favor de <span class='tituloRed " + menorCero + " '>" + CarteraPendiente + "</span>";
            } else 
            {
                var title = "En estos momentos tiene una cartera pendiente de <span class='tituloRed " + menorCero + " '>" + CarteraPendiente + "</span>";
            }
            var sapCode = ''

            $(document).ready(function() {
                if(0 != 0 ){
                    $("#freeow").freeow("IMPORTANTE", title, {
                        classes: ["gray", "append"],
                        autoHide: false
                    });                        
                }
            });
            
            //Direcciona a la vista de detalle del estado de cartera del Distribuidor en Session
            function verEstadoCartera() {
            
                window.location.href = '/Invoices/BillStatusDistributor'; 
            }
            
        </script>  
        
         
        
        <div class="contentClass">   
                <!-- Muestra si el Distribuidor tiene -->
                <div id="freeow" class="freeow freeow-top-right" onclick="verEstadoCartera();" ></div>
               
                <div class="logoHome TituloNotiEnc">
                    <img src="/Themes/Pentagrama/Images/icons/icono.gif" width="44" height="47"><div class="text">Home</div>
                </div>
                
            <!-- COPIA DE CONTENIDO HOME -->
            <div>                    
                
<div id="Contenido" class="region">
    
        <div id="Block-48" class="block ">
            

<script type="text/javascript" src="/Themes/Pentagrama/js/camera.min.js" ></script>
<link href="/Themes/Pentagrama/styles/camera/camera.css" rel="stylesheet" type="text/css" />

<script  type="text/javascript">
    $(document).ready(function() {
        jQuery("#camera_wrap").camera({
            height: '250',
            time: 4000,
            playPause: false,
            loader: 'bar',
            pagination: true,
            thumbnails: false,
            fx: 'simpleFade'
        });
    }); 
</script>

<div id="featured">
    <div class="camera_wrap camera_burgundy_skin" id="camera_wrap">
        
                <div data-thumb="/Files/Banner/1633/14/80x50_208_Banner Sheer 45.jpg" data-src="/Files/Banner/1633/14/800x250_208_Banner Sheer 45.jpg" data-link="http://pedidos.persianaspentagrama.com/Files/Descargas/1595/14/818_Sheer%20Elegance%2045%20grados.pdf" data-target="_blank">
                    <div class="camera_caption bannerTooltip">
                        <div class="title">Descargue aquí el instructivo de esta configuración para ventanas en L</div>
                        <div class="text">
                            
                                <a href="http://pedidos.persianaspentagrama.com/Files/Descargas/1595/14/818_Sheer%20Elegance%2045%20grados.pdf" target="_blank"></a>
                            
                        </div>
                    </div>
                </div>
            
                <div data-thumb="/Files/Banner/1632/14/80x50_177_Banner_ScreenDesde.jpg" data-src="/Files/Banner/1632/14/800x250_177_Banner_ScreenDesde.jpg" data-link="http://persianaspentagrama.com/PentaDistri/boletines/newsletters/2015/nov/001/index.html" data-target="_blank">
                    <div class="camera_caption bannerTooltip">
                        <div class="title">Este mes Pentagrama tiene los mejores precios en SCREEN</div>
                        <div class="text">
                            
                                <a href="http://persianaspentagrama.com/PentaDistri/boletines/newsletters/2015/nov/001/index.html" target="_blank">!Conozca las referencias, los precios y las condiciones de esta promoción!</a>
                            
                        </div>
                    </div>
                </div>
            
                <div data-thumb="/Files/Banner/1631/14/80x50_427_Banner_BlackoutDesde.jpg" data-src="/Files/Banner/1631/14/800x250_427_Banner_BlackoutDesde.jpg" data-link="http://persianaspentagrama.com/PentaDistri/boletines/newsletters/2015/nov/001/index.html" data-target="_blank">
                    <div class="camera_caption bannerTooltip">
                        <div class="title">Este mes Pentagrama tiene los mejores precios en Blackout</div>
                        <div class="text">
                            
                                <a href="http://persianaspentagrama.com/PentaDistri/boletines/newsletters/2015/nov/001/index.html" target="_blank">!Conozca las referencias, los precios y las condiciones que aplican para esta promoción!</a>
                            
                        </div>
                    </div>
                </div>
            
                <div data-thumb="/Files/Banner/1629/14/80x50_615_Banner_Descuentos.jpg" data-src="/Files/Banner/1629/14/800x250_615_Banner_Descuentos.jpg" data-link="http://persianaspentagrama.com/PentaDistri/boletines/newsletters/2015/nov/001/index.html" data-target="_blank">
                    <div class="camera_caption bannerTooltip">
                        <div class="title">Descuentos adicionales que aplican desde el 1 al 30 de Noviembre de 2015</div>
                        <div class="text">
                            
                                <a href="http://persianaspentagrama.com/PentaDistri/boletines/newsletters/2015/nov/001/index.html" target="_blank">!Enfoque sus ventas en los productos con descuento adicional y gane más con Pentagrama!</a>
                            
                        </div>
                    </div>
                </div>
            
                <div data-thumb="/Files/Banner/1628/14/80x50_730_Banner_4Outlet.jpg" data-src="/Files/Banner/1628/14/800x250_730_Banner_4Outlet.jpg" data-link="http://persianaspentagrama.com/PentaDistri/boletines/newsletters/2015/oct/004/Newsletter_OCTU3.html" data-target="_blank">
                    <div class="camera_caption bannerTooltip">
                        <div class="title">Conozca cuáles son las nuevas telas que hacen parte del catálogo OUTLET. </div>
                        <div class="text">
                            
                                <a href="http://persianaspentagrama.com/PentaDistri/boletines/newsletters/2015/oct/004/Newsletter_OCTU3.html" target="_blank"></a>
                            
                        </div>
                    </div>
                </div>
            
                <div data-thumb="/Files/Banner/1626/14/80x50_480_Banner_Listaimpresa.jpg" data-src="/Files/Banner/1626/14/800x250_480_Banner_Listaimpresa.jpg" data-link="http://pedidos.persianaspentagrama.com/noticias/volvemos-a-los-precios-de-lista-impresa" data-target="_blank">
                    <div class="camera_caption bannerTooltip">
                        <div class="title">A partir del Lunes 26 de Octubre volvemos a los precios de lista impresa </div>
                        <div class="text">
                            
                                <a href="http://pedidos.persianaspentagrama.com/noticias/volvemos-a-los-precios-de-lista-impresa" target="_blank">Aproveche - La promoción de Octubre sigue vigente hasta el 31.</a>
                            
                        </div>
                    </div>
                </div>
            
                <div data-thumb="/Files/Banner/1591/14/80x50_762_Banner_Screen_Spice.jpg" data-src="/Files/Banner/1591/14/800x250_762_Banner_Screen_Spice.jpg" data-link="http://persianaspentagrama.com/PentaDistri/boletines/newsletters/2015/oct/003/Newsletter_OCTU2.html" data-target="_blank">
                    <div class="camera_caption bannerTooltip">
                        <div class="title">Nueva Colección de Screen Vision - Diseño y Calidad Europea</div>
                        <div class="text">
                            
                                <a href="http://persianaspentagrama.com/PentaDistri/boletines/newsletters/2015/oct/003/Newsletter_OCTU2.html" target="_blank"></a>
                            
                        </div>
                    </div>
                </div>
            
                <div data-thumb="/Files/Banner/1590/14/80x50_230_Banner_Screen_Bali.jpg" data-src="/Files/Banner/1590/14/800x250_230_Banner_Screen_Bali.jpg" data-link="http://persianaspentagrama.com/PentaDistri/boletines/newsletters/2015/oct/003/Newsletter_OCTU2.html" data-target="_blank">
                    <div class="camera_caption bannerTooltip">
                        <div class="title">Nueva Colección de Screen Vision - Diseño y Calidad Europea</div>
                        <div class="text">
                            
                                <a href="http://persianaspentagrama.com/PentaDistri/boletines/newsletters/2015/oct/003/Newsletter_OCTU2.html" target="_blank"></a>
                            
                        </div>
                    </div>
                </div>
            
                <div data-thumb="/Files/Banner/1589/14/80x50_246_Banner_Screen_Sienna.jpg" data-src="/Files/Banner/1589/14/800x250_246_Banner_Screen_Sienna.jpg" data-link="http://persianaspentagrama.com/PentaDistri/boletines/newsletters/2015/oct/003/Newsletter_OCTU2.html" data-target="_blank">
                    <div class="camera_caption bannerTooltip">
                        <div class="title">Nueva Colección de Screen Vision - Diseño y Calidad Europea</div>
                        <div class="text">
                            
                                <a href="http://persianaspentagrama.com/PentaDistri/boletines/newsletters/2015/oct/003/Newsletter_OCTU2.html" target="_blank"></a>
                            
                        </div>
                    </div>
                </div>
            
                <div data-thumb="/Files/Banner/1571/14/80x50_913_Banner_Bookimpresos2.jpg" data-src="/Files/Banner/1571/14/800x250_913_Banner_Bookimpresos2.jpg" data-link="http://pedidos.persianaspentagrama.com/Files/Descargas/1568/14/163_Book_Impresos_V2_2.pdf" data-target="_blank">
                    <div class="camera_caption bannerTooltip">
                        <div class="title">Descargue el nuevo Book de impresos</div>
                        <div class="text">
                            
                                <a href="http://pedidos.persianaspentagrama.com/Files/Descargas/1568/14/163_Book_Impresos_V2_2.pdf" target="_blank">!Son más de 240 imágenes en alta resolución que están disponibles sin ningún costo adiciona!</a>
                            
                        </div>
                    </div>
                </div>
            
                <div data-thumb="/Files/Banner/1569/14/80x50_365_Banner_ManualPagos.jpg" data-src="/Files/Banner/1569/14/800x250_365_Banner_ManualPagos.jpg" data-link="http://pedidos.persianaspentagrama.com/Files/Descargas/1567/14/787_Pagos_Online.pdf" data-target="_blank">
                    <div class="camera_caption bannerTooltip">
                        <div class="title">Descargue el manual de Pagos Online</div>
                        <div class="text">
                            
                                <a href="http://pedidos.persianaspentagrama.com/Files/Descargas/1567/14/787_Pagos_Online.pdf" target="_blank">Incluye imágenes y videos que muestran el proceso paso a paso.&nbsp;</a>
                            
                        </div>
                    </div>
                </div>
            
                <div data-thumb="/Files/Banner/1253/14/80x50_84_Banner_GuayaDeluxe.jpg" data-src="/Files/Banner/1253/14/800x250_84_Banner_GuayaDeluxe.jpg" data-link="http://persianaspentagrama.com/PentaDistri/boletines/newsletters/2015/ago/003/Newsletter-035.html" data-target="_blank">
                    <div class="camera_caption bannerTooltip">
                        <div class="title">Soportes de lujo para los TOLDOS VERTICALES con guías de GUAYA</div>
                        <div class="text">
                            
                                <a href="http://persianaspentagrama.com/PentaDistri/boletines/newsletters/2015/ago/003/Newsletter-035.html" target="_blank"></a>
                            
                        </div>
                    </div>
                </div>
            
                <div data-thumb="/Files/Banner/1250/14/80x50_756_Banner_PerfilStandardOut.jpg" data-src="/Files/Banner/1250/14/800x250_756_Banner_PerfilStandardOut.jpg" data-link="http://persianaspentagrama.com/PentaDistri/boletines/newsletters/2015/ago/002/Newsletter-034.html" data-target="_blank">
                    <div class="camera_caption bannerTooltip">
                        <div class="title">Nuevo Perfil Standard OUT</div>
                        <div class="text">
                            
                                <a href="http://persianaspentagrama.com/PentaDistri/boletines/newsletters/2015/ago/002/Newsletter-034.html" target="_blank">Una nueva alternativa para las Enrollables "Standard" en la que se resalta el acabado del perfil.</a>
                            
                        </div>
                    </div>
                </div>
            
                <div data-thumb="/Files/Banner/1238/14/80x50_5_Banner_Video_Palma.jpg" data-src="/Files/Banner/1238/14/800x250_5_Banner_Video_Palma.jpg" data-link="https://www.youtube.com/watch?v=yw-RqAXiRsc" data-target="_blank">
                    <div class="camera_caption bannerTooltip">
                        <div class="title">Te invitamos a ver el video de las sombrillas "Palma".</div>
                        <div class="text">
                            
                                <a href="https://www.youtube.com/watch?v=yw-RqAXiRsc" target="_blank">Este video se realizó con un Drone en las instalaciones de un prestigioso hotel en Pereira.&nbsp;</a>
                            
                        </div>
                    </div>
                </div>
            
                <div data-thumb="/Files/Banner/1235/14/80x50_783_Banner_Sombrex.jpg" data-src="/Files/Banner/1235/14/800x250_783_Banner_Sombrex.jpg" data-link="http://persianaspentagrama.com/PentaDistri/boletines/newsletters/2015/jun/009/News-Sombrex.html" data-target="_blank">
                    <div class="camera_caption bannerTooltip">
                        <div class="title">Sombrex es un complemento perfecto para los Toldos de Brazos Extensibles!</div>
                        <div class="text">
                            
                                <a href="http://persianaspentagrama.com/PentaDistri/boletines/newsletters/2015/jun/009/News-Sombrex.html" target="_blank"></a>
                            
                        </div>
                    </div>
                </div>
            
                <div data-thumb="/Files/Banner/1234/14/80x50_533_Banner_Zbox.jpg" data-src="/Files/Banner/1234/14/800x250_533_Banner_Zbox.jpg" data-link="http://persianaspentagrama.com/PentaDistri/boletines/newsletters/2015/jun/010/z-box.html" data-target="_blank">
                    <div class="camera_caption bannerTooltip">
                        <div class="title">!La tela no se sale de las guías laterales!</div>
                        <div class="text">
                            
                                <a href="http://persianaspentagrama.com/PentaDistri/boletines/newsletters/2015/jun/010/z-box.html" target="_blank">Es por esto que este novedoso producto es el único que puede ofrecer oscuridad total.</a>
                            
                        </div>
                    </div>
                </div>
            
                <div data-thumb="/Files/Banner/1229/14/80x50_506_Banner_EstadoCartera.jpg" data-src="/Files/Banner/1229/14/800x250_506_Banner_EstadoCartera.jpg" data-link="http://persianaspentagrama.com/PentaDistri/boletines/newsletters/2015/jun/011/Newsletter-031.html" data-target="_blank">
                    <div class="camera_caption bannerTooltip">
                        <div class="title"> Si eres usuario "Administrador", haz clic sobre este banner para más información!</div>
                        <div class="text">
                            
                                <a href="http://persianaspentagrama.com/PentaDistri/boletines/newsletters/2015/jun/011/Newsletter-031.html" target="_blank"></a>
                            
                        </div>
                    </div>
                </div>
            
                <div data-thumb="/Files/Banner/1222/14/80x50_180_Banner_SmartPT.jpg" data-src="/Files/Banner/1222/14/800x250_180_Banner_SmartPT.jpg" data-link="http://persianaspentagrama.com/PentaDistri/boletines/newsletters/2015/jun/007/Newsletter-SmartPT029.html" data-target="_blank">
                    <div class="camera_caption bannerTooltip">
                        <div class="title">Un sistema de automatización SENCILLO, ECONÓMICO Y FÁCIL DE VENDER</div>
                        <div class="text">
                            
                                <a href="http://persianaspentagrama.com/PentaDistri/boletines/newsletters/2015/jun/007/Newsletter-SmartPT029.html" target="_blank">No te pierdas la posibilidad de ofrecerlo a tus clientes. Conoce más sobre este producto aquí..</a>
                            
                        </div>
                    </div>
                </div>
            
                <div data-thumb="/Files/Banner/1221/14/80x50_70_Banner_Sombrillas.jpg" data-src="/Files/Banner/1221/14/800x250_70_Banner_Sombrillas.jpg" data-link="http://persianaspentagrama.com/PentaDistri/boletines/newsletters/2015/jun/005/Sombrillas-Pt.html" data-target="_blank">
                    <div class="camera_caption bannerTooltip">
                        <div class="title">!Este es un producto con el cual podrás llegar a un nuevo mercado!</div>
                        <div class="text">
                            
                                <a href="http://persianaspentagrama.com/PentaDistri/boletines/newsletters/2015/jun/005/Sombrillas-Pt.html" target="_blank">Nuestro portafolio de lanzamiento incluye 6 tipos de Sombrillas. Conoce más aquí...</a>
                            
                        </div>
                    </div>
                </div>
            
                <div data-thumb="/Files/Banner/1217/14/80x50_990_Banner_PerfilSheerEleganceDeluxe.jpg" data-src="/Files/Banner/1217/14/800x250_990_Banner_PerfilSheerEleganceDeluxe.jpg" data-link="http://persianaspentagrama.com/PentaDistri/boletines/newsletters/2015/jun/003/Newsletter-026.html" data-target="_blank">
                    <div class="camera_caption bannerTooltip">
                        <div class="title">Este es el nuevo perfil que llevarán nuestras Sheer Elegance a partir del 9 de Junio</div>
                        <div class="text">
                            
                                <a href="http://persianaspentagrama.com/PentaDistri/boletines/newsletters/2015/jun/003/Newsletter-026.html" target="_blank">Está disponible en los 5 colores principales: blanco, beige, bronce, gris y negro.&nbsp;</a>
                            
                        </div>
                    </div>
                </div>
            
                <div data-thumb="/Files/Banner/1215/14/80x50_491_Banner_Screen Essential.jpg" data-src="/Files/Banner/1215/14/800x250_491_Banner_Screen Essential.jpg" data-link="http://persianaspentagrama.com/PentaDistri/boletines/newsletters/2015/jun/002/Newsletter-011.html" data-target="_blank">
                    <div class="camera_caption bannerTooltip">
                        <div class="title">Con esta colección de Screen se pueden crear proyectos a la medida</div>
                        <div class="text">
                            
                                <a href="http://persianaspentagrama.com/PentaDistri/boletines/newsletters/2015/jun/002/Newsletter-011.html" target="_blank">Se logra una fachada estética y uniforme, con niveles de apertura personalizados a cada necesidad. Ver más..</a>
                            
                        </div>
                    </div>
                </div>
            
                <div data-thumb="/Files/Banner/1194/14/80x50_364_Banner_ScreenBiagioTreasures.jpg" data-src="/Files/Banner/1194/14/800x250_364_Banner_ScreenBiagioTreasures.jpg" data-link="http://persianaspentagrama.com/PentaDistri/boletines/newsletters/2015/may/006/Newsletter-021.html" data-target="_blank">
                    <div class="camera_caption bannerTooltip">
                        <div class="title">Biagio y Treasures</div>
                        <div class="text">
                            
                                <a href="http://persianaspentagrama.com/PentaDistri/boletines/newsletters/2015/may/006/Newsletter-021.html" target="_blank">Estas dos nuevas colecciones se suman al catálogo de tejidos Jacquard</a>
                            
                        </div>
                    </div>
                </div>
            
    </div>  
</div>

        </div>
    
        <div id="Block-47" class="block topNoticias">
            
                <div class="block-title">Últimas Noticias</div>
            
<div class="node-list">

    <div class="node">
        
                <div class="Title">
                
                    <a href="/home/nuevo-video-de-toldos-verticales-atos">Nuevo Video de Toldos Verticales Atos</a>
                
                </div>
                
                <div class="Imagen">
                
                    <a href="/home/nuevo-video-de-toldos-verticales-atos"></a>
                
                </div>
                
                <div class="Detail">
                Lo invitamos a ver el nuevo video de nuestro producto “Toldos Verticales Atos”. En este video podrá conocer las diferentes presentaciones en las que se puede fabricar el producto: con guías laterales...
                
                </div>
                
    </div>

    <div class="node">
        
                <div class="Title">
                
                    <a href="/noticias/cambios-en-book-de-impresos-v2-1641">Cambios en Book de Impresos V2</a>
                
                </div>
                
                <div class="Imagen">
                
                    <a href="/noticias/cambios-en-book-de-impresos-v2-1641"></a>
                
                </div>
                
                <div class="Detail">
                Le solicitamos descargar nuevamente el Book de Impresos V2, el cual fue publicado en el mes de Agosto de 2015, ya que se retiraron algunas imágenes y se reemplazaron por unas nuevas.&nbsp; En total se...
                
                </div>
                
    </div>

    <div class="node">
        
                <div class="Title">
                
                    <a href="/noticias/cambios-en-book-de-impresos-v2">Cambios en Book de Impresos V2</a>
                
                </div>
                
                <div class="Imagen">
                
                    <a href="/noticias/cambios-en-book-de-impresos-v2"></a>
                
                </div>
                
                <div class="Detail">
                Le solicitamos descargar nuevamente el Book de Impresos V2, el cual fue publicado en el mes de Agosto de 2015, ya que se retiraron algunas imágenes y se reemplazaron por unas nuevas.&nbsp; En total se...
                
                </div>
                
    </div>

    <div class="node">
        
                <div class="Title">
                
                    <a href="/noticias/fiesta-de-fin-de-ano--sabado-14-de-noviembre">Fiesta de Fin de Año: Sábado 14 de Noviembre</a>
                
                </div>
                
                <div class="Imagen">
                
                    <a href="/noticias/fiesta-de-fin-de-ano--sabado-14-de-noviembre"></a>
                
                </div>
                
                <div class="Detail">
                Nos permitimos informar que el día sábado 14 de noviembre llevaremos a cabo la celebración de fin de año. &nbsp; Todas las áreas de la empresa, incluyendo la oficina y la sala de exhibición de Bogotá,...
                
                </div>
                
    </div>

</div>
            <div class="footer"><a href="/Noticias">Ver más</a></div>
            
        </div>
    
        <div id="Block-49" class="block ">
            
        <div class="Title">
            El Portal de Distribuidores es un sistema de información y comunicación diseñado exclusivamente para usted!
        </div>
        <div class="Detail">
            











<strong><span style="font-size: xx-small;"><span style="font-family: Verdana;"><span style="font-size: medium;"></span></span></span></strong><strong><span style="font-size: xx-small;"></span></strong><span style="font-size: x-small;"><span style="font-size: xx-small;"><span style="font-family: Verdana;"><span style="font-size: medium;"><span style="font-size: x-small;">Nuestro objetivo principal es facilitar los procesos de contacto entre usted, sus colaboradores y nuestra empresa de una manera rápida e intuitiva para agilizar nuestra relación y mantenerlo siempre informado. <br />
<br />
Para esto contamos con secciones especiales como la más reciente "Pedidos y Cotizaciones" a través de la cual usted podrá realizar sus Pedidos y Cotizaciones a sus clientes de una manera muy rápida y sencilla.&nbsp;Nuestro interés es proveerle todas las herramientas necesarias para que usted tenga la información a la mano. Para esto hemos diseñado un sistema de traqueo que le permitirá conocer el estado de sus pedidos en tiempo real. 
</span><span style="font-size: x-small;"><br />
<br />
Así mismo contamos con secciones de información que le permitirán estar actualizado con las últimas noticias de los acontecimientos que suceden en nuestra compañía; nuevos productos, nuevas colecciones, nuevos sistemas, nuevos servicios, entre otros. </span>
<br />
</span></span></span></span><strong><span style="font-size: xx-small; "><span style="font-family: Verdana;"><span style="font-size: medium;"><br />
<br />
</span><br />
<br />
</span></span></strong>







        </div>

        </div>
    
</div>            
            </div>
     
        </div>

                            
                             
                        </div>
                    </div>                
            </div>
            <div class="contentRight">
                
                    <div class="rightTitle"></div>
                    
<div id="Lateral-Derecho" class="region">
    
        <div id="Block-41" class="block rightMenu">
            
            <div class="header"><div class="infoTop"> </div>
<div class="rightMenuTop"></div></div>
               
        <ul class="sf-menu">
        <li class=''><a href='/' >Home</a><ul style='display:none;'></ul></li><li class=''><a href='/Noticias' >Noticias</a><ul style='display:none;'></ul></li><li class=''><a href='/DatosImportantes' >Información General</a><ul style='display:none;'></ul></li><li class=''><a href='/Boletines' >Boletines</a><ul style='display:none;'></ul></li><li class=''><a href='/Pentagrama/Listaprecios' >Listas de Precios</a><ul style='display:none;'></ul></li><li class=''><a href='/Promos' >Descuentos y Promos</a><ul style='display:none;'></ul></li><li class=''><a href='/Pentagrama/Descargas' >Descargas</a><ul style='display:none;'></ul></li><li class=''><a href='/educate?IdTerm=116' >E-dúcate</a><ul style='display:none;'></ul></li><li class=''><a href='/CalculoPaneles' >Cálculo Páneles</a><ul style='display:none;'></ul></li><li class=''><a href='/PublicityMaterial/MaterialPublicity/' >Fotos de Producto</a><ul style='display:none;'></ul></li> 
        </ul>

            <div class="footer"><div class="rightMenuBottom"></div></div>
            
        </div>
    
        <div id="Block-57" class="block rightMenu">
            
            <div class="header"><div class="transacTop"> </div>
<div class="rightMenuTop"></div></div>
               
        <ul class="sf-menu">
        <li class=''><a href='/Order/MyOrders' >Pedidos y Cotizaciones</a><ul style='display:none;'></ul></li><li class=''><a href='/ConsultaGuias' >Consulta de Guías</a><ul style='display:none;'></ul></li><li class=''><a href='/Order/ConsultInventory' >Consulta de Inventario</a><ul style='display:none;'></ul></li><li class=''><a href='/PQR/Contact' >PQS</a><ul style='display:none;'></ul></li><li class=''><a href='/PQR/TechnicalSupportContact' >Asistencia Técnica</a><ul style='display:none;'></ul></li><li class=''><a href='/Test' >Test de Conocimiento</a><ul style='display:none;'></ul></li> 
        </ul>

            <div class="footer"><div class="rightMenuBottom"></div></div>
            
        </div>
    
        <div id="Block-43" class="block rightMenu">
            
            <div class="header"><div class="userTop"> </div>
<div class="rightMenuTop"></div></div>
               
        <ul class="sf-menu">
        <li class=''><a href='/usuarios/actualizar-datos' >Mis datos de acceso</a><ul style='display:none;'></ul></li><li class=''><a href='/Distributor/EditQuotation' >Datos de Cotización</a><ul style='display:none;'></ul></li><li class=''><a href='/User/Logout' >Salir</a><ul style='display:none;'></ul></li> 
        </ul>

            <div class="footer"><div class="rightMenuBottom"></div></div>
            
        </div>
    
</div>
                    
                    <div class="redes"><img src="/Themes/Pentagrama/images/redes.png" usemap="#MapMap" border="0"/></div> 
                    <map id="MapMap" name="MapMap">
                      <area target="_blank" href="http://www.facebook.com/pages/Pentagrama-SA/133857766628660?ref=search" coords="115,7,137,30" shape="rect">
                      <area target="_blank" href="http://twitter.com/PentagramaSA" coords="144,10,166,33" shape="rect">
                    </map> 
                 
            </div>
         </div>       
    </div>    
    <div id="FooterWrapper">
            <div id="Contact">
                <div class="Footer-detail">
                    <table width="100%">
                        <tr>
                            <td width="28%">
                                <div class="footer-title">Pereira- Planta de Producción y Oficinas</div>
                                Calle 40 No 11- 55<br>
                                Tel: 329 5555
                            </td>
                            <td width="22%">
                                <div class="footer-title">Bogotá- Sala de Exhibición</div>
                                Calle 122 No 18b-70 <br>
                                Tel: 213 8296
                            </td>
                            <td width="25%">
                                <div class="footer-title">Bogotá- Oficinas Administrativas</div>
                                Carrera 18c No 121-40 Of 402<br>
                                Tel: 612 0266
                            </td>
                            <td width="25%">
                                <div class="footer-title">info@persianaspentagrama.com </div>                                
                                Línea Nacional: 01 8000 111 555
                            </td>
                    </tr>
                </table>
            </div>
        </div>         
        <div class="Footer">            
                <div class="Footer-detail">
                    <table width="100%">
                        <tr>
                            <td width="15%" align="left">
                                <img src="/Themes/Pentagrama/images/footer-logo.png" alt="" />
                            </td>
                            <td width="26%" align="left"  class="legal">
                                Todos los Derechos reservados 2013
                            </td>
                            <td width="34%">
                                <a class="iframe" href="/Pentagrama/QualityPolicies">Politicas de Calidad</a> | <a class="iframe" href="/Pentagrama/TermsOfService">Terminos de Servicios</a>
                            </td>                                
                            <td width="25%" align="center" class="legal">
                                Desarrollado por <a href="http://www.ideeasoluciones.com" target="_blank">Id<span class="ideea">ee</span>a Soluciones Ltda.</a>
                            </td>
                        </tr>
                    </table>
                </div>            
            </div>
        </div> 
    </div>  
    
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-31385927-3']);
  _gaq.push(['_setDomainName', 'persianaspentagrama.com']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
</body>
</html>
