<?php include('php/authenticate.php') ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact | Ch Leong Enterprise Sdn Bhd</title>
    <link rel="stylesheet" href="css/contact.css">
    <link rel="icon" href="media/chleong.png">
</head>
<!-- Header -->
<?php include('header.php'); ?>
<script>
    // Initialize and add the map
    function initMap() {
        // The location of Uluru
        const yata = { lat: 3.2347551959978023, lng: 101.66792500515848 };
        // The map, centered at Uluru
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 15,
            center: yata,
            gestureHandling: "none",
        });
        const contentString =
            "<p>No.46, Jalan 6/3A,Bandar Baru Utara, KM 12, Jalan Ipoh, 68100 Batu Caves, Kuala Lumpur</p>" +
            "<a href='https://www.google.com/maps/dir/3.424256,101.6659968/Bumi+Aman+Wira+Corp+Sdn+Bhd,+No.+44-1,+Jalan+6%2F3a,+Pusat+Bandar+Utara+Selayang,+68100+Batu+Caves,+Selangor/@3.3459685,101.4990958,47715m/data=!3m2!1e3!4b1!4m9!4m8!1m1!4e1!1m5!1m1!1s0x31cc4706bbbba427:0x3ecbf7e18934d212!2m2!1d101.6679096!2d3.2346934'>Directions</a> ";
        const infowindow = new google.maps.InfoWindow({
            content: contentString,
        });
        // The marker, positioned at Uluru
        const marker = new google.maps.Marker({
            position: yata,
            map: map,
        });
        infowindow.open(map,marker);
    }
