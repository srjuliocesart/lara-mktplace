@extends('layouts.front')

@section('stylesheets')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')

    <div class="container">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <h2>Dados para pagamento</h2>
                    <hr>
                </div>
            </div>
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for="">Nome do proprietário do cartão</label>
                        <input type="text" class="form-control" name="card_name">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for="">Numero do cartão <span class="brand"></span></label>
                        <input type="text" class="form-control" name="card_number">
                        <input type="hidden" name="card_brand">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 form-group">
                        <label for="">Mês de expiração</label>
                        <input type="text" class="form-control" name="card_month">
                    </div>
                    <div class="col-md-2 form-group">
                        <label for="">Ano de expiração</label>
                        <input type="text" class="form-control" name="card_year">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="">Código de segurança</label>
                        <input type="text" name="card_cvv" class="form-control">
                    </div>
                    <div class="col-md-12 installments form-group"></div>
                </div>
                <button class="btn btn-success btn-lg processCheckout">Efetuar pagamento</button>
            </form>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
    <script>
        const sessionId = '{{session()->get('pagseguro_session_code')}}';
        const urlThanks = '{{route('checkout.thanks')}}';
        const amountTransaction = '{{$cartItems}}';
        const urlProcess = '{{route('checkout.process')}}';
        const csrf = '{{csrf_token()}}';
        result = PagSeguroDirectPayment.setSessionId(sessionId);
    </script>
    @vite(['resources/js/pagseguro_events.js'])
{{--    <script src="{{asset('js/pagseguro_functions.js')}}"></script>--}}
{{--    <script src="{{asset('js/pagseguro_events.js')}}"></script>--}}
{{--    <script src="{{asset('js/pagseguro_events.js')}}"></script>--}}
@endsection
