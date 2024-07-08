<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
    <style>
        .half-bg {
          height: 100vh;
        }
        .left-half {
          background-color: rgba(232, 123, 47, 0.4);
        }
        .right-half {
          background-color: #ffffff; /* Warna merah */
        }
        #background{
            position: absolute;
            z-index: 0;
        }
        #content{
            position: absolute;
            width: 99vw;
            z-index: 1;
        }
        #rowLogo{
            height: 10vh;
        }
        /* #rowContent{
            height: 90vh;
        } */
        #logo{
            height: 50px;

            margin-left: -100px;
            margin-top: 30px;
        }
        .left-content{
          flex-direction: column;  
          padding-right: 15vw;
        }
        .right-content{
            margin-left: -100px;
        }
        #kata-login{
            font-size:70px;
        }
        #kata-desc{
            font-size: 20px;
            width: 25vw;
        }
        .boxLogin{
            background-color: rgba(232, 123, 47, 1);
            height: 80vh;
            /* width: 30vw; */
            border-radius: 30px;
            padding: 50px;
            flex-direction: column;
            display: flex;
            justify-content: space-around;
        }
        .custom-input {
            background-color: orange; /* Warna textfield */
            color: white; /* Warna teks */
            width: 200px; /* Lebar textfield diperkecil */
          }
          .custom-input::placeholder {
            color: blue; /* Warna placeholder */
          }
          .input-group-text {
            background-color: orange; /* Warna textfield bagian ikon */
            color: white; /* Warna ikon */
          }
          .form-row{
            width: 25vw;
          }
          .form-control{
            border-top-right-radius: 15px;
            border-bottom-right-radius: 15px;
          }
        #basic-addon1-profile{
            border-top-left-radius: 15px;
            border-bottom-left-radius: 15px;
        }
        #basic-addon1-lock{
            border-top-left-radius: 15px;
            border-bottom-left-radius: 15px;
        }

        #basic-addon1-eye{
            border-top-right-radius: 15px;
            border-bottom-right-radius: 15px;
        }
        .input-group-text {
            height: 100%;
            border-radius: 0px;
            background-color: #ffd998;
            color: #ffffffcf;
            border-right: 0px;
            border: 0px; 
        }

        .input-group .input-group-prepend .input-group-text {
            background-color: #ffd998;
            color: #ffffffcf;
            border-right: 0px;
            border: 0px; 
        }
        .input-group .form-control {
            background-color: #ffd998;
            color: #FFF;
            border-left: 0px;
            border: 0px; 
        }

        .input-group .form-control:focus {
            border: 0px;
        }

        #btn-login{
            width: 8vw;
            border-radius: 20px;
            /* height: 4vh; */
            background-color: white;
            color: rgba(232, 123, 47, 1);
            font-weight: bold;
        }

        .btn-login{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .belum-akun{
            display: flex;
            align-items: center;
            justify-content: center;
        }
      </style>
</head>
<body>
        <div id="background" class="container-fluid">
            <div class="row no-gutters">
              <div class="col-md-8 half-bg left-half d-flex align-items-center justify-content-center">
                <div class="content text-white">
                  <!-- <h1>Bagian Kiri</h1>
                  <p>Konten di atas background biru</p> -->
                </div>
              </div>
              <div class="col-md-4 half-bg right-half d-flex align-items-center justify-content-center">
                <div class="content text-white">
                  <!-- <h1>Bagian Kanan</h1>
                  <p>Konten di atas background merah</p> -->
                </div>
              </div>
            </div>
        </div>
    
        <div id="content">
            <div id="rowLogo" class="row">
                <div class="col-1">
                </div>
                <div id="logo" class="col-2">
                   <img src="..\images\loading-page\CariAdil.png" alt="">
                </div>
                <div class="col-9">
                </div>
            </div>
            <div id="rowContent" class="row">
                <div class="col-2">

                </div>
                <div class="col-4 half-content left-content d-flex align-items-start justify-content-center">
                    <div class="container-fluid d-grid gap-2">
                        <div class="row">
                            <div class="col-12">
                                <h1 id="kata-login">
                                    Login ke CariAdil
                                </h1>
                            </div>
                        </div>
                        <div class="box">

                        </div>
                        <div class="row">
                            <div class="col-12">
                                <p id="kata-desc">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Debitis, ipsum! Numquam maxime explicabo veniam, iusto quidem dolor porro vero voluptate.</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="col-6 half-content right-content d-flex align-items-start justify-content-center text-light">
                    <div class="boxLogin">
                        <div>
                            <div>
                                <h1>Masuk</h1>
                            </div>
                            &nbsp;
                            <form>
                                <div class="form-row" id="row-username">
                                    <label for="">Username</label>
                                        <div class="input-group mb-3">
                                         <div class="input-group-prepend">
                                           <span class="input-group-text" id="basic-addon1-profile"><i class="far fa-user"></i>
                                           </span>
                                         </div>
                                         <input type="text" class="form-control" placeholder="Enter Username" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                               </div>
                               
                                <div class="form-row">
                                    <label for="">Password</label>
                                        <div class="input-group mb-3">
                                         <div class="input-group-prepend">
                                           <span class="input-group-text" id="basic-addon1-lock">
                                               <i class="fas fa-lock"></i>
                                           </span>
                                         </div>
                                         <input type="text" class="form-control" placeholder="Enter Password" aria-label="Username" aria-describedby="basic-addon1">
                                         <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1-eye">
                                                <i class="fa fa-eye"></i>
                                            </span>
                                          </div>
                                    </div>
                               </div>
                                
                              </form>
                            <a href="">
                                <p>
                                    Forgot your password?
                                </p>
                            </a>
                        </div>
                        
                        <div>
                            <div class="btn-login">
                                <button
                                type="button"
                                class="btn btn-primary"
                                id="btn-login"
                            >
                                Login
                            </button>
                            </div>
                            &nbsp;
                            <div class="belum-akun">
                                <p>Belum punya akun? <a href="">Daftar disini</a></p>
     
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
</body>
</html>