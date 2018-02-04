<!DOCTYPE html>
<html lang="en" ng-app="portal">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title head-title>MNRT Portal</title>
    <!-- inject:css -->
    <!-- endinject -->
    <style type="text/css">
      /**
       * hide when angular is not yet loaded and initialized
       */
      [ng\:cloak], [ng-cloak], [data-ng-cloak], [x-ng-cloak], .ng-cloak, .x-ng-cloak {
        display: none !important;
      }
    </style>
  </head>
  <body layout="row" class="dashboard" ng-cloak>
    <div ng-show="preloader" class="preloader">
.</div>
    <a ui-sref="institutions">Institutions</a>
    {{ 1 + 1 }}
    <ui-view layout="row" flex></ui-view>
    <!-- inject:js -->
    <script src="/src/js/app.bundle.js"></script>
    <!-- endinject -->
  </body>
</html>
