<?php

if (function_exists('get_field') && $analytics_code = get_field('analytics_code', 'options')) : ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $analytics_code; ?>"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '<?php echo $analytics_code; ?>');
    </script>
<?php endif;
