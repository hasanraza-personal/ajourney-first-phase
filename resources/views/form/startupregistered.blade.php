<?php
    function time_elapsed_string($posttime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($posttime);
        $diff = $now->diff($ago);
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v){
            if ($diff->$k){
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            }else{
                unset($string[$k]);
            }
        }
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Startups - Register your Startup at Ajourney. - Ajourney.in">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('web-images/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('web-images/favicon-32x32.png') }}">
    <link rel="manifest" href="{{ url('web-images/site.webmanifest') }}">
    <meta name="theme-color" content="#5b00ff">
    <meta name="msapplication-navbutton-color" content="#5b00ff">
    <meta name="apple-mobile-web-app-status-bar-style" content="#5b00ff">
    <meta name="msapplication-navbutton-color" content="#5b00ff">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="translucent-black">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" integrity="sha512-xnP2tOaCJnzp2d2IqKFcxuOiVCbuessxM6wuiolT9eeEJCyy0Vhcwa4zQvdrZNVqlqaxXhHqsSV1Ww7T2jSCUQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ url('css/google-fonts.css') }}" >
    <link rel="stylesheet" href="{{ url('css/form/startupregistered.css') }}" >

    <title>Ajourney • Register Startup</title>
</head>
<body>
    {{-- Navbar --}}
    <header class="header">
        <a href="/" class="header__logo">
            <img src="{{url('/logo/logo_compressed.png')}}" alt="Logo" class="brand-logo">
            <span class="brand-name">Ajourney</span>
        </a>
    </header>
    {{-- Navbar --}}
    <div class="container-fluid col-md-8">
        <table class="table table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Sr. No</th>
                    <th scope="col">Startup Name</th>
                    <th scope="col">Time</th>
                    <th scope="col">Action</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $count = 1;?>
                @foreach($startups as $startup)
                    <tr>
                        <th scope="row">{{$count}}</th>
                        <td>{{$startup->registered_startupname}}</td>
                        <td>{{time_elapsed_string($startup->registered_startuptime)}}</td>
                        <td class="action-td">
                            @if($startup->startup_action == 'pending')
                                <a href="jhdjkzmxcbhsjdzdgfhzdrgfv/{{$startup->registered_startupsrno}}">
                                    View
                                </a>
                            @elseif($startup->startup_action == 'uploaded')
                                {{-- <a href="{{ url('startup/sdhfnddfgudhbjdzhfxzhfb') }}">
                                    Update
                                </a> --}}
                                <a href="javascript:void(0)" onclick="changeUploaded('../../startup/sdhfnddfgudhbjdzhfxzhfb')">Update</a>
                            @else
                                {{-- <a href="jhdjkzmxcbhsjdzdgfhzdrgfv/{{$startup->registered_startupsrno}}">
                                    Deleted
                                </a> --}}
                                <span style="font-weight:bold; color:red;">Deleted</span>
                            @endif
                        </td>
                        <td>
                            @if($startup->startup_action == 'pending')
                                <button type="button" class="btn btn-warning btn-sm">Pending</button>
                            @elseif($startup->startup_action == 'uploaded')
                                <button type="button" id="upload1" class="btn btn-success btn-sm" onclick="changeUploaded('jhdjkzmxcbhsjdzdgfhzdrgfv/{{$startup->registered_startupsrno}}')">Uploaded</button>
                            @else
                                <button type="button" class="btn btn-danger btn-sm" onclick="changeUploaded('jhdjkzmxcbhsjdzdgfhzdrgfv/{{$startup->registered_startupsrno}}')">Deleted</button>
                            @endif
                        </td>
                    <?php $count++; ?>
                @endforeach
            </tbody>
          </table>
    </div>
    @include('footer')
    @include('form.formmodal')

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="{{ url('jquery/form/startupform.js') }}"></script>

    <script type="text/javascript">
        function changeUploaded(link){
            current_link = link;
            $('#passwordModal').modal('show');
        }

        function submitPassword(){
            var pass = $('#password').val();
            if(pass=='allowaccess'){
            	 $('#passwordModal').modal('hide');
                window.location.href = current_link;
            }
        }

        $('#showpassword').click(function(){
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        });
    </script>
</body>
</html>
