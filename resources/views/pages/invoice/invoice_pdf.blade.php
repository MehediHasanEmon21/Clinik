<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Invoice PDF</title>
  <style type="text/css">
    
    table {
      border-collapse: collapse;
    }
    h2, h3 {
      margin: 0;
      padding: 0;
    }
    .table {
      width: 100%;
      margin-bottom: 1rem;
      background-color: transparent;
    }
    .table th, .table td {
      padding: 0.75rem;
      vertical-align: top;
      border-top: 1px solid #dee2e6;
    }
    .table thead th {
      vertical-align: bottom;
      border-top: 1px solid #dee2e6;
    }
    .table tbody + tbody {
      border-top: 2px solid #dee2e6;
    }
    .table {
      background-color: #fff;
    }
    .table-bordered {
      border: 1px solid #dee2e6;
    }
    .table-bordered th, .table-bordered td {
      border: 1px solid #dee2e6;
    }
    .table-bordered thead th, .table-bordered thead td {
      border-bottom-width: 2px;
    }
    .text-center {
      text-align: center;
    }
    .text-right {
      text-align: right;
    }
    table tr td {
      padding: 5px;
    }
    .table-bordered thead th, .table-bordered th, .table-bordered td {
      border: 1px solid black !important;
    }
    .table-bordered thead th{
      background-color: #cacaca;
    }
  </style>
</head>
<body>

  <div class="container">
    
    <div class="row">
      
      <div class="col-md-12">
        <table width="100%">

          <tr>
            <td width="30%" class="text-center">
              
            </td>
            <td width="40%" class="text-center">
              
            </td>
            <td class="text-center" width="30%"> 
              
            </td>
          </tr>
          
        </table>
        
      </div>

       <div class="col-md-12">
        <table width="100%">

          <tr>
            <td width="30%" class="text-center">
              
            </td>
            <td width="40%" class="text-center">
              <h3><strong>{{$setting->name}}</strong></h3>
              <p>{{$setting->address}}</p>
              <p>Tel: {{$setting->phone}}</p>
            </td>
            <td class="text-center" width="30%"> 
              
            </td>
          </tr>
          
        </table>
        
      </div><br>

      <div class="col-md-12">
        <table width="100%">

          <tr>
            <td width="50%">
              
              <table width="100%">

              <tr>
                <td width="50%"><strong>Invoice No</strong></td>
                <td><span style="font-weight: bold; font-size: 20px">: 0000{{ $invoice->invoice_no }}</span></td>
              </tr>
              <tr>
                <td width="50%"><strong>Patient Name</strong></td>
                <td>: {{ $invoice->payment->user->name }}</td>
              </tr>

              <tr>
                <td width="50%"><strong>Mobile</strong></td>
                <td>: {{ $invoice->payment->user->mobile }}</td>
              </tr>

              <tr>
                <td width="50%"><strong>Refd. By</strong></td>
                <td>: {{ $invoice->invoice_details[0]->doctor->name }}</td>
              </tr>

              </table>

            </td>

            <td width="50%">
               <table width="100%">

              <tr>
                <td width="50%"><strong>Issue Date</strong></td>
                <td>:{{ date('d M Y') }}</td>
              </tr>
              <tr>
                <td width="50%"><strong>Gender</strong></td>
                <td>: Male</td>
              </tr>

              </table>
            </td>
           
            
          </tr>
          
          

         </table>
        
      </div>

     <br>

      <div class="col-md-12">
        
        <table border="1" width="100%">
          
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
         @php
          $total = 0;
          @endphp
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
   
          
        </table>
        {{-- <i style="font-size: 10px; float: right;">Print Date: {{ date('d M Y') }}</i> --}}
      </div><br>


      <div class="col-md-12">
        <table width="100%">

          <tr>
            <td width="50%">
              @if($invoice->payment->due_amount == 0)
              <h1 style="padding: 20px; border: 2px solid">PAID</h1>
              @else
              <h1 style="padding: 20px; border: 2px solid">DUE</h1>
              @endif
              

            </td>

            <td width="50%">

              <table width="100%" style="border-bottom: 2px solid">

              <tr>
                <td width="50%"><strong>Total Rate</strong></td>
                <td>: {{$total}}</td>
              </tr>
              <tr>
                <td width="50%"><strong>Less Discount</strong></td>
                <td>: {{$invoice->payment->discount_amount}}</td>
              </tr>

              <tr>
                <td width="50%"><strong>Total Payble Amount</strong></td>
                <td>: {{$invoice->payment->total_after_discount_amount}}</td>
              </tr>

              <tr>
                <td width="50%"><strong>Special Discount(-)</strong></td>
                <td>: {{$invoice->payment->special_discount_amount}}</td>
              </tr>
              <tr>
                <td width="50%"><strong>Tax ({{$invoice->payment->tax}}%)</strong></td>
                <td>: {{$invoice->payment->tax_amount}}</td>
              </tr>

              </table>

              <table width="100%" style="border-bottom: 2px solid">

              <tr>
                <td width="50%"><strong>Grand Total</strong></td>
                <td>: {{$invoice->payment->total_amount}}</td>
              </tr>
              <tr>
                <td width="50%"><strong>Paid(-)</strong></td>
                <td>: {{$invoice->payment->paid_amount}}</td>
              </tr>

              </table>

              <table width="100%">

              <tr>
                <td width="50%"><strong>Due Amount</strong></td>
                <td>: {{$invoice->payment->due_amount}}</td>
              </tr>

              </table>

              

              

              
            </td>
           
            
          </tr>
          
          

         </table>
        
      </div><br><br><br>

      <div class="col-md-12">
        <table width="100%">

          <tr>
            <td width="20%">

              <hr style="border: solid 1px; width: 100%; color: #000; margin-bottom: 0">
              <p style="text-align: center;">Accountant</p>

            </td>

            <td width="10%"></td>

            <td width="60%">
              <h3 style="border: 2px solid">Delivery date: {{ $invoice->delivery_date }} {{ $invoice->delivery_time }}</h3>
            </td>
            <td></td>
           
            
          </tr>
          
          

         </table>
        
      </div><br><br><br>

      @php
          $date = new DateTime('now', new DateTimeZone('Asia/Dhaka'));
      @endphp

      <div class="col-md-12">
        <table width="100%">

          <tr>
            <td width="50%">

              <i style="font-size: 11px; float: right;">Generation date: {{ $date->format('F j, Y, g:i a') }}</i>

            </td>

            <td width="10%"></td>

            
           
            
          </tr>
          
          

         </table>
        
      </div>




     {{--  <div class="col-md-12">
        <table border="0" width="100%">
          <tr>
            <td width="30%"></td>
            <td width="30%"></td>
            <td width="40%">
              <hr style="border: solid 1px; width: 60%; color: #000; margin-bottom: 0">
              <p class="text-center">Principal/Headmaste</p>
            </td> 
          </tr>
        </table>
      </div> --}}


    </div>
    {{-- <hr style="border:dashed 1px; width: 96%; color: #DDD; margin-bottom: 30px;"> --}}

  

  </div>
  
</body>
</html>