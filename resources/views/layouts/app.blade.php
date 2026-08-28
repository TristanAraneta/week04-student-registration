<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'REGSYS - Student Registration')</title>

<link href="https://fonts.googleapis.com" rel="preconnect">
<link crossorigin href="https://fonts.gstatic.com" rel="preconnect">
<link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,200..800;1,200..800&family=Syne:wght@400..800&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">

<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script>
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            "on-secondary-container": "#5c647a",
            "on-primary-fixed-variant": "#5a00c6",
            "surface-container-lowest": "#ffffff",
            "surface-variant": "#e8dfee",
            "inverse-surface": "#332f39",
            "error-container": "#ffdad6",
            "on-background": "#1d1a24",
            "on-error": "#ffffff",
            "background": "#fef7ff",
            "on-surface-variant": "#4a4455",
            "surface-container-highest": "#e8dfee",
            "on-error-container": "#93000a",
            "on-primary": "#ffffff",
            "surface-container-high": "#ede5f4",
            "surface": "#fef7ff",
            "surface-tint": "#732ee4",
            "outline-variant": "#ccc3d8",
            "on-primary-container": "#ede0ff",
            "on-surface": "#1d1a24",
            "secondary": "#565e74",
            "outline": "#7b7487",
            "primary": "#630ed4",
            "primary-fixed": "#eaddff",
            "surface-container-low": "#f9f1ff",
            "primary-container": "#7c3aed",
            "surface-container": "#f3ebfa",
            "error": "#ba1a1a"
          },
          borderRadius: { DEFAULT: "0.25rem", lg: "0.5rem", xl: "0.75rem", full: "9999px" },
          spacing: { xs: "4px", xxl: "80px", "container-max": "1280px", sm: "8px", unit: "4px", md: "16px", gutter: "24px", xl: "40px", lg: "24px" },
          fontFamily: {
            "headline-lg": ["Syne"], "body-md": ["Karla"], "body-lg": ["Karla"],
            "headline-lg-mobile": ["Syne"], "label-sm": ["Karla"], "headline-md": ["Syne"]
          },
          fontSize: {
            "headline-lg": ["40px", { lineHeight: "1.2", letterSpacing: "0.01em", fontWeight: "700" }],
            "body-md": ["16px", { lineHeight: "1.5", fontWeight: "400" }],
            "body-lg": ["18px", { lineHeight: "1.6", fontWeight: "400" }],
            "headline-lg-mobile": ["32px", { lineHeight: "1.2", fontWeight: "700" }],
            "label-sm": ["12px", { lineHeight: "1", letterSpacing: "0.1em", fontWeight: "700" }],
            "headline-md": ["24px", { lineHeight: "1.3", fontWeight: "600" }]
          }
        }
      }
    }
</script>
<style>
    body { background-color: #FAFAFA; }
    .editorial-input {
        border: 0;
        border-bottom: 1px solid theme('colors.outline-variant');
        background-color: transparent;
        border-radius: 0;
        padding: theme('spacing.sm') 0;
        transition: border-color 0.3s ease;
    }
    .editorial-input:focus { outline: none; box-shadow: none; border-bottom: 1px solid theme('colors.primary-container'); }
    .editorial-input.border-error { border-bottom-color: theme('colors.error'); }
    .editorial-label {
        display: block;
        margin-bottom: theme('spacing.xs');
        font-family: theme('fontFamily.label-sm');
        font-size: theme('fontSize.label-sm.0');
        font-weight: theme('fontSize.label-sm.1.fontWeight');
        letter-spacing: theme('fontSize.label-sm.1.letterSpacing');
        color: theme('colors.on-surface-variant');
        text-transform: uppercase;
    }
</style>
</head>
<body class="text-on-background font-body-md antialiased min-h-screen flex flex-col">

<header class="bg-surface w-full top-0 sticky border-b border-outline-variant z-50">
<div class="max-w-container-max mx-auto px-lg flex justify-between items-center h-xxl">
<div class="flex items-center gap-xl">
<a class="font-headline-md text-headline-md tracking-tighter text-on-surface" href="{{ route('students.create') }}">REGSYS</a>
<nav class="hidden md:flex items-center gap-lg font-body-md text-body-md">
<a class="{{ request()->routeIs('students.create') ? 'text-primary font-bold border-b-2 border-primary' : 'text-on-surface-variant hover:text-primary border-b-2 border-transparent' }} transition-colors duration-300 cursor-pointer pb-1" href="{{ route('students.create') }}">Registration</a>
<a class="text-on-surface-variant hover:text-primary transition-colors duration-300 cursor-pointer pb-1 border-b-2 border-transparent" href="{{ route('students.index') }}">All Students</a>
</nav>
</div>
</div>
</header>

<main class="flex-grow max-w-container-max mx-auto w-full px-4 md:px-lg py-xl md:py-xxl">
    @yield('content')
</main>

<footer class="bg-surface-container-lowest w-full mt-xxl border-t border-outline-variant">
<div class="max-w-container-max mx-auto px-lg py-xl flex flex-col md:flex-row justify-between items-center gap-md">
<div class="font-headline-md text-headline-md text-on-surface">REGSYS</div>
<div class="font-label-sm text-label-sm uppercase tracking-widest text-secondary">
    ITST 302 · Week 4 · MP03
</div>
</div>
</footer>

<script>
    setTimeout(() => {
        document.querySelectorAll('[role="alert"]').forEach(el => el.remove());
    }, 5000);
</script>

</body>
</html>