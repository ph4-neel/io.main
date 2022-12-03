<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/Video.css') }}">
    <title>Document</title>
</head>

<body>

    @include('VideoSection.Nav-bar')

    <style>
        .responsive-iframe {
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            width: 100%;
            height: 100%;
        }

        .video {
            position: relative;
            overflow: hidden;
            width: 100%;
            padding-top: 56.25%;
        }
    </style>

    <div class="container">
        <div class="row py-4">
            <div class="col-md-9 col-sm-12">
                {{-- <video width="320" height="240" controls>
                    <source src="movie.mp4" type="video/mp4">
                    <source src="movie.ogg" type="video/ogg">
                    Your browser does not support the video tag.
                </video> --}}
                <div class="video">
                    <iframe class="responsive-iframe" src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe>

                </div>


                <div class="alert alert-primary" role="alert" >
                    <h5>Title Of The Section--interviwo</h5>
                </div>

            </div>
            <div class="col-md-3" style=" overflow: visible;">
                <div class="alert alert-primary" role="alert" style="width: 315px">
                    <h5>LeaderBoard</h5>
                </div>

                <div class="card text-center ">

                    <form action="" class="form-group">
                        <Textarea class="form-control" rows="16" cols="18" placeholder="here you can take your Note"></Textarea>
                    </form>

                </div>

                <div class="alert alert-primary" role="alert" style="width: 315px">
                    <h5>LeaderBoard</h5>
                </div>




            </div>
        </div>
        <div class="row py-4">
            <div class="col-md-8">



            </div>

            <div class="col-md-4">





            </div>
        </div>
    </div>

</body>

</html>
