<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <link rel="stylesheet" type="text/css" href="/css/vendor.css">
    <title>CRM</title>

</head>
<body>
<div id="app">

    <navbar></navbar>
    <router-view></router-view>
</div>

<script src="/js/app.js"></script>


</body>
</html>

<?php /**PATH /var/www/crm_test/resources/views/home.blade.php ENDPATH**/ ?>