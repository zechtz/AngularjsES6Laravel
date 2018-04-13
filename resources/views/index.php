<!DOCTYPE html>
<html lang="en" ng-app="portal">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title head-title ng-cloak>MNRT Portal</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style type="text/css">
      /**
       * hide when angular is not yet loaded and initialized
       */
      [ng\:cloak], [ng-cloak], [data-ng-cloak], [x-ng-cloak], .ng-cloak, .x-ng-cloak {
        display: none !important;
      }
    </style>
  </head>
  <body layout="row" ng-controller="MainController as ctrl" class="dashboard" ng-cloak>
    <div ng-show="preloader" class="preloader">
      <img src="../../images/preload.svg"/>
      .</div>
    <ui-view layout="row" flex></ui-view>
    <script src="/src/app.bundle.js"></script>
  </body>
</html>
