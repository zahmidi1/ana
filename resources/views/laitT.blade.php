@extends('layouts.app')


@section('namePage')
    dashboard
@endsection


@section('nav')
    <li ><a href="/dashboard" class="ai-icon  mm-active" aria-expanded="false">
            <i class="flaticon-025-dashboard"></i>
            <span class="nav-text">Dashboard</span>
        </a>
    </li>

    <li ><a href="/client" class="ai-icon" aria-expanded="false">
            <i class="flaticon-044-menu"></i>
            <span class="nav-text">Client</span>
        </a>
    </li>
    <li class="mm-active"><a href="{{ route('milk_reception') }}" class="ai-icon" aria-expanded="false">
            <i class="flaticon-017-clipboard"></i>
            <span class="nav-text">receptions de lait </span>
        </a>
    </li>
    <li ><a href="/historique" class="ai-icon" aria-expanded="false">
            <i class="flaticon-022-copy"></i>
            <span class="nav-text">factur</span>
        </a>
    </li>
    <!--<li><a href="historique" class="ai-icon" aria-expanded="false">
            <i class="flaticon-022-copy"></i>
            <span class="nav-text">Salarié</span>
        </a>
    </li>
    <li><a href="widget-basic.html" class="ai-icon" aria-expanded="false">
            <i class="flaticon-013-checkmark"></i>
            <span class="nav-text">Partenaire</span>
        </a>
    </li>
    <li><a href="widget-basic.html" class="ai-icon" aria-expanded="false">
            <i class="fa fa-user"></i>
            <span class="nav-text">Administration</span>
        </a>
    </li>
    <li><a href="widget-basic.html" class="ai-icon" aria-expanded="false">
            <i class="fa fa-paper-plane"></i>
            <span class="nav-text">Email</span>
        </a>
    </li>
    <li><a href="widget-basic.html" class="ai-icon" aria-expanded="false">
            <i class="fa fa-desktop" aria-hidden="true"></i>
            <span class="nav-text">Site Web</span>
        </a>
    </li>-->
@endsection


@section('content')
    <div class="row page-titles">

        <div class="row">
            <div class="col-sm">

                <form id="profile-form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label>Select date </label>
                    <input class="form-select" type="date" name="selecttheme" id="selecttheme">
                </form>

            </div>
            <div class="col-sm-7">


            </div>
            <div class="col-sm">
                <!-- Button ajouter lait include et modal -->
                <x-ajouter-lait :clients="$clients" />
            </div>
        </div>


    </div>



    <div class="table-responsive">
        <table class="table table-sm mb-0">
            <thead>
                <tr>
                    <th class="align-middle">ID</th>
                    <th class="align-middle">Date</th>

                    <th class="align-middle">period</th>
                    <th class="align-middle">N clients</th>
                    <th class="align-middle">Qontity</th>
                    <th class="align-middle">total</th>

                </tr>
            </thead>
            <tbody id="lait">


            </tbody>
        </table>

    </div>
@endsection

@section('secript')
    <script type="text/javascript">
        $('#selecttheme').change(function() {
            var date = $('#selecttheme').val();
            $.ajax({
                url: '/afficherTotalLait',
                method: 'post',
                data: {
                    date_t: date,
                    "_token": "{{ csrf_token() }}"
                },
                success: function(data) {
                    $('#lait').html(data.html);
                }
            })
        });


        $('#rest').click(function() {
            swal({
                title: "Are you sure?",
                text: "!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willReset) => {

                if (willReset) {


                    $.ajax({
                        url: '/rest',
                        method: 'post',
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                    })
                    swal("Poof! Your imaginary file has been Reset!LL", {
                        icon: "success",

                    });

                } else {
                    swal("Your imaginary file is safe!");
                }
            });
        });
    </script>
@endsection
