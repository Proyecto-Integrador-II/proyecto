<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../includes/scripts.php' ?>
    <title>Reseña Vendedor</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            height: 100vh;
            display: flex;
            fLex-direction: column;
            justify-content: center;
            aLign-items: center;
            
            font-famiLy: Arial, Helvetica, sans-serif;
            background: linear-gradient(45deg, purple, blue);

        }
        .rating_heading{
            color: white;
            animation: scale-up 1s ease;
        }

        @keyframes scale-up {
            0%{
                opacity: 0;
                transform: scale(.5);
            }
            100%{
                opacity: 1;
                transform: scale(1);
            }
        }

        .star_rating {
            user-select: none;
            background-color: white;
            padding: 1.4rem 2.5rem;
            margin: 2rem;
            border-radius: .4rem;
            text-aLign: center;
            animation: scale-up 1s ease;
        }

        @keyframes sLide-up {
            0%{
                opacity: 0;
                transform: translateY(50px);
            }
            100%{
                opacity: 1;
                transform: translateY(0px);
            }
        }

        .star {
            font-size: 3rem;
            color: #ff9800;
            background-color: unset;
            border:none;
        }


        .star:hover {
            cursor: pointer
        }
    </style>
</head>
<body>
    <?php 
		include '../includes/header.php';
		if(empty($_SESSION['active']) || ($_SESSION['user'] !=3))
		{
			header('Location: ../todos/logout.php');
		}  
	?>
    <h1 class="rating_heading">Calificación de 5 estrellas</h1>
    <div class="star_rating">
        <p> Cual es tu experiencia con este vendedor?</p>
        <button class="star">&#9734;</button>
        <button class="star">&#9734;</button>
        <button class="star">&#9734;</button>
        <button class="star">&#9734;</button>
        <button class="star">&#9734;</button>
        <p class="current_rating">Califica de 1 a 5 estrellas</p>
    </div>
    <script>
        const allStars = document.querySelectorAll('.star');
        let current_rating = document.querySelector('.current_rating')
        allStars.forEach((star, i)=>{
            star.onclick = function(){
                let current_star_level = i + 1;
                current_rating.innerText = `${current_star_level} de 5 estrellas`;
                allStars.forEach((star, j)=> {
                    if( current_star_level >= j+1) {
                        star.innerHTML = '&#9733';
                    }else{
                        star.innerHTML = '&#9734';
                    }
                })
            }
        })
    </script>
</body>
</html>