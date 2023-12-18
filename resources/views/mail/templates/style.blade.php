<style>

    body, table, td {font-family: Helvetica, Arial, sans-serif !important}

    body {
        background:  #f7fafc;
        font-family: 'Nunito', sans-serif;
    }

    .wrapper {
        outline:          0;
        width:            100%;
        min-width:        100%;
        height:           100%;
        font-family:      Helvetica, Arial, sans-serif;
        line-height:      24px;
        font-weight:      normal;
        font-size:        16px;
        box-sizing:       border-box;
        color:            #000000;
        border-top-style: solid !important;
        margin:           0;
        border-color:     #cbd5e0;
        border-width:     2px 0 0;
        padding:          0 16px;
    }

    .wrap {
        width:     100%;
        max-width: 600px;
        margin:    0 auto;
        display:   block;
    }

    .header {
        text-align: center;
        padding:    45px 0;
    }

    .header a {
        display: inline-block;
    }


    .card {
        border-radius:   6px;
        border-collapse: separate !important;
        width:           100%;
        overflow:        hidden;
        border:          1px solid #e2e8f0;
    }


    .footer {
        text-align:  center;
        padding:     35px 40px;
        line-height: 24px;
        font-size:   16px;
    }


    /* Alineación de texto */
    .text-left { text-align: left; }
    .text-right {text-align: right;}
    .text-center {
        margin: auto;
        text-align: center;
    }
    .text-justify { text-align: justify; }

    /* Pesos de fuente */
    .fw-100 { font-weight: 100; }
    .fw-200 { font-weight: 200; }
    .fw-300 { font-weight: 300; }
    .fw-400 { font-weight: 400; }
    .fw-500 { font-weight: 500; }
    .fw-600 { font-weight: 600; }
    .fw-700 { font-weight: 700; }
    .fw-800 { font-weight: 800; }
    .fw-900 { font-weight: 900; }

    /* Tamaños de texto */
    .text-xs { font-size: 12px; }
    .text-sm { font-size: 14px; }
    .text-base { font-size: 16px; }
    .text-lg { font-size: 18px; }
    .text-xl { font-size: 20px; }
    .text-2xl { font-size: 24px; }
    .text-3xl { font-size: 30px; }
    .text-4xl { font-size: 36px; }
    .text-5xl { font-size: 48px; }
    .text-6xl { font-size: 64px; }
    .text-7xl { font-size: 80px; }

    /* Alturas de línea */
    .lh-1 { line-height: 1; }
    .lh-sm { line-height: 1.25; }
    .lh-base { line-height: 1.5; }
    .lh-lg { line-height: 2; }


    .border-radius-sm {border-radius: 0.25rem;}

    .border-radius-md {border-radius: 0.5rem;}

    .border-radius-lg {border-radius: 0.75rem;}


    /* Estilos de padding */
    .p-0 { padding: 0px; }
    .px-0 { padding-left: 0px; padding-right: 0px; }
    .py-0 { padding-top: 0px; padding-bottom: 0px; }
    .pt-0 { padding-top: 0px; }
    .pr-0 { padding-right: 0px; }
    .pb-0 { padding-bottom: 0px; }
    .pl-0 { padding-left: 0px; }

    .p-1 { padding: 4px; }
    .px-1 { padding-left: 4px; padding-right: 4px; }
    .py-1 { padding-top: 4px; padding-bottom: 4px; }
    .pt-1 { padding-top: 4px; }
    .pr-1 { padding-right: 4px; }
    .pb-1 { padding-bottom: 4px; }
    .pl-1 { padding-left: 4px; }

    .p-2 { padding: 8px; }
    .px-2 { padding-left: 8px; padding-right: 8px; }
    .py-2 { padding-top: 8px; padding-bottom: 8px; }
    .pt-2 { padding-top: 8px; }
    .pr-2 { padding-right: 8px; }
    .pb-2 { padding-bottom: 8px; }
    .pl-2 { padding-left: 8px; }

    .p-3 { padding: 12px; }
    .px-3 { padding-left: 12px; padding-right: 12px; }
    .py-3 { padding-top: 12px; padding-bottom: 12px; }
    .pt-3 { padding-top: 12px; }
    .pr-3 { padding-right: 12px; }
    .pb-3 { padding-bottom: 12px; }
    .pl-3 { padding-left: 12px; }

    .p-4 { padding: 16px; }
    .px-4 { padding-left: 16px; padding-right: 16px; }
    .py-4 { padding-top: 16px; padding-bottom: 16px; }
    .pt-4 { padding-top: 16px; }
    .pr-4 { padding-right: 16px; }
    .pb-4 { padding-bottom: 16px; }
    .pl-4 { padding-left: 16px; }

    .p-5 { padding: 20px; }
    .px-5 { padding-left: 20px; padding-right: 20px; }
    .py-5 { padding-top: 20px; padding-bottom: 20px; }
    .pt-5 { padding-top: 20px; }
    .pr-5 { padding-right: 20px; }
    .pb-5 { padding-bottom: 20px; }
    .pl-5 { padding-left: 20px; }

    .p-6 { padding: 24px; }
    .px-6 { padding-left: 24px; padding-right: 24px; }
    .py-6 { padding-top: 24px; padding-bottom: 24px; }
    .pt-6 { padding-top: 24px; }
    .pr-6 { padding-right: 24px; }
    .pb-6 { padding-bottom: 24px; }
    .pl-6 { padding-left: 24px; }

    .p-7 { padding: 28px; }
    .px-7 { padding-left: 28px; padding-right: 28px; }
    .py-7 { padding-top: 28px; padding-bottom: 28px; }
    .pt-7 { padding-top: 28px; }
    .pr-7 { padding-right: 28px; }
    .pb-7 { padding-bottom: 28px; }
    .pl-7 { padding-left: 28px; }

    .p-8 { padding: 32px; }
    .px-8 { padding-left: 32px; padding-right: 32px; }
    .py-8 { padding-top: 32px; padding-bottom: 32px; }
    .pt-8 { padding-top: 32px; }
    .pr-8 { padding-right: 32px; }
    .pb-8 { padding-bottom: 32px; }
    .pl-8 { padding-left: 32px; }

    .p-9 { padding: 36px; }
    .px-9 { padding-left: 36px; padding-right: 36px; }
    .py-9 { padding-top: 36px; padding-bottom: 36px; }
    .pt-9 { padding-top: 36px; }
    .pr-9 { padding-right: 36px; }
    .pb-9 { padding-bottom: 36px; }
    .pl-9 { padding-left: 36px; }

    .p-10 { padding: 40px; }
    .px-10 { padding-left: 40px; padding-right: 40px; }
    .py-10 { padding-top: 40px; padding-bottom: 40px; }
    .pt-10 { padding-top: 40px; }
    .pr-10 { padding-right: 40px; }
    .pb-10 { padding-bottom: 40px; }
    .pl-10 { padding-left: 40px; }

    .p-12 { padding: 48px; }
    .px-12 { padding-left: 48px; padding-right: 48px; }
    .py-12 { padding-top: 48px; padding-bottom: 48px; }
    .pt-12 { padding-top: 48px; }
    .pr-12 { padding-right: 48px; }
    .pb-12 { padding-bottom: 48px; }
    .pl-12 { padding-left: 48px; }

    .p-16 { padding: 64px; }
    .px-16 { padding-left: 64px; padding-right: 64px; }
    .py-16 { padding-top: 64px; padding-bottom: 64px; }
    .pt-16 { padding-top: 64px; }
    .pr-16 { padding-right: 64px; }
    .pb-16 { padding-bottom: 64px; }
    .pl-16 { padding-left: 64px; }

    .p-20 { padding: 80px; }
    .px-20 { padding-left: 80px; padding-right: 80px; }
    .py-20 { padding-top: 80px; padding-bottom: 80px; }
    .pt-20 { padding-top: 80px; }
    .pr-20 { padding-right: 80px; }
    .pb-20 { padding-bottom: 80px; }
    .pl-20 { padding-left: 80px; }

    .p-24 { padding: 96px; }
    .px-24 { padding-left: 96px; padding-right: 96px; }
    .py-24 { padding-top: 96px; padding-bottom: 96px; }
    .pt-24 { padding-top: 96px; }
    .pr-24 { padding-right: 96px; }
    .pb-24 { padding-bottom: 96px; }
    .pl-24 { padding-left: 96px; }

    .p-32 { padding: 128px; }
    .px-32 { padding-left: 128px; padding-right: 128px; }
    .py-32 { padding-top: 128px; padding-bottom: 128px; }
    .pt-32 { padding-top: 128px; }
    .pr-32 { padding-right: 128px; }
    .pb-32 { padding-bottom: 128px; }
    .pl-32 { padding-left: 128px; }

    .p-40 { padding: 160px; }
    .px-40 { padding-left: 160px; padding-right: 160px; }
    .py-40 { padding-top: 160px; padding-bottom: 160px; }
    .pt-40 { padding-top: 160px; }
    .pr-40 { padding-right: 160px; }
    .pb-40 { padding-bottom: 160px; }
    .pl-40 { padding-left: 160px; }

    /* Clases de espaciado y altura */
    .my-0 { margin-top: 0px; margin-bottom: 0px; }
    .mt-0 { margin-top: 0px; }
    .mb-0 { margin-bottom: 0px; }

    .my-1 { margin-top: 4px; margin-bottom: 4px; }
    .mt-1 { margin-top: 4px; }
    .mb-1 { margin-bottom: 4px; }

    .my-2 { margin-top: 8px; margin-bottom: 8px; }
    .mt-2 { margin-top: 8px; }
    .mb-2 { margin-bottom: 8px; }

    .my-3 { margin-top: 12px; margin-bottom: 12px; }
    .mt-3 { margin-top: 12px; }
    .mb-3 { margin-bottom: 12px; }

    .my-4 { margin-top: 16px; margin-bottom: 16px; }
    .mt-4 { margin-top: 16px; }
    .mb-4 { margin-bottom: 16px; }

    .my-5 { margin-top: 20px; margin-bottom: 20px; }
    .mt-5 { margin-top: 20px; }
    .mb-5 { margin-bottom: 20px; }

    .my-6 { margin-top: 24px; margin-bottom: 24px; }
    .mt-6 { margin-top: 24px; }
    .mb-6 { margin-bottom: 24px; }

    .my-7 { margin-top: 28px; margin-bottom: 28px; }
    .mt-7 { margin-top: 28px; }
    .mb-7 { margin-bottom: 28px; }

    .my-8 { margin-top: 32px; margin-bottom: 32px; }
    .mt-8 { margin-top: 32px; }
    .mb-8 { margin-bottom: 32px; }

    .my-9 { margin-top: 36px; margin-bottom: 36px; }
    .mt-9 { margin-top: 36px; }
    .mb-9 { margin-bottom: 36px; }

    .my-10 { margin-top: 40px; margin-bottom: 40px; }
    .mt-10 { margin-top: 40px; }
    .mb-10 { margin-bottom: 40px; }

    .my-12 { margin-top: 48px; margin-bottom: 48px; }
    .mt-12 { margin-top: 48px; }
    .mb-12 { margin-bottom: 48px; }

    .my-16 { margin-top: 64px; margin-bottom: 64px; }
    .mt-16 { margin-top: 64px; }
    .mb-16 { margin-bottom: 64px; }

    .my-20 { margin-top: 80px; margin-bottom: 80px; }
    .mt-20 { margin-top: 80px; }
    .mb-20 { margin-bottom: 80px; }

    .my-24 { margin-top: 96px; margin-bottom: 96px; }
    .mt-24 { margin-top: 96px; }
    .mb-24 { margin-bottom: 96px; }

    .my-32 { margin-top: 128px; margin-bottom: 128px; }
    .mt-32 { margin-top: 128px; }
    .mb-32 { margin-bottom: 128px; }

    .my-40 { margin-top: 160px; margin-bottom: 160px; }
    .mt-40 { margin-top: 160px; }
    .mb-40 { margin-bottom: 160px; }


    /* Colores de texto */
    .text-primary { color: #0d6efd; }
    .text-secondary { color: #6c757d; }
    .text-success { color: #198754; }
    .text-info { color: #0dcaf0; }
    .text-warning { color: #ffc107; }
    .text-danger { color: #dc3545; }
    .text-light { color: #f8f9fa; }
    .text-dark { color: #212529; }
    .text-black { color: #000000; }
    .text-white { color: #ffffff; }
    .text-transparent { color: transparent; }

    /* Colores de texto gris */
    .text-gray-100 { color: #f8f9fa; }
    .text-gray-200 { color: #e9ecef; }
    .text-gray-300 { color: #dee2e6; }
    .text-gray-400 { color: #ced4da; }
    .text-gray-500 { color: #adb5bd; }
    .text-gray-600 { color: #6c757d; }
    .text-gray-700 { color: #495057; }
    .text-gray-800 { color: #343a40; }
    .text-gray-900 { color: #212529; }

    /* Colores de texto azul */
    .text-blue-100 { color: #cfe2ff; }
    .text-blue-200 { color: #9ec5fe; }
    .text-blue-300 { color: #6ea8fe; }
    .text-blue-400 { color: #3d8bfd; }
    .text-blue-500 { color: #0d6efd; }
    .text-blue-600 { color: #0a58ca; }
    .text-blue-700 { color: #084298; }
    .text-blue-800 { color: #052c65; }
    .text-blue-900 { color: #031633; }

    /* Colores de texto indigo */
    .text-indigo-100 { color: #e0cffc; }
    .text-indigo-200 { color: #c29ffa; }
    .text-indigo-300 { color: #a370f7; }
    .text-indigo-400 { color: #8540f5; }
    .text-indigo-500 { color: #6610f2; }
    .text-indigo-600 { color: #520dc2; }
    .text-indigo-700 { color: #3d0a91; }
    .text-indigo-800 { color: #290661; }
    .text-indigo-900 { color: #140330; }

    /* Colores de texto morado */
    .text-purple-100 { color: #e2d9f3; }
    .text-purple-200 { color: #c5b3e6; }
    .text-purple-300 { color: #a98eda; }
    .text-purple-400 { color: #8c68cd; }
    .text-purple-500 { color: #6f42c1; }
    .text-purple-600 { color: #59359a; }
    .text-purple-700 { color: #432874; }
    .text-purple-800 { color: #2c1a4d; }
    .text-purple-900 { color: #160d27; }

    /* Colores de texto rosa */
    .text-pink-100 { color: #f7d6e6; }
    .text-pink-200 { color: #efadce; }
    .text-pink-300 { color: #e685b5; }
    .text-pink-400 { color: #de5c9d; }
    .text-pink-500 { color: #d63384; }
    .text-pink-600 { color: #ab296a; }
    .text-pink-700 { color: #801f4f; }
    .text-pink-800 { color: #561435; }
    .text-pink-900 { color: #2b0a1a; }

    /* Colores de texto rojo */
    .text-red-100 { color: #f8d7da; }
    .text-red-200 { color: #f1aeb5; }
    .text-red-300 { color: #ea868f; }
    .text-red-400 { color: #e35d6a; }
    .text-red-500 { color: #dc3545; }
    .text-red-600 { color: #b02a37; }
    .text-red-700 { color: #842029; }
    .text-red-800 { color: #58151c; }
    .text-red-900 { color: #2c0b0e; }

    /* Colores de texto naranja */
    .text-orange-100 { color: #ffe5d0; }
    .text-orange-200 { color: #fecba1; }
    .text-orange-300 { color: #feb272; }
    .text-orange-400 { color: #fd9843; }
    .text-orange-500 { color: #fd7e14; }
    .text-orange-600 { color: #ca6510; }
    .text-orange-700 { color: #984c0c; }
    .text-orange-800 { color: #653208; }
    .text-orange-900 { color: #331904; }

    /* Colores de texto amarillo */
    .text-yellow-100 { color: #fff3cd; }
    .text-yellow-200 { color: #ffe69c; }
    .text-yellow-300 { color: #ffda6a; }
    .text-yellow-400 { color: #ffcd39; }
    .text-yellow-500 { color: #ffc107; }
    .text-yellow-600 { color: #cc9a06; }
    .text-yellow-700 { color: #997404; }
    .text-yellow-800 { color: #664d03; }
    .text-yellow-900 { color: #332701; }

    /* Colores de texto verde */
    .text-green-100 { color: #d1e7dd; }
    .text-green-200 { color: #a3cfbb; }
    .text-green-300 { color: #75b798; }
    .text-green-400 { color: #479f76; }
    .text-green-500 { color: #198754; }
    .text-green-600 { color: #146c43; }
    .text-green-700 { color: #0f5132; }
    .text-green-800 { color: #0a3622; }
    .text-green-900 { color: #051b11; }

    /* Colores de texto teal */
    .text-teal-100 { color: #d2f4ea; }
    .text-teal-200 { color: #a6e9d5; }
    .text-teal-300 { color: #79dfc1; }
    .text-teal-400 { color: #4dd4ac; }
    .text-teal-500 { color: #20c997; }
    .text-teal-600 { color: #1aa179; }
    .text-teal-700 { color: #13795b; }
    .text-teal-800 { color: #0d503c; }
    .text-teal-900 { color: #06281e; }

    /* Colores de texto cyan */
    .text-cyan-100 { color: #cff4fc; }
    .text-cyan-200 { color: #9eeaf9; }
    .text-cyan-300 { color: #6edff6; }
    .text-cyan-400 { color: #3dd5f3; }
    .text-cyan-500 { color: #0dcaf0; }
    .text-cyan-600 { color: #0aa2c0; }
    .text-cyan-700 { color: #087990; }
    .text-cyan-800 { color: #055160; }
    .text-cyan-900 { color: #032830; }


    /* Ancho (width) */
    .w-full { width: 100%; }
    .w-auto { width: auto; }

    .w-0 { width: 0px; }
    .w-1 { width: 4px; }
    .w-2 { width: 8px; }
    .w-3 { width: 12px; }
    .w-4 { width: 16px; }
    .w-5 { width: 20px; }
    .w-6 { width: 24px; }
    .w-7 { width: 28px; }
    .w-8 { width: 32px; }
    .w-9 { width: 36px; }
    .w-10 { width: 40px; }
    .w-12 { width: 48px; }
    .w-16 { width: 64px; }
    .w-20 { width: 80px; }
    .w-24 { width: 96px; }
    .w-32 { width: 128px; }
    .w-40 { width: 160px; }
    .w-48 { width: 192px; }
    .w-56 { width: 224px; }
    .w-64 { width: 256px; }
    .w-80 { width: 320px; }
    .w-96 { width: 384px; }
    .w-112 { width: 448px; }
    .w-128 { width: 512px; }
    .w-144 { width: 576px; }
    .w-150 { width: 600px; }

    /* Ancho máximo (max-width) */
    .max-w-full { max-width: 100%; }
    .max-w-0 { max-width: 0px; }
    .max-w-1 { max-width: 4px; }
    .max-w-2 { max-width: 8px; }
    .max-w-3 { max-width: 12px; }
    .max-w-4 { max-width: 16px; }
    .max-w-5 { max-width: 20px; }
    .max-w-6 { max-width: 24px; }
    .max-w-7 { max-width: 28px; }
    .max-w-8 { max-width: 32px; }
    .max-w-9 { max-width: 36px; }
    .max-w-10 { max-width: 40px; }
    .max-w-12 { max-width: 48px; }
    .max-w-16 { max-width: 64px; }
    .max-w-20 { max-width: 80px; }
    .max-w-24 { max-width: 96px; }
    .max-w-32 { max-width: 128px; }
    .max-w-40 { max-width: 160px; }
    .max-w-48 { max-width: 192px; }
    .max-w-56 { max-width: 224px; }
    .max-w-64 { max-width: 256px; }
    .max-w-80 { max-width: 320px; }
    .max-w-96 { max-width: 384px; }
    .max-w-112 { max-width: 448px; }
    .max-w-128 { max-width: 512px; }
    .max-w-144 { max-width: 576px; }
    .max-w-150 { max-width: 600px; }

    /* Colores de fondo */
    .bg-primary { background-color: #0d6efd; }
    .bg-secondary { background-color: #6c757d; }
    .bg-success { background-color: #198754; }
    .bg-info { background-color: #0dcaf0; }
    .bg-warning { background-color: #ffc107; }
    .bg-danger { background-color: #dc3545; }
    .bg-light { background-color: #f8f9fa; }
    .bg-dark { background-color: #212529; }
    .bg-black { background-color: #000000; }
    .bg-white { background-color: #ffffff; }
    .bg-transparent { background-color: transparent; }

    /* Colores de fondo gris */
    .bg-gray-100 { background-color: #f8f9fa; }
    .bg-gray-200 { background-color: #e9ecef; }
    .bg-gray-300 { background-color: #dee2e6; }
    .bg-gray-400 { background-color: #ced4da; }
    .bg-gray-500 { background-color: #adb5bd; }
    .bg-gray-600 { background-color: #6c757d; }
    .bg-gray-700 { background-color: #495057; }
    .bg-gray-800 { background-color: #343a40; }
    .bg-gray-900 { background-color: #212529; }

    /* Colores de fondo blue */
    .bg-blue-100 { background-color: #cfe2ff; }
    .bg-blue-200 { background-color: #9ec5fe; }
    .bg-blue-300 { background-color: #6ea8fe; }
    .bg-blue-400 { background-color: #3d8bfd; }
    .bg-blue-500 { background-color: #0d6efd; }
    .bg-blue-600 { background-color: #0a58ca; }
    .bg-blue-700 { background-color: #084298; }
    .bg-blue-800 { background-color: #052c65; }
    .bg-blue-900 { background-color: #031633; }

    /* Colores de fondo indigo */
    .bg-indigo-100 { background-color: #e0cffc; }
    .bg-indigo-200 { background-color: #c29ffa; }
    .bg-indigo-300 { background-color: #a370f7; }
    .bg-indigo-400 { background-color: #8540f5; }
    .bg-indigo-500 { background-color: #6610f2; }
    .bg-indigo-600 { background-color: #520dc2; }
    .bg-indigo-700 { background-color: #3d0a91; }
    .bg-indigo-800 { background-color: #290661; }
    .bg-indigo-900 { background-color: #140330; }

    /* Colores de fondo purple */
    .bg-purple-100 { background-color: #e2d9f3; }
    .bg-purple-200 { background-color: #c5b3e6; }
    .bg-purple-300 { background-color: #a98eda; }
    .bg-purple-400 { background-color: #8c68cd; }
    .bg-purple-500 { background-color: #6f42c1; }
    .bg-purple-600 { background-color: #59359a; }
    .bg-purple-700 { background-color: #432874; }
    .bg-purple-800 { background-color: #2c1a4d; }
    .bg-purple-900 { background-color: #160d27; }

    /* Colores de fondo pink */
    .bg-pink-100 { background-color: #f7d6e6; }
    .bg-pink-200 { background-color: #efadce; }
    .bg-pink-300 { background-color: #e685b5; }
    .bg-pink-400 { background-color: #de5c9d; }
    .bg-pink-500 { background-color: #d63384; }
    .bg-pink-600 { background-color: #ab296a; }
    .bg-pink-700 { background-color: #801f4f; }
    .bg-pink-800 { background-color: #561435; }
    .bg-pink-900 { background-color: #2b0a1a; }

    /* Colores de fondo red */
    .bg-red-100 { background-color: #f8d7da; }
    .bg-red-200 { background-color: #f1aeb5; }
    .bg-red-300 { background-color: #ea868f; }
    .bg-red-400 { background-color: #e35d6a; }
    .bg-red-500 { background-color: #dc3545; }
    .bg-red-600 { background-color: #b02a37; }
    .bg-red-700 { background-color: #842029; }
    .bg-red-800 { background-color: #58151c; }
    .bg-red-900 { background-color: #2c0b0e; }

    /* Colores de fondo orange */
    .bg-orange-100 { background-color: #ffe5d0; }
    .bg-orange-200 { background-color: #fecba1; }
    .bg-orange-300 { background-color: #feb272; }
    .bg-orange-400 { background-color: #fd9843; }
    .bg-orange-500 { background-color: #fd7e14; }
    .bg-orange-600 { background-color: #ca6510; }
    .bg-orange-700 { background-color: #984c0c; }
    .bg-orange-800 { background-color: #653208; }
    .bg-orange-900 { background-color: #331904; }

    /* Colores de fondo yellow */
    .bg-yellow-100 { background-color: #fff3cd; }
    .bg-yellow-200 { background-color: #ffe69c; }
    .bg-yellow-300 { background-color: #ffda6a; }
    .bg-yellow-400 { background-color: #ffcd39; }
    .bg-yellow-500 { background-color: #ffc107; }
    .bg-yellow-600 { background-color: #cc9a06; }
    .bg-yellow-700 { background-color: #997404; }
    .bg-yellow-800 { background-color: #664d03; }
    .bg-yellow-900 { background-color: #332701; }

    /* Colores de fondo green */
    .bg-green-100 { background-color: #d1e7dd; }
    .bg-green-200 { background-color: #a3cfbb; }
    .bg-green-300 { background-color: #75b798; }
    .bg-green-400 { background-color: #479f76; }
    .bg-green-500 { background-color: #198754; }
    .bg-green-600 { background-color: #146c43; }
    .bg-green-700 { background-color: #0f5132; }
    .bg-green-800 { background-color: #0a3622; }
    .bg-green-900 { background-color: #051b11; }

    /* Colores de fondo teal */
    .bg-teal-100 { background-color: #d2f4ea; }
    .bg-teal-200 { background-color: #a6e9d5; }
    .bg-teal-300 { background-color: #79dfc1; }
    .bg-teal-400 { background-color: #4dd4ac; }
    .bg-teal-500 { background-color: #20c997; }
    .bg-teal-600 { background-color: #1aa179; }
    .bg-teal-700 { background-color: #13795b; }
    .bg-teal-800 { background-color: #0d503c; }
    .bg-teal-900 { background-color: #06281e; }

    /* Colores de fondo cyan */
    .bg-cyan-100 { background-color: #cff4fc; }
    .bg-cyan-200 { background-color: #9eeaf9; }
    .bg-cyan-300 { background-color: #6edff6; }
    .bg-cyan-400 { background-color: #3dd5f3; }
    .bg-cyan-500 { background-color: #0dcaf0; }
    .bg-cyan-600 { background-color: #0aa2c0; }
    .bg-cyan-700 { background-color: #087990; }
    .bg-cyan-800 { background-color: #055160; }
    .bg-cyan-900 { background-color: #032830; }

    /* Tamaños de borde */
    .border { border: 1px solid #dee2e6; }
    .border-top { border-top: 1px solid #dee2e6; }
    .border-right { border-right: 1px solid #dee2e6; }
    .border-bottom { border-bottom: 1px solid #dee2e6; }
    .border-left { border-left: 1px solid #dee2e6; }

    .border-2 { border: 2px solid #dee2e6; }
    .border-top-2 { border-top: 2px solid #dee2e6; }
    .border-right-2 { border-right: 2px solid #dee2e6; }
    .border-bottom-2 { border-bottom: 2px solid #dee2e6; }
    .border-left-2 { border-left: 2px solid #dee2e6; }

    .border-3 { border: 3px solid #dee2e6; }
    .border-top-3 { border-top: 3px solid #dee2e6; }
    .border-right-3 { border-right: 3px solid #dee2e6; }
    .border-bottom-3 { border-bottom: 3px solid #dee2e6; }
    .border-left-3 { border-left: 3px solid #dee2e6; }

    .border-4 { border: 4px solid #dee2e6; }
    .border-top-4 { border-top: 4px solid #dee2e6; }
    .border-right-4 { border-right: 4px solid #dee2e6; }
    .border-bottom-4 { border-bottom: 4px solid #dee2e6; }
    .border-left-4 { border-left: 4px solid #dee2e6; }

    .border-5 { border: 5px solid #dee2e6; }
    .border-top-5 { border-top: 5px solid #dee2e6; }
    .border-right-5 { border-right: 5px solid #dee2e6; }
    .border-bottom-5 { border-bottom: 5px solid #dee2e6; }
    .border-left-5 { border-left: 5px solid #dee2e6; }

    /* Bordes sin tamaño */
    .border-0 { border: 0px solid #dee2e6; }
    .border-top-0 { border-top: 0px solid #dee2e6; }
    .border-right-0 { border-right: 0px solid #dee2e6; }
    .border-bottom-0 { border-bottom: 0px solid #dee2e6; }
    .border-left-0 { border-left: 0px solid #dee2e6; }

    hr{
        border-top: 1px solid #e2e8f0;
    }


</style>
