<div>
    @if($detail_orders)
    <div class="fixed-bottom">
        <table class="table table-bordered table-dark text-center">
            <thead>
                <tr>
                    <th> Rp.{{number_format($detail_orders->total_belanja,2)}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pay as $p)
                <tr>
                    <td>Uang Masuk : {{date('d-M-Y', strtotime($p->created_at))}} : Rp.{{number_format($p->nominal,2)}}</td>
                </tr>
                @endforeach
                <tr>
                    <td>Sisa : Rp.{{number_format($sisa,2)}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    @else
    <div class="text-light bg-dark fixed-bottom">
        <h1 class="text-center">?</h1>
    </div>
    @endif
</div>
