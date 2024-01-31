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

    <li  class="mm-active"><a href="/client" class="ai-icon" aria-expanded="false">
            <i class="flaticon-044-menu"></i>
            <span class="nav-text">Client</span>
        </a>
    </li>
    <li><a href="{{ route('milk_reception') }}" class="ai-icon" aria-expanded="false">
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
    <div class="container-fluid">
        <div class="d-flex mb-3">
            <div class="mb-3 align-items-center me-auto">
                <h4 class="card-title">Payment History</h4>
                <span class="fs-12">Lorem ipsum dolor sit amet, consectetur</span>
            </div>
            <a href="javascript:void(0);" class="btn btn-outline-primary mb-3"><i
                    class="fa fa-calendar me-3 scale3"></i>Filter Date</a>
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
                        <tbody>
                            @foreach ($historique as $reception)
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault2">
                                            <label class="form-check-label" for="flexCheckDefault2">
                                            </label>
                                        </div>
                                    </td>


                                    <td>
                                        <a href="{{ url('/client/historique/invoive/afficher/' . $reception->id . '/' . $reception->id_client . '/' . $reception->date_payment) }}"
                                            target="_blank"><span class="font-w500">#00{{ $reception->id }}</span>
                                        </a>

                                    </td>


                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <h6 class="fs-16 text-black font-w600 mb-0 text-nowrap">
                                                    {{ $reception->nameCLI }}</h6>
                                                <span class="fs-14">00{{ $reception->id_client }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="text-black">{{ $reception->prix }}</span></td>
                                    <td><span class="text-black">{{ $reception->qantiter }} </span></td>
                                    <td><span class="text-black">{{ $reception->total }} </span></td>

                                    <td><span class="text-black text-nowrap">{{ $reception->date_payment }}</span></td>

                                    <td>


                                        <a
                                            href="{{ url('/client/historique/invoive/afficher/' . $reception->id . '/' . $reception->id_client . '/' . $reception->date_payment) . '/generate' }}">
                                            <svg width="20px" height="20px" viewBox="0 0 24 24"
                                                id="meteor-icon-kit__solid-download" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">

                                                <g id="SVGRepo_bgCarrier" stroke-width="0" />

                                                <g id="SVGRepo_iconCarrier">

                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M10.5 12.8787V1.5C10.5 0.671573 11.1716 0 12 0C12.8284 0 13.5 0.671573 13.5 1.5V12.8787L16.9393 9.43934C17.5251 8.85355 18.4749 8.85355 19.0607 9.43934C19.6464 10.0251 19.6464 10.9749 19.0607 11.5607L13.0607 17.5607C12.4749 18.1464 11.5251 18.1464 10.9393 17.5607L4.93934 11.5607C4.35355 10.9749 4.35355 10.0251 4.93934 9.43934C5.52513 8.85355 6.47487 8.85355 7.06066 9.43934L10.5 12.8787ZM21 21V17.5C21 16.6716 21.6716 16 22.5 16C23.3284 16 24 16.6716 24 17.5V22.5C24 23.3284 23.3284 24 22.5 24H1.5C0.671573 24 0 23.3284 0 22.5V17.5C0 16.6716 0.671573 16 1.5 16C2.32843 16 3 16.6716 3 17.5V21H21Z"
                                                        fill="#7a8c9f" />

                                                </g>

                                            </svg></a>

                                    </td>



                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('secript')
@endsection
