<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="../asset/css/admin.css" />
    <link rel="stylesheet" href="../asset/css/color.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
</head>
<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

    :root {
        --bg-black-900: #f2f2fc;
        --bg-black-100: #fdf9ff;
        --bg-black-50: #e8dfec;
        --text-black-900: #302e4d;
        --text-black-700: #504e70;
    }

    body {
        line-height: 1.5;
        font-size: 16px;
        font-family: "Poppins", sans-serif;
    }

    * {
        margin: 0;
        padding: 0;
        outline: none;
        text-decoration: none;
        box-sizing: border-box;
    }

    ::before,
    ::after {
        box-sizing: border-box;
    }

    .dropdown-content {
        display: none;
    }

    .bodi {
        padding-top: 60px;
        display: flex;
        justify-content: end;
        align-items: end;
    }

    .box {
        position: fixed;
        width: 350px;
        height: 50px;
        display: flex;
        justify-content: end;
        cursor: pointer;
        padding: 10px 20px;
        background-color: white;
        border-radius: 30px;
        align-items: center;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
    }

    /* .box:hover input {
  width: 300px;
} */

    .box input {
        width: 300px;
        outline: none;
        border: none;
        font-weight: 500;
        transition: 0.8s;
        background: transparent;
    }

    .box a .uil {
        color: #1daf;
        font-size: 18px;
    }

    .section {
        background: var(--bg-black-900);
        min-height: 100vh;
        display: block;
        padding: 0 20px;
        opacity: 1;
    }

    .hidden {
        display: none !important;
    }

    .main-content {
        padding-left: 270px;
    }

    .padd-15 {
        padding-left: 15px;
        padding-right: 15px;
    }

    .container {
        max-width: 1100px;
        width: 100%;
        /* background: red; */
        margin: auto;
    }

    .search-box:hover .search-txt {
        width: 240px;
        padding: 0 6px;
    }

    .search-box:hover .search-btn {
        background: #fff;
    }

    .section .container {
        padding-bottom: 70px;
    }

    .section-title {
        flex: 0 0 100%;
        max-width: 100%;
        margin-bottom: 40px;
    }

    .section-title h2 {
        font-size: 40px;
        color: var(--text-black-900);
        font-weight: 700;
        position: relative;
    }

    .section-title h2::before {
        content: "";
        height: 4px;
        width: 50px;
        background-color: red;
        position: absolute;
        top: 100%;
        left: 0;
    }

    .section-title h2::after {
        content: "";
        height: 4px;
        width: 25px;
        background-color: red;
        position: absolute;
        top: 100%;
        left: 0;
        margin-top: 8px;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        margin-left: -15px;
        margin-right: -15px;
        position: relative;
    }

    /* aside */
    .aside {
        width: 270px;
        background: var(--bg-black-100);
        position: fixed;
        left: 0;
        top: 0;
        padding: 30px;
        height: 100%;
        border-right: 1px solid var(--bg-black-50);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 10;
    }

    .aside .logo {
        position: absolute;
        top: 50px;
        font-size: 30px;
        text-transform: capitalize;
    }

    .aside .logo a {
        color: var(--text-black-900);
        font-weight: 700;
        /* background: red; */
        padding: 15px 20px;
        font-size: 30px;
        letter-spacing: 5px;
        position: relative;
    }

    .aside .logo a span {
        font-family: "Clicker Script", cursive;
        font-size: 40px;
    }

    .aside .logo a::before {
        content: "";
        position: absolute;
        width: 20px;
        height: 20px;
        border-bottom: 5px solid red;
        border-left: 5px solid red;
        bottom: 0;
        left: 0;
    }

    .aside .logo a::after {
        content: "";
        position: absolute;
        width: 20px;
        height: 20px;
        border-top: 5px solid blue;
        border-right: 5px solid blue;
        top: 0;
        right: 0;
    }

    .aside .nav-toggler {
        height: 40px;
        width: 45px;
        border: 1px solid var(--bg-black-50);
        cursor: pointer;
        position: fixed;
        left: 300px;
        top: 20px;
        border-radius: 5px;
        background: var(--bg-black-100);
        display: none;
        align-items: center;
        justify-content: center;
    }

    .aside .nav-toggler span {
        height: 2px;
        width: 18px;
        background: var(--skin-color);
        display: inline-block;
        position: relative;
    }

    .aside .nav-toggler span::before {
        content: "";
        height: 2px;
        width: 18px;
        background: var(--skin-color);
        position: absolute;
        top: -6px;
        left: 0;
    }

    .aside .nav-toggler span::after {
        content: "";
        height: 2px;
        width: 18px;
        background: var(--skin-color);
        position: absolute;
        top: 6px;
        left: 0;
    }

    .aside .nav {
        margin-top: 50px;
    }

    .aside .nav li {
        margin-bottom: 20px;
        display: block;
    }

    .aside .nav li a {
        font-size: 16px;
        font-weight: 600;
        display: block;
        border-bottom: 1px solid var(--bg-black-50);
        color: black;
        padding: 5px 15px;
    }

    .aside .nav li a i span {
        padding-left: 10px;
    }

    .aside .nav li a.active {
        color: black;
    }

    .aside .nav li a i {
        margin-right: 15px;
    }

    /* home */
    .home {
        min-height: 100vh;
        display: flex;
        color: var(--text-black-900);
    }

    .home .home-info {
        flex: 0 0 60%;
        max-width: 60%;
    }

    h3.hello {
        font-size: 28px;
        margin: 15px 0;
    }

    h3.hello span {
        font-family: "Clicker Script", cursive;
        font-size: 30px;
        font-weight: 700;
        color: red;
    }

    h3.my-profession {
        font-size: 30px;
        margin: 15px 0;
    }

    .typing {
        color: var(--skin-color);
    }

    .home .home-img {
        flex: 0 0 40%;
        max-width: 40%;
        text-align: center;
        position: relative;
    }

    .home-img::after {
        content: "";
        position: absolute;
        height: 80px;
        width: 80px;
        border-bottom: 10px solid var(--skin-color);
        border-right: 10px solid darkblue;
        right: 10px;
        bottom: -30px;
    }

    .home-img::before {
        content: "";
        position: absolute;
        height: 80px;
        width: 80px;
        border-top: 10px solid var(--skin-color);
        border-left: 10px solid darkblue;
        left: 10px;
        top: -30px;
    }

    .home .home-img img {
        margin: auto;
        border-radius: 5px;
        height: 400px;
    }

    /* About */
    .about .about-content {
        flex: 0 0 100%;
        max-width: 100%;
    }

    .about .about-content .row {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .about .about-content .card {
        width: 400px;
        height: 200px;
        background: linear-gradient(135deg, #3ddad7, #135589);
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(8, 253, 8, 0.1);
        display: flex;
        justify-content: center;
        align-items: center;
        color: black;
        font-family: Arial, sans-serif;
        font-size: 20px;
        font-weight: bold;
        text-align: center;
        margin-right: 50px;
        margin-bottom: 50px;
        margin-left: 50px;
        transition: transform 0.3s ease-in-out;
    }

    .about .about-content .card i {
        padding-right: 10px;
        font-size: 30px;
    }

    .about .about-content .card:hover {
        transform: scale(1.2);
    }

    .about .container label {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 22px;
    }

    .about .container li {
        padding-left: 20px;
        margin-right: 10px;
    }

    .about .container .left-form {
        flex: 1;
    }

    .about .container .right-form {
        flex: 1;
    }

    #title {
        width: 500px;
        height: 50px;
    }

    #content {
        width: 500px;
        height: 120px;
    }

    #link {
        width: 500px;
        height: 50px;
    }

    #gambar {
        width: 150px;
        height: 50px;
    }

    button {
        font-size: 18px;
        width: 130px;
        height: 40px;
        background-color: #3ddad7;
        color: #fff;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #135589;
    }

    .about .container table {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .about .container th {
        width: 150px;
        height: 50px;
        border: 1px solid white;
    }

    .about .container table .name {
        background-color: #135589;
        text-align: center;
        font-size: 20px;
    }

    .about .container table .name .no {
        width: 80px;
    }

    .about .container table .isi {
        background-color: #3ddad7;
        font-size: 15px;
        font-weight: bold;
    }

    .about .container table .isi .no {
        text-align: center;
        background-color: #3ddad7;
        padding-left: 5px;
        padding-right: 5px;
    }

    .about .container table .isi .padding {
        padding-left: 10px;
        padding-right: 5px;
    }

    .about .container table .isi .waktu {
        text-align: center;

    }

    .about .container table .isi .title {
        background-color: aquamarine;
        padding-left: 5px;
        padding-right: 5px;
    }

    .about .container table .isi .gambar {
        text-align: center;
        padding-top: 5px;
    }

    .about .container table .isi .title-popular {
        width: 400px;
    }

    .about .container table .isi .uil {
        font-size: 30px;
        text-align: center;
    }

    .about .container .lihat {
        display: flex;
        justify-content: start;
        align-items: start;
    }

    @media (max-width: 1199px) {
        .aside {
            left: -270px;
        }

        .aside.open {
            left: 0;
        }

        .aside .nav-toggler {
            display: flex;
            left: 30px;
        }

        .aside .nav-toggler.open {
            left: 300px;
        }

        .section {
            left: 0;
        }

        .section.open {
            left: 270px;
        }

        .main-content {
            padding-left: 0;
        }

        .about .about-content .personal-info .info-item p span {
            display: block;
            margin-left: 0;
        }
    }

    @media (max-width: 991px) {

        .contact .contact-info-item,
        .idols .idols-item,
        .hobby .hobby-item {
            flex: 0 0 50%;
            max-width: 50%;
        }

        .home .home-info {
            flex: 0 0 100%;
            max-width: 100%;
        }

        .home .home-img {
            display: none;
        }
    }

    @media (max-width: 767px) {

        .contact .contact-form .col-6,
        .contact .contact-info-item,
        .idols .idols-item,
        .hobby .hobby-item,
        .about .about-content .skills,
        .about .about-content .personal-info {
            flex: 0 0 100%;
            max-width: 100%;
        }

        ul .uil {
            display: block;
            font-size: 18px;
        }

        ul .uil {
            top: -90px;
            left: -55px;
            cursor: pointer;
        }

        #title,
        #content,
        #link {
            width: 325px;
        }
    }
</style>

<body>