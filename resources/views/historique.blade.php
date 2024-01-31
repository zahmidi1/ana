@extends('layouts.app')


@section('namePage')
    receptions de lait
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
    <li><a href="{{ route('milk_reception') }}" class="ai-icon" aria-expanded="false">
            <i class="flaticon-017-clipboard"></i>
            <span class="nav-text">receptions de lait </span>
        </a>
    </li>
    <li class="mm-active"><a href="/historique" class="ai-icon" aria-expanded="false">
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
    <div class="container-fluid">
        <div class="row page-titles">

            <div class="row">
                <form method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-sm-4">
                        <label>Select date </label>
                        <input class="form-select" type="date" id="datedebu">

                    </div>
                    <div class="col-sm-4">

                        <label>Select date </label>
                        <input class="form-select" type="date" id="datefin">

                    </div>
                    <div class="col-sm-4">
                        <!-- Button ajouter lait include et modal -->
                        <a href="javascript:void(0);" id="filter" class="btn btn-outline-primary mb-3"><i
                                class="fa fa-calendar me-3 scale3"></i>Filter Date</a>
                    </div>
                </form>
            </div>


        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="table-responsive fs-14">
                    <table class="table card-table display mb-4 dataTablesCard " id="example5">
                        <thead>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="checkAll">
                                        <label class="form-check-label" for="checkAll">
                                        </label>
                                    </div>
                                </th>
                                <th>ID Invoice</th>

                                <th> Nome et id client</th>

                                <th>prix</th>
                                <th>qantiter</th>
                                <th>total </th>
                                <th>date payment</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="histo">


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('secript')
    <script>
        $('#filter').click(function() {

            var dated = $('#datedebu').val();
            var datefin = $('#datefin').val();

            $.ajax({
                url: '/historique',
                method: 'post',
                data: {
                    date_d: dated,
                    date_f: datefin,
                    "_token": "{{ csrf_token() }}"
                },

                success: function(data) {
                    $('#histo').html(data.html);
                    console.log(data);
                }
            })
        })
    </script>
@endsection