</script>
<body>
    <video id="bgVideo" preload="true" autoplay loop muted width="100%">
        <source src="media/contact.mp4" type="video/mp4" > 
    </video>
    <div id="about">
        <h1>CONTACT US</h1>
        <div id="contact1">
            <div class="square" id="contact1box1">
                <svg preserveAspectRatio="xMidYMid meet" data-bbox="66.5 49.5 67 101" viewBox="66.5 49.5 67 101" height="200" width="200" xmlns="http://www.w3.org/2000/svg" data-type="color" role="presentation" aria-hidden="true"><defs><style>#comp-kt86mxed svg [data-color="1"] {fill: #0E2925;}
                #comp-kt86mxed svg [data-color="2"] {fill: #FCB400;}</style></defs>
                    <g>
                        <path d="M130.227 150.5H69.773a3.277 3.277 0 0 1-3.273-3.282V52.782a3.277 3.277 0 0 1 3.273-3.282h60.454a3.278 3.278 0 0 1 3.273 3.282v94.436a3.278 3.278 0 0 1-3.273 3.282zm-57.18-6.564h53.907V56.064H73.047v87.872z" fill="#0E4828" data-color="1"></path>
                        <path d="M116.638 71.853H83.361a3.379 3.379 0 0 0-3.374 3.384v46.65a3.38 3.38 0 0 0 3.374 3.384h33.277a3.379 3.379 0 0 0 3.374-3.384v-46.65a3.378 3.378 0 0 0-3.374-3.384z" fill="#E98866" data-color="2"></path>
                        <path d="M109.565 62.242h-19.13c-1.118 0-2.025.909-2.025 2.03s.907 2.03 2.025 2.03h19.13c1.118 0 2.025-.909 2.025-2.03s-.907-2.03-2.025-2.03z" fill="#0E4828" data-color="1"></path>
                        <path fill="#0E4828" d="M104.155 134.829a4.16 4.16 0 0 1-4.155 4.166 4.16 4.16 0 0 1-4.155-4.166 4.16 4.16 0 0 1 4.155-4.166 4.16 4.16 0 0 1 4.155 4.166z" data-color="1"></path>
                    </g>
                </svg><br><br>
                <h2>TALK TO A MEMBER OF OUR TEAM</h2><br>
                <p><i class="fas fa-phone"></i>&nbsp;012-7172335</p>
                <p><i class="fas fa-phone"></i>&nbsp;019-3521919</p>
                <p><i class="fas fa-building"></i>&nbsp;&nbsp;03-33925002</p>
            </div>
            <div class="square" id="contact1box2">
                <svg preserveAspectRatio="xMidYMid meet" data-bbox="20 20.394 159.999 159.212" xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="20 20.394 159.999 159.212" data-type="color" role="presentation" aria-hidden="true" aria-labelledby="svgcid-i7tqz9-3ny5bb"><defs><style>#comp-kt87p8o2 svg [data-color="3"] {fill: #97BCDB;}</style></defs><title id="svgcid-i7tqz9-3ny5bb"></title>
                    <g>
                        <path d="M175.978 76.238v99.347H24.021V76.238h151.957z" fill="#FFFFFF" data-color="1"></path>
                        <path fill="#2E3A48" d="M175.979 179.606H24.021A4.021 4.021 0 0120 175.585V76.238a4.021 4.021 0 014.021-4.021h151.957a4.021 4.021 0 014.021 4.021v99.346a4.02 4.02 0 01-4.02 4.022zm-147.936-8.043h143.914V80.259H28.043v91.304z" data-color="2"></path>
                        <path d="M175.979 76.238l-75.566-51.822-75.566 51.822 75.566 51.821 75.566-51.821z" fill="#FFFFFF" data-color="1"></path>
                        <path fill="#2E3A48" d="M100.412 132.081a4.02 4.02 0 01-2.275-.705L22.571 79.555a4.023 4.023 0 010-6.632L98.138 21.1a4.02 4.02 0 014.55 0l75.566 51.822a4.023 4.023 0 010 6.632l-75.566 51.822a4.022 4.022 0 01-2.276.705zM31.956 76.238l68.456 46.945 68.456-46.945-68.456-46.945-68.456 46.945z" data-color="2"></path>
                        <path fill="#2E3A48" d="M24.021 179.606a4.024 4.024 0 01-2.895-6.813l57.98-60.15a4.025 4.025 0 015.687-.104 4.024 4.024 0 01.104 5.687l-57.98 60.15a4.014 4.014 0 01-2.896 1.23z" data-color="2"></path>
                        <path fill="#2E3A48" d="M175.979 179.606a4.008 4.008 0 01-2.895-1.23l-57.98-60.15a4.024 4.024 0 01.104-5.687 4.024 4.024 0 015.687.104l57.98 60.15a4.024 4.024 0 01-2.896 6.813z" data-color="2"></path>
                        <path d="M152.56 41.298V92.29l-52.157 35.75-52.962-36.313V41.298H152.56z" fill="#EA6F66" data-color="3"></path>
                        <path fill="#2E3A48" d="M100.403 132.062a4.016 4.016 0 01-2.274-.705L45.167 95.043a4.02 4.02 0 01-1.748-3.316V41.298a4.021 4.021 0 014.021-4.021h105.12a4.021 4.021 0 014.021 4.021V92.29a4.022 4.022 0 01-1.748 3.317l-52.157 35.75a4.013 4.013 0 01-2.273.705zM51.462 89.608l48.94 33.557 48.136-32.993V45.32H51.462v44.288z" data-color="2"></path>
                        <path fill="#EA6F66" d="M112.892 97.324c-5.79 4.155-13.564 5.515-21.097 2.579-8.271-3.224-13.897-11.427-13.898-20.304-.002-14.41 12.92-24.513 26.321-21.912 11.112 2.157 18.65 12.292 17.826 23.309-.191 2.551-1.697 4.983-4.131 5.768a6.246 6.246 0 01-2.964.219c-2.398-.407-4.376-2.205-5.07-4.606" data-color="3"></path>
                        <path fill="#2E3A48" d="M100.023 104.477a25.66 25.66 0 01-9.324-1.764C81.239 99.026 74.882 89.738 74.88 79.6c-.001-7.658 3.332-14.798 9.142-19.59a25.037 25.037 0 0120.769-5.284c12.498 2.426 21.208 13.817 20.259 26.495-.297 3.991-2.737 7.294-6.214 8.414a9.335 9.335 0 01-4.394.323c-3.522-.597-6.451-3.244-7.463-6.743a3.016 3.016 0 015.795-1.675c.372 1.288 1.424 2.258 2.676 2.47a3.208 3.208 0 001.532-.116c1.1-.353 1.942-1.638 2.053-3.123.72-9.628-5.899-18.28-15.393-20.123a19.031 19.031 0 00-15.782 4.016c-4.416 3.641-6.948 9.085-6.948 14.935.002 7.672 4.815 14.702 11.978 17.494 6.149 2.398 12.968 1.567 18.244-2.22a3.017 3.017 0 013.517 4.901 25.035 25.035 0 01-14.628 4.703z" data-color="2"></path>
                        <path d="M110.131 79.376c0 5.591-4.533 10.124-10.124 10.124s-10.124-4.533-10.124-10.124 4.533-10.124 10.124-10.124 10.124 4.533 10.124 10.124z" fill="#EA6F66" data-color="3"></path>
                        <path fill="#2E3A48" d="M100.012 92.518c-.828 0-1.666-.079-2.508-.242a13.056 13.056 0 01-8.388-5.55 13.056 13.056 0 01-2.008-9.855c1.38-7.112 8.286-11.778 15.403-10.395a13.054 13.054 0 018.388 5.549 13.058 13.058 0 012.008 9.855c-1.218 6.271-6.734 10.638-12.895 10.638zm-.007-20.251c-3.334 0-6.318 2.362-6.976 5.754-.748 3.848 1.775 7.586 5.624 8.333 3.846.748 7.585-1.775 8.331-5.623v-.001a7.063 7.063 0 00-1.086-5.331 7.053 7.053 0 00-4.537-3.001 7.14 7.14 0 00-1.356-.131z" data-color="2"></path>
                    </g>
                </svg><br>
                <h2>EMAIL TO OUR TEAM</h2><br>
                <p>chleongenterprisesdnbhd@gmail.com</p><br><br>
                    <svg preserveAspectRatio="xMidYMid meet" data-bbox="43 34 114 132" viewBox="43 34 114 132" height="200" width="200" xmlns="http://www.w3.org/2000/svg" data-type="color" role="presentation" aria-hidden="true" aria-labelledby="svgcid-nngai7cj6ffe"><title id="svgcid-nngai7cj6ffe"></title>
                    <g>
                        <path fill="#C7DDE5" d="M157 55v98H43V55h114z" data-color="1"></path>
                        <path d="M148.529 43.105l-7.223 2.521-6.858 2.393-7.223 2.521-8.316 2.87-37.818-13.215-37.935 13.234V166l8.307-2.898 7.216-2.518 6.853-2.39 7.216-2.518 8.307-2.898 7.018 2.444 6.177 2.154 5.755 2.008 5.754 2.008 6.177 2.154 7.012 2.453 8.307-2.899 7.216-2.519 6.852-2.391 7.216-2.518 8.307-2.899V40.201l-8.317 2.904zm4.982 84.513v23.031l-7.576 2.644-6.581 2.296-6.25 2.181-6.581 2.297-7.576 2.643-5.51-1.928-4.811-1.679-5.516-1.924-6.341-2.212-5.532-1.93-6.342-2.213-3.839-1.336-7.576 2.643-6.582 2.296-6.25 2.18-6.581 2.297-7.577 2.643.001-7.941v-14.868l-.893 1.43.447-4.745.446-4.744.001-8.359V88.21l.001-8.777V55.554l6.534-2.281 5.622-1.961 5.622-1.963 6.534-2.28 5.143-1.795 5.144-1.79 37.819 13.214 7.584-2.614 6.588-2.299 6.256-2.183 6.588-2.299 7.584-2.647v.678l.001 8.378v30.756l.084 2.494-.083.031v32.441l-.002 8.184z" fill="#FFDEAE" data-color="2"></path>
                        <path fill="#C7DDE5" d="M81.08 74.772l.002-8.409.003-7.236.002-7.235.003-8.407-5.144 1.79-5.143 1.795-.002 8.052-.002 8.052-1.308 6.9-3.562 6.505-5.284 5.39-6.467 3.558-7.688 2.683v6.586l7.609-2.656 6.546-2.284 6.547-2.285 7.609-2.655 3.139-5.074 3.14-5.07z" data-color="1"></path>
                        <path fill="#C7DDE5" d="M46.49 99.58v22.743l-.001 8.358 4.543-7.344 3.998-6.463 3.725-6.022 3.726-6.023 3.999-6.465 4.544-7.344-6.593 2.3-5.673 1.98-5.675 1.98-6.593 2.3z" data-color="1"></path>
                        <path d="M46.489 138.74v14.868l-.001 7.941 7.577-2.643 6.581-2.297 6.25-2.18 6.582-2.296 7.576-2.643.003-9.352.003-8.423.002-7.803.002-7.493.002-7.493.003-7.802.002-8.424.003-9.353-4.892 7.831-4.406 7.054-4.081 6.536-3.919 6.275-3.919 6.276-4.08 6.535-4.403 7.053-4.885 7.833zm30.334-13.147l-.002 7.154-.001 6.242-.002 7.155-8.199 2.86-7.152 2.495-8.199 2.86v-7.153l.001-6.241v-7.154l5.889-2.054 5.889-2.055.001-6.896.001-6.898 5.89-2.054 5.889-2.056-.002 6.898-.003 6.897z" fill="#C7DDE5" data-color="1"></path>
                        <path fill="#C7DDE5" d="M118.91 56.698l-6.105-2.129-31.728 28.778-.003 9.353-.003 8.424-.003 7.802-.002 7.493-.002 7.493-.002 7.803-.003 8.423-.004 9.351 22.055 7.691 5.516 1.924 4.81 1.679 5.51 1.928-.036-106.013z" data-color="1"></path>
                        <path fill="#C7DDE5" d="M105.665 52.078l-6.635-2.315-5.71-1.992-5.71-1.992-6.52-2.294-.003 8.407-.002 7.235-.003 7.236-.002 8.409 5.323-4.987 4.697-4.319 4.459-4.1 4.698-4.318 5.408-4.97z" data-color="1"></path>
                        <path opacity=".15" d="M118.91 56.698l-6.105-2.129-31.728 28.778-.003 9.353-.003 8.424-.003 7.802-.002 7.493-.002 7.493-.002 7.803-.003 8.423-.004 9.351 22.055 7.691 5.516 1.924 4.81 1.679 5.51 1.928-.036-106.013z"></path>
                        <path opacity=".15" d="M105.665 52.078l-6.635-2.315-5.71-1.992-5.71-1.992-6.52-2.294-.003 8.407-.002 7.235-.003 7.236-.002 8.409 5.323-4.987 4.697-4.319 4.459-4.1 4.698-4.318 5.408-4.97z"></path>
                        <path fill="#C7DDE5" d="M118.939 144.231l8.494-2.958 7.309-2.551 7.31-2.55 8.494-2.965.001 5.929v11.1l-8.493 2.964-7.308 2.55-7.308 2.551-8.493 2.962.001 1.448 7.576-2.644 6.581-2.297 6.251-2.181 6.581-2.296 7.576-2.645v-23.03l-7.578 2.644-6.584 2.299-6.251 2.181-6.582 2.297-7.578 2.637.001 4.555z" data-color="1"></path>
                        <path fill="#C7DDE5" d="M118.929 112.446l.001 4.412 4.553-7.364 5.505-6.523 6.273-5.226 6.852-3.488 5.698-1.988 5.699-1.988v-3.288l-3.954 1.512-3.954 1.511-6.145 2.886-5.863 3.806-5.458 4.608-4.928 5.29-4.279 5.84z" data-color="1"></path>
                        <path fill="#C7DDE5" d="M120.053 88.472l-1.132 1.814.002 7.402.003 7.402 34.583-20.622V69.4l-7.092 2.475-6.162 2.15-5.849 2.042-6.162 2.15-7.092 2.475-.003-8.378-.002-7.308-.003-8.378 7.094-2.476 6.162-2.15 5.852-2.042 6.162-2.151 7.094-2.476v-.677l-7.584 2.646-6.588 2.3-6.255 2.183-6.588 2.299-7.584 2.614.003 8.402.002 7.23.004 7.23.002 8.402 1.133.51z" data-color="1"></path>
                        <path fill="#CBEA8F" d="M70.799 63.174l.002-8.052.002-8.052-6.534 2.279-5.622 1.963-5.622 1.961-6.534 2.281v23.879l-.001 8.777 7.688-2.683 6.467-3.558 5.284-5.39 3.562-6.505 1.308-6.9z" data-color="3"></path>
                        <path fill="#FAFCFC" d="M45.596 140.17l.893-1.43v-8.059l-.446 4.745-.447 4.744z" data-color="4"></path>
                        <path fill="#C7DDE5" d="M53.269 133.81v7.154l-.001 6.241v7.153l8.199-2.86 7.152-2.495 8.198-2.86.003-7.155.001-6.241.002-7.154-5.888 2.053-5.888 2.055-5.889 2.054-5.889 2.055z" data-color="1"></path>
                        <path fill="#C7DDE5" d="M65.047 129.701l5.888-2.055 5.888-2.053.002-6.899.002-6.897-5.889 2.055-5.889 2.055-.001 6.897-.001 6.897z" data-color="1"></path>
                        <path fill="#FAFCFC" d="M153.593 86.962l-.084-2.494.001 2.525.083-.031z" data-color="4"></path>
                        <path fill="#FAFCFC" d="M112.81 54.57l-5.9 5.32-5.18 4.69-4.83 4.37-4.83 4.37-5.18 4.69-5.81 5.34-4.89 7.83-4.41 7.05-4.08 6.54-3.92 6.27-3.92 6.28-4.08 6.53-4.4 7.06-4.89 7.83v-8.06l4.54-7.34 4-6.47 3.73-6.02 3.72-6.02 4-6.47 4.54-7.34-6.59 2.3-5.67 1.98-5.68 1.98-6.59 2.3V94.8l7.61-2.66 6.55-2.28 6.54-2.29 7.61-2.65 3.14-5.08 3.14-5.07 5.32-4.98 4.7-4.32 4.46-4.1 4.7-4.32 5.41-4.97 7.14 2.49z" data-color="4"></path>
                        <path d="M153.9 81.96l-.39 5.03-3.95 1.52s-9.14 3.13-15.97 8.2c-6.39 4.75-14.66 15.74-14.66 15.74s-3.01 3.05-3.79 4.23c-1.11 1.68-2.84 5.35-3.4 7.28-.61 2.09-1.01 6.46-1.16 8.64-.12 1.82 0 7.3 0 7.3l.01 6.29v13.6l-5.08-1.77v-7.31l-.01-6.29v-6.29s-.08-5.48 0-7.31c.07-1.68.28-5.06.59-6.72.29-1.56 1.14-4.63 1.75-6.1.6-1.47 2.26-4.18 3.02-5.57 0 0 2.62-3.23 3.65-4.15 1-.92 4.42-3.19 4.42-3.19s4.23-4.9 5.76-6.41c1.53-1.49 4.75-4.3 6.45-5.59 1.66-1.26 5.15-3.58 6.97-4.61 1.76-1 5.49-2.6 7.32-3.47 0 0 2.99-1.16 4-1.53 1.11-.4 4.47-1.52 4.47-1.52z" fill="#FAFCFC" data-color="4"></path>
                        <path fill="#CBEA8F" d="M153.51 90.28v37.34l-7.58 2.64-6.58 2.3-6.25 2.18-6.58 2.3-7.58 2.64-6.1-2.13v-3.1l.73-6.51 2.09-5.96 3.27-5.12 4.55-7.37 5.51-6.52 6.27-5.22 6.85-3.49 5.7-1.99 5.7-1.99z" data-color="3"></path>
                        <path fill="#C7DDE5" d="M150.546 133.207l-8.494 2.965-7.31 2.55-7.309 2.551-8.494 2.958.003 5.929.002 5.173.001 5.93 8.493-2.962 7.308-2.551 7.308-2.55 8.493-2.964v-11.1l-.001-5.929z" data-color="1"></path>
                        <path fill="#C7DDE5" d="M84.868 112.495l.005 8.402.005 7.298.005 6.931.005 7.298.006 8.401 6.342 2.213 5.532 1.93 6.342 2.212-.005-8.401-.003-7.298-.004-6.93-.004-7.298-.005-8.402-6.344-2.212-5.534-1.932-6.343-2.212z" data-color="1"></path>
                        <path fill="#C7DDE5" d="M105.696 73.038l-6.37 5.889-5.479 5.066-5.48 5.067L82 94.949l4.999 5.64 4.36 4.92 4.999 5.641 6.063-5.609 5.219-4.824 5.218-4.825 6.063-5.606-.001-2.324-4.602-5.196-4.017-4.532-4.605-5.196z" data-color="1"></path>
                        <path fill="#C7DDE5" d="M118.92 87.962l.001 2.324 1.132-1.814-1.133-.51z" data-color="1"></path>
                        <path fill="#C7DDE5" d="M121.152 80.692l7.092-2.475 6.162-2.15 5.849-2.042 6.162-2.15 7.092-2.475V53.712l-.001-8.379-7.094 2.476-6.162 2.151-5.852 2.042-6.162 2.15-7.094 2.476.003 8.378.002 7.308.003 8.378z" data-color="1"></path>
                        <path opacity=".3" d="M70.938 113.852l-5.889 2.055-.001 6.897-.001 6.897-5.889 2.054-5.889 2.055v7.154l-.001 6.241v7.153l8.199-2.86 7.152-2.495 8.198-2.86.003-7.155.001-6.241.002-7.154.002-6.899.002-6.897-5.889 2.055z"></path>
                        <path opacity=".3" d="M150.546 133.207l-8.494 2.965-7.31 2.55-7.309 2.551-8.494 2.958.003 5.929.002 5.173.001 5.93 8.493-2.962 7.308-2.551 7.308-2.55 8.493-2.964v-11.1l-.001-5.929z"></path>
                        <path opacity=".3" d="M84.868 112.495l.005 8.402.005 7.298.005 6.931.005 7.298.006 8.401 6.342 2.213 5.532 1.93 6.342 2.212-.005-8.401-.003-7.298-.004-6.93-.004-7.298-.005-8.402-6.344-2.212-5.534-1.932-6.343-2.212z"></path>
                        <path opacity=".3" d="M120.05 88.47l-1.13 1.82-6.06 5.6-5.22 4.83-5.22 4.82-6.06 5.61-5-5.64-4.36-4.92-5-5.64 6.37-5.89 5.48-5.07 5.48-5.06 6.37-5.89 4.6 5.19 4.02 4.54 4.6 5.19 1.13.51z"></path>
                        <path opacity=".3" d="M121.152 80.692l7.092-2.475 6.162-2.15 5.849-2.042 6.162-2.15 7.092-2.475V53.712l-.001-8.379-7.094 2.476-6.162 2.151-5.852 2.042-6.162 2.15-7.094 2.476.003 8.378.002 7.308.003 8.378z"></path>
                        <path opacity=".1" d="M118.909 56.698l-.001-3.288-37.817-13.215-.001 3.29 37.819 13.213z"></path>
                        <path fill="#F15A29" d="M113.627 50.351c0 6.113-4.956 11.069-11.069 11.069s-11.069-4.956-11.069-11.069 4.956-11.069 11.069-11.069 11.069 4.956 11.069 11.069z" data-color="5"></path>
                        <path opacity=".38" d="M113.627 50.351c0 6.113-4.956 11.069-11.069 11.069s-11.069-4.956-11.069-11.069 4.956-11.069 11.069-11.069 11.069 4.956 11.069 11.069z"></path>
                        <path opacity=".1" d="M118.93 116.858l.003 7.944.002 6.93.003 7.944 7.578-2.637 6.582-2.297 6.251-2.181 6.584-2.299 7.578-2.644-.001-8.184V90.281l-5.699 1.988-5.698 1.988-6.852 3.488-6.273 5.226-5.505 6.523-4.553 7.364z"></path>
                        <path opacity=".1" d="M103.11 157.18l-6.342-2.212-5.532-1.93-6.342-2.213-3.839-1.336-.001 3.29 7.018 2.444 6.176 2.154 5.756 2.008 5.754 2.008 6.177 2.154 7.012 2.453-.001-3.289-5.51-1.928-4.81-1.679-5.516-1.924z"></path>
                        <path d="M102.558 34c-9.03 0-16.351 7.321-16.351 16.351s16.351 42.512 16.351 42.512 16.35-33.482 16.35-42.512c0-9.03-7.32-16.351-16.35-16.351zm0 23.723a7.372 7.372 0 1 1 0-14.745 7.374 7.374 0 0 1 0 14.745z" fill="#F15A29" data-color="5"></path>
                        <path d="M102.558 34v6.469c5.458 0 9.882 4.424 9.882 9.882 0 5.458-4.424 9.883-9.882 9.883v32.629s16.35-33.482 16.35-42.512c0-9.03-7.32-16.351-16.35-16.351z" opacity=".1"></path>
                        <path d="M92.676 50.351c0 5.458 4.425 9.883 9.883 9.883v-2.51a7.372 7.372 0 1 1 0-14.745V40.47c-5.458-.001-9.883 4.423-9.883 9.881z" opacity=".1"></path>
                        <path d="M109.931 50.351a7.374 7.374 0 0 0-7.373-7.373v14.745c4.072 0 7.373-3.3 7.373-7.372z" opacity=".1"></path>
                    </g>
                </svg><br><br>
                <h2>FIND US</h2><br>
                <p>NO.46, Jalan 6/3A, Bandar Baru Utara,KM 12, Jalan Ipoh,68100 Batu Caves,Kuala Lumpur.</p>
            </div>
        </div>
        <div class="square" id="contact2">
            <h2>GET IN TOUCH</h2>
            <form action="">
                <table>
                <tr><td><input type="text" name="firstname" placeholder="First Name"></td>
                <td><input type="text" name="lastname" placeholder="Last Name"></td></tr>
                <tr><td><input type="text" name="email" placeholder="Email"></td>
                <td><input type="text" name="phone" placeholder="Phone"></td></tr>
                <tr><td colspan='2'><input type="text" name="address" placeholder="Address"></td></tr>
                <tr><td colspan='2'><textarea rows="3" name="message" placeholder="Type your message here"></textarea></td></tr>
                <tr><td colspan='2' style="text-align:center"><input type="submit" value="Submit"></td></tr>
                </table>
            </form>
        </div>
    </div>
    <section>
    <section id="cover"></section>
    <section id="map"></section>
    </section>
    <section id="download">
        <div>
            <h1>Wanted To Become Our Customer?</h1><br><br>
            <p>Please download and fill up the<br>Application Form, then send it back to us!</p><br><br><br>
            <a href="https://docs.google.com/forms/d/e/1FAIpQLScSD8uSYPAqf1VAXpwYbnAIu3lVJ5c4gP7enYA4RxLKe_pjgQ/viewform" target="_blank">Go To Download Page</a>
        </div>
    </section>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD9IA45LvUjzQK5RwJHXBOy5U2dmk4pkzs&callback=initMap&v=weekly" async></script>
</body>
<!-- Footer -->
<?php include('footer.php'); ?>
</html>