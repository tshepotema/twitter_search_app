<!DOCTYPE html>
<html lang="en" ng-app="twitterApp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Tshepo Tema">

    <title>Hashtags - Twitter Search App</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/grayscale.css" rel="stylesheet">

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">
                    <i class="fa fa-play-circle"></i>  <span class="light">Hashtags</span> Search App
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#subscribe">Search Tags</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Intro Header -->
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h1 class="brand-heading">HashTags</h1>
                        <p class="intro-text">Search App.<br><span class="underscore">&nbsp;</span><span class="underscore">by <a href="https://twitter.com/@tshepo_tema">@tshepo_tema</a>.</span></p>
                        <a href="#search" class="btn btn-circle page-scroll">
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Subscribe Section -->
    <section id="search" class="container content-section text-center" ng-controller="searchController">
        <form name="formSubscribe" novalidate class="form-inline">
        <div class="row">
            <div class="container">
                <div class="col-lg-8 col-lg-offset-1">
                    <h2>Search</h2>
                      <div class="form-group">
                        Search Twitter: <span class="input-group-addon" id="basic-addon1" style="width: 40px; display: inline-block;">#</span><input id="query" type="text" class="form-control" ng-model="query" placeholder="Search" aria-describedby="basic-addon1" required>
                      </div>
                      <button type="submit" class="btn btn-success" ng-click="searchTwitter();"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                      &nbsp;&nbsp;&nbsp;&nbsp; <input id="resultsearch" type="text" class="form-control" ng-model="resultsearch" placeholder="search within results" ng-show="connectedTwitter">
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-xs-12" id="results">
                <div class="row" ng-repeat="t in tweets | filter: resultsearch">
                    <div class="col-xs-2 col-sm-1">
                        <img ng-src="@{{t.profile_image_url}}" class="img-circle">
                    </div>
                    <div class="col-xs-10 col-sm-11">
                        <small>@{{t.name}}</small>
                        <br> <span ng-bind-html="t.tweet"></span>
                    </div>

                </div>

                <div ng-show="rateLimitError" style="color: #FF0000; font-weight: bold;">
                    Rate limit reached. You are making too many requests.
                </div>
            </div>
        </div>

        <div class="row">
            <div class="container">
            </div>
        </div>
        </form>
    </section>

    <!-- Download Section -->
    <section id="about" class="content-section text-center">
        <div class="download-section">
            <div class="container">
                <div class="col-lg-8 col-lg-offset-2">
                    <h2>Hashtags Search App</h2>
                    <p>Hashtags Search App is a trivial app that allows you to search trends in social media platforms</p>
                    <p>This app is only for development practice purposes and not meant to be used for actual reference</p>
                    <p>User discretion advised.</p>
                    <a href="http://store.zetail.co.za" class="btn btn-default btn-lg">Visit App Store</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p>Copyright &copy; Hashtags Online 2015</p>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    
    <!-- Custom Theme JavaScript -->
    <script src="js/grayscale.js"></script>

    <script src="js/oauth.js"></script>

    <!-- AngularJS -->
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.16/angular.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.16/angular-sanitize.js"></script>
    
    <!-- the app -->
    <script src="js/hashtags.js"></script>

    <!-- services -->
    <script src="js/services.js"></script>

</body>
</html>