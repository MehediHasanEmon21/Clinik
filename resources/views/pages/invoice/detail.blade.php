@extends('master')

@section('content')

<style>
  
  .table-design td, .table-design th{
    border: none !important;
    padding: 5px !important;
  }

</style>

        <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluinvoice_detail">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"></a></li>
            
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluinvoice_detail -->
    </div>
    <!-- /.content-header -->
       <section class="content">
      <div class="container-fluinvoice_detail">
        <div class="row">
          <div class="col-12">
            


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> {{$setting->name}}
                    <small class="float-right">Date: {{ date('d/M/Y') }}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>{{$setting->name}}</strong><br>
                    {{$setting->address}}<br>
                    Phone: {{$setting->phone}}<br>
                    Email: {{$setting->email}}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong>Name: </strong>{{ $invoice->payment->user->name }}<br>
                    <strong>Refd. Dr: </strong>{{ $invoice->invoice_details[0]->doctor->name }}<br>
                    <strong>Address: </strong>{{ $invoice->payment->user->address }}<br>
                    <strong>Mobile:</strong> {{ $invoice->payment->user->mobile }}<br>
                    <strong>Email:</strong> {{ $invoice->payment->user->email }}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice #0000{{ $invoice->invoice_no }}</b><br>
                  <br>
                  <b>Total Amount:</b> {{$invoice->payment->total_amount}}<br>
                  <b>Paid Amount:</b> {{$invoice->payment->paid_amount}}<br>
                  <b>Payment Due:</b> {{$invoice->payment->due_amount}}
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->


              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped table-bordered">
                    <thead class="bg-info">
                    <tr>
                      <th>S/N</th>
                      <th>Test Name</th>
                      <th>Quantity</th>
                      <th>Rate</th>
                      <th>Discount</th>
                      @if($type == 'percent')
                        <th>D. Amt</th>
                      @endif
                      <th>Total Amount</th>
                    </tr>
                    </thead>
                    @php
                    $total = 0;
                    @endphp
                    <tbody>
                      @foreach($invoice->invoice_details as $key=>$invoice_detail)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $invoice_detail->test->name }}</td>
                      <td>{{ $invoice_detail->selling_qty }}</td>
                      <td>{{ $invoice_detail->unit_price }}</td>
                      <td>
                        {{ $invoice_detail->discount }} @if($invoice_detail->discount_price_type == 'amount') Tk @else %  @endif
                      </td>

                      @if($invoice_detail->discount_price_type == 'percent')
                      <td>{{$invoice_detail->discount_amount}} </td>
                      @endif
                      <td>{{ $invoice_detail->selling_price }} </td>
                    </tr>
                    @php
                      $total = $total + ($invoice_detail->selling_qty*$invoice_detail->unit_price);
                    @endphp
                    @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  
                </div>
                <!-- /.col -->
                <div class="col-6">

                  <div class="table-responsive">
                    <table class="table table-design" style="border-bottom: 2px solid">
                      <tr>
                        <th style="width:50%">Total Rate:</th>
                        <td>{{$total}} </td>
                      </tr>
                       <tr>
                        <th style="width:50%">Less Discount:</th>
                        <td>{{$invoice->payment->discount_amount}}</td>
                      </tr>
                       <tr>
                        <th style="width:50%">Total Payble Amount:</th>
                        <td>{{$invoice->payment->total_after_discount_amount}}</td>
                      </tr>
                      <tr>
                        <th>Special Discount(-):</th>
                        <td>{{$invoice->payment->special_discount_amount}}</td>
                      </tr>

                      <tr>
                        <th>Tax ({{$invoice->payment->tax}}%)</th>
                        <td>{{$invoice->payment->tax_amount}}</td>
                      </tr>
                     
                      {{-- <tr>
                        <th>Due Amount:</th>
                        <td> {{$invoice->payment->due_amount}}</td>
                      </tr> --}}
                    </table>

                  </div>
                  <div class="table-responsive">
                    <table class="table table-design" style="border-bottom: 2px solid">

                       <tr>
                        <th style="width:50%">Grand Total:</th>
                        <td> {{$invoice->payment->total_amount}}</td>
                      </tr>
                       <tr>
                        <th style="width:50%">Paid Amount:</th>
                        <td> {{$invoice->payment->paid_amount}}</td>
                      </tr>
                      
                    </table>
                  </div>

                  <div class="table-responsive">
                    <table class="table table-design">

                       <tr>
                        <th style="width:50%">Due Amount:</th>
                        <td> {{$invoice->payment->due_amount}}</td>
                      </tr>

                      
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
        
                  <a href="{{ route('invoice.pdf',$invoice->id) }}" target="_blank" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </a>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluinvoice_detail -->
    </section>


@endsection