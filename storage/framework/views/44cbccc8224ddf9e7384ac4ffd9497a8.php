<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/swagger-ui/3.19.5/swagger-ui.css" >
    <style>
        .topbar {
            display: none;
        }
    </style>
</head>

<body>
<div id="swagger-ui"></div>



<?php
//dd( json_encode($spec));
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/swagger-ui/3.19.5/swagger-ui-bundle.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/swagger-ui/3.19.5/swagger-ui-standalone-preset.js"> </script>
<script src="<?php echo e(asset('docs/swagger.js')); ?>"> </script>

<script>


    window.onload = function() {
        const ui = SwaggerUIBundle({
            spec:spec,
            dom_id: '#swagger-ui',
            deepLinking: true,
            presets: [
                SwaggerUIBundle.presets.apis,
                SwaggerUIStandalonePreset
            ],
            plugins: [
                SwaggerUIBundle.plugins.DownloadUrl
            ],
            layout: "StandaloneLayout"
        })

        window.ui = ui

    }
</script>
</body>
</html>
<?php /**PATH /app/resources/views/api/docs.blade.php ENDPATH**/ ?>