@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{asset('Css/details.css')}}">


<div id="moa">
    <div class="container my-3">
        <h1 class="text-uppercase text-bg-primary text-center">Les clients récouvrés</h1>
    </div>
    <button class="btn btn-primary" onclick="retourPagePrecedente()">Retour</button>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered" id="myTable">
                <thead class="text-uppercase">
                    <tr>
                        <th>Ligne</th>
                        <th>id_Client</th>
                        <th>Libellé</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>N° facture</th>
                        <th>Débit</th>
                        <th>Crédit</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $donnee)
                        @php
                            $amount = $donnee->Ec_Montant;
                            $format = number_format($amount, 0, ' ', ' ');
                        @endphp
                        <tr  data-ct-num="{{ $donnee->CT_Num }}" class="text-center">
                            <td>{{ $donnee->ligne }}</td>
                            <td>{{ $donnee->idClient }}</td>
                            <td>{{ $donnee->libelle }}</td>
                            <td>{{ !empty($donnee->CT_EMail) ? $donnee->CT_EMail : 'emailClient@gmail.com' }}</td>
                            <td>{{ $donnee->telephone }}</td>
                            <td>{{ $donnee->num_facture }}</td>             
                            <td>{{ $donnee->credit }}</td>             
                            <td>{{ $donnee->debit }}</td>      
                            <td >
                                <a href="/factures_recouvrees/{{$donnee->idClient}}" class="btn btn-danger">Supprimer</a>
                            </td>       
                        </tr>
                    @endforeach
                </tbody>              
            </table>
        </div>
    </div>


</div>
 <script src="{{asset('Js/details.js')}}"></script>
@endsection
