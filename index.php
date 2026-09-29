<?php

include "koneksi.php";

$query = mysqli_query($koneksi, "SELECT * FROM tb_pap ORDER BY id_pap ASC");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SI RARA</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap"
        rel="stylesheet">


    <style>

        body {
            background: linear-gradient(135deg, #ffc0cb, #e8c7ff);
            font-family: 'Quicksand', sans-serif;
        }


        /* GAMBAR CARD */

        .card-img-top {
            height: 200px;
            object-fit: cover;
        }


        /* CARD */

        .card {
            border: none;
            border-radius: 15px;
            overflow: hidden;

            background-color: #fff5fa;

            box-shadow: 0 5px 15px rgba(214, 120, 160, 0.25);

            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }


        /* CARD BODY */

        .card-body {
            padding: 25px;
        }


        /* JUDUL */

        .card-title {
            color: #d63384;
            font-weight: bold;
        }


        /* DESKRIPSI */

        .card-text {
            color: #8f5b72;
        }


        /* BUTTON */

        .btn-primary {
            background-color: #ff69a6;
            border: none;
            border-radius: 10px;
        }

        .btn-primary:hover {
            background-color: #e95793;
        }


        /* ANIMASI EMOJI */

        .emoji-effect {
            position: fixed;

            font-size: 30px;

            pointer-events: none;

            animation: naik 1s ease-out forwards;

            z-index: 9999;
        }


        @keyframes naik {

            0% {
                transform: translateY(0) scale(0.5);
                opacity: 1;
            }

            50% {
                transform: translateY(-80px) scale(1.3);
                opacity: 1;
            }

            100% {
                transform: translateY(-180px) scale(1.8);
                opacity: 0;
            }

        }

    </style>

</head>


<body>


    <div class="container mt-5">


        <!-- JUDUL -->

        <h2 class="text-center mb-4">
            SI BADDIE + CUTIE???
        </h2>



        <!-- CARD DARI DATABASE -->

        <div class="row">

            <?php while ($data = mysqli_fetch_assoc($query)) { ?>

                <div class="col-md-4">

                    <div class="card my-2">


                        <!-- GAMBAR -->

                        <img src="pap/<?= $data['pap']; ?>"
                            class="card-img-top"
                            alt="Gambar Pap">



                        <div class="card-body">


                            <!-- JUDUL DARI DATABASE -->

                            <h5 class="card-title">

                                <?= $data['judul_pap']; ?>

                            </h5>



                            <!-- DESKRIPSI DARI DATABASE -->

                            <p class="card-text">

                                <?= $data['deskripsi_pap']; ?>

                            </p>



                            <!-- BUTTON -->

                            <div class="text-center">

                                <button type="button"
                                    class="btn btn-primary emoji-btn">

                                    😍😍😍

                                </button>

                            </div>


                        </div>

                    </div>

                </div>


            <?php } ?>

        </div>


    </div>



    <!-- JAVASCRIPT ANIMASI EMOJI -->

    <script>

        document.querySelectorAll('.emoji-btn').forEach(button => {


            button.addEventListener('click', function () {


                const card = this.closest('.card');

                const rect = card.getBoundingClientRect();


                const emojis = ['❤️', '😵‍💫', '🥳'];


                for (let i = 0; i < 12; i++) {


                    const emoji = document.createElement('div');


                    emoji.innerHTML =
                        emojis[Math.floor(Math.random() * emojis.length)];


                    emoji.classList.add('emoji-effect');



                    // Tentukan arah keluarnya emoji

                    const side = Math.floor(Math.random() * 3);



                    if (side === 0) {


                        // KIRI

                        emoji.style.left =
                            (rect.left + 20 +
                                Math.random() * (rect.width * 0.3)) + 'px';


                        emoji.style.top =
                            (rect.top + 30 +
                                Math.random() * (rect.height - 60)) + 'px';


                        emoji.style.setProperty(
                            '--x',
                            -(80 + Math.random() * 100) + 'px'
                        );


                        emoji.style.setProperty(
                            '--y',
                            (Math.random() * 60 - 30) + 'px'
                        );


                    }


                    else if (side === 1) {


                        // KANAN

                        emoji.style.left =
                            (rect.right - 20 -
                                Math.random() * (rect.width * 0.3)) + 'px';


                        emoji.style.top =
                            (rect.top + 30 +
                                Math.random() * (rect.height - 60)) + 'px';


                        emoji.style.setProperty(
                            '--x',
                            (80 + Math.random() * 100) + 'px'
                        );


                        emoji.style.setProperty(
                            '--y',
                            (Math.random() * 60 - 30) + 'px'
                        );


                    }


                    else {


                        // ATAS

                        emoji.style.left =
                            (rect.left + 30 +
                                Math.random() * (rect.width - 60)) + 'px';


                        emoji.style.top =
                            (rect.bottom - 30 -
                                Math.random() * (rect.height * 0.3)) + 'px';


                        emoji.style.setProperty(
                            '--x',
                            (Math.random() * 60 - 30) + 'px'
                        );


                        emoji.style.setProperty(
                            '--y',
                            -(80 + Math.random() * 100) + 'px'
                        );

                    }



                    emoji.style.animationDuration =
                        (0.8 + Math.random() * 0.4) + 's';



                    document.body.appendChild(emoji);



                    setTimeout(() => {

                        emoji.remove();

                    }, 1400);


                }

            });

        });

    </script>


</body>

</html>