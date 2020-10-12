@extends('master')

@section('content')

<style type="text/css">
  
    .label_design {
    font-weight: normal !important;
  }

  .input_design{
    border: 1px solid #35977D important;
    background-color: #f2f2f2 !important;
    color: #000000!important;
  }

  .select2-selection {
      height: 33px !important;
    }
    .select2-selection__arrow{
      margin-top: 5px !important;
    }
    .select2-selection__rendered{
      padding-top: 2px !important;
    }

    <style>
  
  .gj-timepicker-md [role=right-icon] {
    padding-top: 7px !important;
    font-size: 20px !important;
    padding-right: 4px !important;
  }
  .gj-textbox-md {
    padding: 4px 7px !important;
    font-size: 14px !important;
  }

</style>

</style>

        <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
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
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <!-- /.row -->
        <!-- Main row -->
  
<section class="content">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <h2 class="card-title">Add Invoice</h2>
              <a href="{{ route('invoice.view') }}"><h4 class="btn btn-sm btn-success float-right"><i class="fa fa-list"> All Invoice</i></h4></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
  

                 <div class="row">
                 <div class="col-md-1">
                    
                    <div class="form-group">
                        <label for="mobile" class="label_design">Invoice <font style="color: red">*</font></label>
                        <input type="text" class="form-control input_design form-control-sm" value="{{ $invoice_no }}" name="invoice_no" id="invoice_no" placeholder="" style="background-color: #D8FDBA" readonly="">
                    </div>

                  </div>
                    <div class="col-md-2">
                    
                    <div class="form-group">
                        <label for="name" class="label_design">Date <font style="color: red">*</font></label>
                        <input type="text input_design" class="form-control datepicker form-control-sm" value="{{ date('Y-m-d') }}" name="date" id="date">
                    </div>

                  </div>

         

                  <div class="col-md-4">
                    
                    <div class="form-group">
                        <label for="address" class="label_design">Refered Doctor <font style="color: red">*</font></label>
                        <select name="doctor_id" id="doctor_id" class="form-control select2 input_design form-control-sm">

                          <option value="" selected="" disabled="">Select Doctor</option>
                            @foreach($doctors as $doctor)
                             <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                            @endforeach
                            
                        </select>
                    </div>

                  </div>


                 

               

                  <div class="col-md-4">
                    
                    <div class="form-group">
                        <label for="address" class="label_design">Test Name <font style="color: red">*</font></label>
                        <select name="service_id" id="service_id" class="form-control select2 input_design form-control-sm">

                          <option value="" selected="" disabled="">Select Test</option>
                            @foreach($sevices as $service)
                             <option value="{{ $service->id }}">{{ $service->name }}</option>
                             
                            @endforeach
                            
                        </select>
                    </div>
                      @foreach($sevices as $service)
                      <input type="hidden" id="service_price_{{ $service->id }}" value="{{ $service->price }}">
                      @endforeach
                  </div>

                  <div class="col-md-1">
                    
                    <div class="form-group" style="padding-top: 30px">
                      <a class="btn btn-primary btn-sm addmore" style="color: white"><i class="fa fa-plus-circle"> Add</i></a>
                    </div>

                  </div>


            </div>

            <div class="card-body" style="margin-top: 30px">
              
              <form action="{{ route('invoice.store') }}" method="POST" id="myform">
                @csrf
              <table class="table table-bordered table-sm table-striped" width="100%">
                
                <thead class="bg-info">
                  <tr>
                    <td>Test Name</td>
                    <td width="10%">Quantity <font style="color: red">*</font></td>
                    <td width="15%">Price <font style="color: red">*</font></td>
                    <td width="15%" colspan="2">Discount</td>
                    <td width="20%" colspan="2">Total</td>
                    <td width="10%">Action</td>
                  </tr>
                </thead>

                <tbody class="addRow" id="addRow">
                </tbody>

                <tbody>
                  <tr>
                    <td colspan="5" class="text-right">Tax(%)</td>
                    <td>
                      <input type="number" min="0" class="form-control form-control-sm discount_price" id="tax" name="tax"  value="0">
                    </td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td colspan="5" class="text-right">Special Discount</td>
                    <td>
                      <input type="number" class="form-control form-control-sm special_discount" id="special_discount" name="special_discount"  value="0">
                    </td>
                    <td>
                      <select id="special_discount_type" name="special_discount_type" style="width: 83px" class="form-control form-control-sm">
                        <option value="percent">%</option>
                        <option value="amount">Tk</option>
                      <select>
                    </td>
                    <td></td>
                  </tr>

                   



                  <tr>
                    <td colspan="5" class="text-right">Grand Total</td>
                    <td>
                      <input type="text" min="0" class="form-control form-control-sm estimated_amount" id="estimated_amount" name="estimated_amount" readonly="" value="0" style="background-color: #D8FDBA">
                    </td>
                    <td></td>
                    <td></td>
                  </tr>

                   <tr>
                    <td colspan="5" class="text-right">Paid Amount</td>
                    <td>
                      <input type="number" min="0" class="form-control form-control-sm paid_amount" id="paid_amount" name="paid_amount" value="">
                    </td>
                    <td></td>
                    <td></td>
                  </tr>

                   <tr>
                    <td colspan="5" class="text-right">Due Amount</td>
                    <td>
                      <input type="text" min="0" class="form-control form-control-sm due_amount" id="due_amount" name="due_amount" readonly="" value="">
                    </td>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>

              </table>
              <br>

              <span id="paid_form" style="visibility: hidden">

              <br>
              <div class="row">

            
                <div class="col-md-2">
                  <label for="delivery_date" class="label_design">Delivery Date <font style="color: red">*</font></label>
                </div>
                   <div class="col-md-6">
                    <div class="form-group">
                          <input type="text input_design" name="delivery_date" class="form-control form-control-sm delivery_date" name="date">
                    </div>

                  </div>
              </div>

               <div class="row">

            
                <div class="col-md-2">
                  <label for="delivery_time" class="label_design">Delivery Time <font style="color: red">*</font></label>
                </div>
                   <div class="col-md-6">
                    <div class="form-group">
                          <input style="border: 1px solid #ced4da;;background-color: #f2f2f2;color: #000000" type="text" class="form-control form-control-sm" placeholder="Delivery time" id="time" name="delivery_time">
                    </div>

                  </div>
              </div>

                <div class="row">
                  <div class="col-md-2">
                  <label for="patient_id" class="label_design">Patient Name <font style="color: red">*</font></label>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                  
                  <select class="form-control select2 form-control-sm input_design" name="patient_id" id="patient_id">
                      <option value="" selected="" disabled="">Select Patient<font style="color: red">*</font></option>
                      <option value="0">New Patient</option>
                      @foreach($patients as $patient)
                        <option value="{{ $patient->id }}">{{ $patient->name }} ({{$patient->mobile}}) ({{$patient->address}})</option>
                      @endforeach
                  </select>
                </div>
                </div>
              </div>

                <span class="patient_info" style="display: none">
                <div class="row">

            
                <div class="col-md-2">
                   <label for="name" class="label_design">New Patient Name <font style="color: red">*</font></label>
                </div>
                   <div class="col-md-6">
                  <div class="form-group">
                   
                  <input type="text" name="name" class="form-control form-control-sm input_design" placeholder="Enter Patient Name">
                </div>
                </div>
              </div>
              <div class="row">

            
                <div class="col-md-2">
                 <label for="mobile" class="label_design">New Patient Mobile <font style="color: red">*</font></label>
                </div>
                    <div class="col-md-6">
                  <div class="form-group">
                    
                  <input type="text" name="mobile" class="form-control form-control-sm input_design" placeholder="Enter Mobile no">
                </div>
                </div>
              </div>
              <div class="row">

            
                <div class="col-md-2">
                 <label for="address" class="label_design">New Patient Address <font style="color: red">*</font></label>
                </div>
                   <div class="col-md-6">
                  <div class="form-group">
                    
                  <input type="text" name="address" class="form-control form-control-sm input_design" placeholder="Enter Patient Address">
                 </div>
                </div>
              </div>
              </span>

                


              
              <br>
          {{--     <div class="form-row">


                <div class="col-md-4">
                  <div class="form-group">
                    <label for="name" class="label_design">New Patient Name <font style="color: red">*</font></label>
                  <input type="text" name="name" class="form-control form-control-sm input_design" placeholder="Enter Patient Name">
                </div>
                </div>
                 <div class="col-md-4">
                  <div class="form-group">
                    <label for="mobile" class="label_design">New Patient Mobile <font style="color: red">*</font></label>
                  <input type="text" name="mobile" class="form-control form-control-sm input_design" placeholder="Enter Mobile no">
                </div>
                </div>
                 <div class="col-md-4">
                  <div class="form-group">
                    <label for="address" class="label_design">New Patient Address <font style="color: red">*</font></label>
                  <input type="text" name="address" class="form-control form-control-sm input_design" placeholder="Enter Patient Address">
                 </div>
                </div>

              </div> --}}
             
                <br>
                <div class="form-row" style="float: right;">
                  <button type="submit" class="btn btn-primary btn-sm" style="color: white;background: #28a745;border: none;font-weight: bold;" > Save and Paid</button>
                </div>
                </span>

              </form>

            </div>
            <!-- /.card-body -->
            </div>
          
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
          <!-- /.Left col -->

        </div>

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

  <script id="document-template" type="test/x-handlebars-template">
  <tr class="delete_add_more_item">
    <input type="hidden" name="date" value="@{{date}}">
    <input type="hidden" name="invoice_no" value="@{{invoice_no}}">
    <input type="hidden" name="doctor_id[]" value="@{{doctor_id}}">
    <td style="font-weight:bold">
      <input type="hidden" name="service_id[]" value="@{{service_id}}">
      @{{service_name}}
    </td>
    <td>
      <input type="number" name="sellling_qty[]" min="1" class="form-control form-control-sm sellling_qty text-left"  value="1">  
    </td>
    <td>
      <input type="number" name="unit_price[]" min="1" readonly=""  class="form-control form-control-sm unit_price text-right"  value="@{{service_price}}">  
    </td>

     <td>
      <input style="width: 83px;" type="number" min="0" name="discount_price_item[]"  class="form-control form-control-sm discount_price_item text-left"  value="0"> 
    </td>
    <td>
      <select name="discount_price_type[]" class="form-control form-control-sm discount_type">
        <option value="percent">%</option>
        <option value="amount">Tk</option>
      <select>
    </td>
    <td>
      <input name="selling_price[]"  class="form-control form-control-sm selling_price text-right" value="@{{service_price}}" readonly="">
    </td>
    <td></td>
    <td>
      <i class="fa fa-window-close btn btn-danger btn-sm removeItem"></i>
    </td>
  </tr>
    
  </script>


  <script>
    
    $(function(){
      $(document).on('click','.addmore',function(){
          var date = $('#date').val();
          var invoice_no = $('#invoice_no').val();
          var doctor_id = $('#doctor_id').val();
          var service_id = $('#service_id').val();
          var service_price = $(`#service_price_${service_id}`).val();
          var service_name = $('#service_id').find('option:selected').text();
          
          if (date == '') {
            $.notify('Date is required', {globalPosition: 'top right', className: 'error'})
            return false
          }
          if (invoice_no == '') {
            $.notify('Invoice no is required', {globalPosition: 'top right', className: 'error'})
            return false
          }
          if (doctor_id == null) {
            $.notify('Doctor is required', {globalPosition: 'top right', className: 'error'})
            return false
          }
          if (service_id == null) {
            $.notify('Service is required', {globalPosition: 'top right', className: 'error'})
            return false
          }
          var source = $('#document-template').html();
          var template = Handlebars.compile(source);
          var data = {
            date: date,
            invoice_no: invoice_no,
            doctor_id: doctor_id,
            service_id: service_id,
            service_name: service_name,
            service_price: service_price,
          }
          var html = template(data);
          $('#addRow').append(html);
          $('#paid_form').css("visibility","visible")
          totalPrice()

      })
      $(document).on('click','.removeItem',function(e){
        $(this).closest('.delete_add_more_item').remove()
        totalPrice()
      })
      $(document).on('keyup click','.sellling_qty,.unit_price,.discount_price_item', function(){

          var selling_price;
          var sellling_qty = $(this).closest('tr').find('input.sellling_qty').val();
          var unit_price = $(this).closest('tr').find('input.unit_price').val();
          var discount_price_item = $(this).closest('tr').find('input.discount_price_item').val();

          var discount_type = $(this).closest('tr').find('.discount_type').val();

          if (discount_type == 'amount') {
             selling_price =  (sellling_qty*unit_price) - discount_price_item;
          }else{
            var row_total_price = sellling_qty*unit_price;
            var individual_discount_price = parseFloat(row_total_price*(discount_price_item/100)).toFixed(2)
            selling_price = (sellling_qty*unit_price)-individual_discount_price
          }
          
          $(this).closest('tr').find('input.selling_price').val(selling_price);
          $('#tax').trigger('keyup')
          $('#special_discount').trigger('keyup')
          $('#paid_amount').trigger('keyup')
          
      })

      $(document).on('change','.discount_type',function(){
        $(this).closest('tr').find('input.discount_price_item').trigger('keyup')
        $('#paid_amount').trigger('keyup')


      })

      $(document).on('change','#special_discount_type',function(){
        $('#special_discount').trigger('keyup')
        $('#paid_amount').trigger('keyup')

      })

      $(document).on('keyup click', '#tax,#special_discount', function(){
          totalPrice();
          $('#paid_amount').trigger('keyup')
      })
      function totalPrice(){
        var sum = 0;
        var helper_sum;
        $('.selling_price').each(function(){
          var value = $(this).val();
          if (!isNaN(value) && value.length != 0) {
              sum += parseFloat(value);
          }
          
        })

        helper_sum = sum;
        var tax = $('#tax').val();
        var special_discount = $('#special_discount').val()

        var type = $('#special_discount_type').val()

        if(type == 'percent'){
          var special_discount_price = parseFloat(helper_sum*(special_discount/100))
          if (!isNaN(special_discount) && special_discount.length != 0) {
            sum -= parseFloat(special_discount_price).toFixed(2)
            $('#estimated_amount').val(sum)
          }
        }else{
            if (!isNaN(special_discount) && special_discount.length != 0) {
               sum -= parseFloat(special_discount)
              }
            
            $('#estimated_amount').val(sum)
          }

        var tax_price = parseFloat(helper_sum*(tax/100))
        if (!isNaN(tax) && tax.length != 0) {
          sum += parseFloat(tax_price)
        }

        $('#estimated_amount').val(sum)
        
      }
    })
  </script>


  <script>
    
    // $(document).on('change','#paid_status',function(){
    //     var status = $(this).val();
    //     if (status == 'partial_paid') {
    //       var grand_total = $('#estimated_amount').val();
    //       $('#paid_amount').val(grand_total)
    //       $('#paid_amount_column').show()
    //       $('#due_amount_column').show()
    //     }else{
    //       $('#paid_amount_column').hide()
    //       $('#due_amount_column').hide()
    //     }
    // })
    $(document).on('change','#patient_id',function(){
        var patient_id = $(this).val();
        if (patient_id == '0') {
          $('.patient_info').show()
        }else{
          $('.patient_info').hide()
        }
    })
  </script>

  <script>
    
    $(document).on('keyup click','#paid_amount',function(){

      var paid_amount = $(this).val();
      var total = $('#estimated_amount').val()
      var due_amount =  parseFloat(total-paid_amount).toFixed(2);
     
        $('#due_amount').val(due_amount)
    
      

    })

  </script>

  <script type="text/javascript">
      
  $(document).ready(function () {
  $('#myform').validate({
    rules: {
      paid_amount: {
        required: true,
      },
      delivery_date: {
        required: true,
      },
      name: {
        required: true,
      },
      mobile: {
        required: true,
      },
      patient_id: {
        required: true,
      },
      delivery_time: {
        required: true,
      },
      'unit_price[]': {
          required: true
      },
      'sellling_qty[]': {
          required: true
      }
    },
    messages: {

      delivery_date: {
        required: "Delivery date is required",
      },
      paid_amount: {
        required: "Paid amount is required",
      },
      name: {
        required: "Patient name is required",
      },
      mobile: {
        required: "Patient Mobile is required",
      },
      patient_id: {
        required: "Patient Name is required",
      },
      delivery_time: {
        required: "Delivery time is required",
      },
      
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
    </script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <script>
        $('.datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd'
        });
        $('.delivery_date').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd'
        });
        $('#time').timepicker();
    </script>

    

@endsection