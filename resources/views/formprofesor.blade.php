<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
    <style>
        *{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: 'Quicksand', sans-serif;
}

body{
    height: 90%;
    width: 100%;
    background: #007bff;
  background: linear-gradient(to right, #0062E6, #33AEFF);
}
.header {
    padding: 60px;
    text-align: center;
    background: #1abc9c;
    color: white;
    font-size: 30px;
  }

.container{
    position: relative;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px 100px;
}

.container:after{
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    left: 0;
    top: 0;
    background: url("/img/perfilP.svg") no-repeat center;
    background-size: cover;
    filter: blur(50px);
    z-index: -1;
}
.contact-box{
    max-width: 850px;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    justify-content: center;
    align-items: center;
    text-align: center;
    background-color: #fff;
    box-shadow: 0px 0px 19px 5px rgba(0,0,0,0.19);
}

.left{
    background: url("/img/perfilP.svg") no-repeat center;
    background-size: contain;
    height: 100%;
    
}

.right{
    padding: 15% 5%;
}

h2{
    position: relative;
    padding: 0 0 10px;
    margin-bottom: 10px;
}

h2:after{
    content: '';
    position: absolute;
    left: 50%;
    bottom: 0;
    transform: translateX(-50%);
    height: 4px;
    width: 50px;
    border-radius: 2px;
    background-color: #07c2a3;
}

.field{
    width: 100%;
    border: 2px solid rgba(0, 0, 0, 0);
    outline: none;
    background-color: rgba(230, 230, 230, 0.6);
    padding: 0.5rem 1rem;
    font-size: 1.1rem;
    margin-bottom: 22px;
    transition: .3s;
    border-radius: 1rem;
}

.field:hover{
    background-color: rgba(0, 0, 0, 0.1);
}

textarea{
    min-height: 150px;
}

.btn{
    display: block;
    width: 100%;
    height: 50px;
    border-radius: 25px;
    outline: none;
    border: none;
    background-image: linear-gradient(to right, #07c2a3, #1c73ad, #18d8c8);
    background-size: 200%;
    font-size: 1.2rem;
    color: #fff;
    font-family: 'Poppins', sans-serif;
    text-transform: none;
    margin: 1rem 0;
    cursor: pointer;
    transition: .5s;
}

.btn:hover{
    background-position: right;
    background-color: #07c2a3;
}

.field:focus{
    border: 2px solid #07c2a3;
    background-color: #fff;
}

@media screen and (max-width: 880px){
    .contact-box{
        grid-template-columns: 1fr;
    }
    .left{
        height: 200px;
    }
}
    </style>
    <link rel="stylesheet" type="text/css" href="styleP.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
    
</head>

    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand " href="#">
          <img src="/img/logoPlayRoundH.png" width="250" height="90" class="d-inline-block align-top" alt="">
        </a>
      </nav>
 
<body>
    <div class="container">
        <div class="contact-box">
            <div class="left"></div>
            <div class="right">
                <form method="post" action="{{route('saveStudent')}}" enctype="multipart/form-data">
                {{csrf_field()}}
                @if (isset($token))
                 <input type="hidden" name="token" value="{{$token}}">
                 @endif
                <h2>Completa tu registro</h2>
                <input type="text" class="field " placeholder="Grado Academico">
                <input type="text" class="field" placeholder="Cargo">
                <button type="submit" class="btn">Continuar</button>
                 </form>
            </div>
        </div>
    </div>
</body>
</html>


