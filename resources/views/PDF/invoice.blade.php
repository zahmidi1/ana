<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title></title>

    <!-- Favicon -->
    <link rel="icon" href="./images/favicon.png" type="image/x-icon" />

    <!-- Invoice styling -->
    <style>
        /* reset */

        * {
            border: 0;
            box-sizing: content-box;
            color: inherit;
            font-family: inherit;
            font-size: inherit;
            font-style: inherit;
            font-weight: inherit;
            line-height: inherit;
            list-style: none;
            margin: 0;
            padding: 0;
            text-decoration: none;
            vertical-align: top;
        }

        /* content editable */

        *[] {
            border-radius: 0.25em;
            min-width: 1em;
            outline: 0;
        }

        *[] {
            cursor: pointer;
        }

        *[]:hover,
        *[]:focus,
        td:hover *[],
        td:focus *[] .hover {
            background: #DEF;
            box-shadow: 0 0 1em 0.5em #DEF;
        }

        span[] {
            display: inline-block;
        }

        /* heading */

        h1 {
            font: bold 100% sans-serif;
            letter-spacing: 0.5em;
            text-align: center;
            text-transform: uppercase;
        }

        /* table */

        table {
            font-size: 75%;
            table-layout: fixed;
            width: 100%;
        }

        table {
            border-collapse: separate;
            border-spacing: 2px;
        }

        th,
        td {
            border-width: 1px;
            padding: 0.5em;
            position: relative;
            text-align: left;
        }

        th,
        td {
            border-radius: 0.25em;
            border-style: solid;
        }

        th {
            background: #EEE;
            border-color: #BBB;
        }

        td {
            border-color: #DDD;
        }

        /* page */

        html {
            font: 16px/1 'Open Sans', sans-serif;
            overflow: auto;
            padding: 0.5in;
        }

        html {
            background: #999;
            cursor: default;
        }

        body {
            box-sizing: border-box;
            height: 11in;
            margin: 0 auto;
            overflow: hidden;
            padding: 0.5in;
            width: 8.5in;
        }

        body {
            background: #FFF;
            border-radius: 1px;
            box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
        }

        /* header */

        header {
            margin: 0 0 3em;
        }

        header:after {
            clear: both;
            content: "";
            display: table;
        }

        header h1 {
            background: #000;
            border-radius: 0.25em;
            color: #FFF;
            margin: 0 0 1em;
            padding: 0.5em 0;
        }

        header address {
            float: left;
            font-size: 75%;
            font-style: normal;
            line-height: 1.25;
            margin: 0 1em 1em 0;
        }

        header address p {
            margin: 0 0 0.25em;
        }

        header span {
            display: block;
            float: right;
        }

        header span {
            margin: 0 0 1em 1em;
            max-height: 25%;
            max-width: 60%;
            position: relative;
        }



        header input {
            cursor: pointer;
            -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
            height: 100%;
            left: 0;
            opacity: 0;
            position: absolute;
            top: 0;
            width: 100%;
        }

        /* article */

        article,
        article address,
        table.meta,
        table.inventory {
            margin: 0 0 3em;
        }

        article:after {
            clear: both;
            content: "";
            display: table;
        }

        article h1 {
            clip: rect(0 0 0 0);
            position: absolute;
        }

        article address {
            float: left;
            font-size: 125%;
            font-weight: bold;
        }

        /* table meta & balance */

        table.meta,
        table.balance {
            float: right;
            width: 36%;
        }

        table.meta:after,
        table.balance:after {
            clear: both;
            content: "";
            display: table;
        }

        /* table meta */

        table.meta th {
            width: 40%;
        }

        table.meta td {
            width: 60%;
        }

        /* table items */

        table.inventory {
            clear: both;
            width: 100%;
        }

        table.inventory th {
            font-weight: bold;
            text-align: center;
        }

        table.inventory td:nth-child(1) {
            width: 26%;
        }

        table.inventory td:nth-child(2) {
            width: 38%;
        }

        table.inventory td:nth-child(3) {
            text-align: right;
            width: 12%;
        }

        table.inventory td:nth-child(4) {
            text-align: right;
            width: 12%;
        }

        table.inventory td:nth-child(5) {
            text-align: right;
            width: 12%;
        }

        /* table balance */

        table.balance th,
        table.balance td {
            width: 50%;
        }

        table.balance td {
            text-align: right;
        }

        /* aside */

        aside h1 {
            border: none;
            border-width: 0 0 1px;
            margin: 0 0 1em;
        }

        aside h1 {
            border-color: #999;
            border-bottom-style: solid;
        }

        /* javascript */


        tr:hover {
            opacity: 1;
        }

        @media print {
            * {
                -webkit-print-color-adjust: exact;
            }

            html {
                background: none;
                padding: 0;
            }

            body {
                box-shadow: none;
                margin: 0;
            }

            span:empty {
                display: none;
            }


        }

        @page {
            margin: 0;
        }

        img {
            width: 80px;
            height: 80px;
            margin-left: 54%;
        }

        .img {
            width: 100%;
        }
    </style>
</head>




<body>

    <header>
        <h1>Facture de paiement</h1>
        <address>
            <p></p>
            <p>had gharbiya MDR ain haloufa<br>Assilah, Zip code 90302</p>
            <p>(+212) 618-181155</p>
        </address>
        <div class="img">
            <img class="" src="{{ asset('images/logo.png') }}" alt="logo">
        </div>
    </header>



    <article>

        <address>
            <p>cooperative <br>Annassim al akhdar</p>
        </address>
        <table class="meta">
            <tr>
                <th><span>Invoice #</span></th>
                <td><span>00{{ $affich['invoice']->id }}</span></td>
            </tr>
            <tr>
                <th><span>client</span></th>
                <td><span>{{ $affich['invoice']->nameCLI }}</span></td>
            </tr>
            <tr>
                <th><span>Date</span></th>
                <td><span>{{ $affich['invoice']->date_payment }}</span></td>
            </tr>


            <tr>
                <th><span>Le montant payé</span></th>
                <td><span>{{ $affich['invoice']->total }}</span><span> MAD</span></td>
            </tr>
        </table>
        <table class="inventory">
            <thead>
                <tr>
                    <th><span>date</span></th>
                    <th><span>N de client</span></th>
                    <th><span>period</span></th>
                    <th><span>heat</span></th>
                    <th><span>density</span></th>
                    <th><span>quantity</span></th>
                </tr>
            </thead>
            <tbody>



                @foreach ($affich['milk_reception'] as $reception)
                    <tr>
                        <td>{{ $reception->created_at }}</td>
                        <td><span>00{{ $reception->id_client }}</span></td>

                        <td><span>{{ $reception->period }}</span></td>
                        <td><span>{{ $reception->heat }}Cº</span></td>
                        <td>{{ $reception->density }}</td>
                        <td><span>{{ $reception->quantity }}</span><span>L</span></td>

                    </tr>
                @endforeach
            </tbody>
        </table>

        <table class="balance">
            <tr>
                <th><span>Total</span></th>
                <td><span>{{ $affich['invoice']->qantiter }}</span><span> L</span></td>
            </tr>
            <tr>
                <th><span>prix /L</span></th>
                <td><span>{{ $affich['invoice']->prix }}</span><span> MAD</span></td>
            </tr>
            <tr>
                <th><span>Le montant payé</span></th>
                <td><span>{{ $affich['invoice']->total }}</span><span> MAD</span></td>
            </tr>
        </table>
    </article>
    <aside>
        <h1><span>Notes complémentaires</span></h1>
        <div>
            <p>---.</p>
        </div>
    </aside>
</body>

<script></script>

</html>
