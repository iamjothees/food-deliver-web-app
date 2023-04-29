<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/sass/app.scss' ])
    @inertiaHead
  </head>
  <body>
    <div id=root>

    </div>
    @inertia
    @vite('resources/js/app.jsx')
  </body>
</html>