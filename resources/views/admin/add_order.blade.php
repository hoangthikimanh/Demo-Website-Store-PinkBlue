@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-defaults">
      <div class="panel-heading">
       Tạo đơn hàng
      </div>
      <div class="row w3-res-tb">
        <form id="customer-search-form">
            <input type="text" id="search" placeholder="Tìm theo tên, SĐT, mã khách hàng ...">
         
          
         
          <div id="customer-card-template" style="display:none">
            <div class="customer-info">
              <p>Tên: <span class="customer-name"></span></p>
              <p>Email: <span class="customer-email"></span></p>
              <p>Số điện thoại: <span class="customer-phone"></span></p>
            </div>
          </div>
        </form>
      </div>
      <div class="table-responsive">
       <!-- Your table code here -->
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      $('#search').keyup(function() {
        const searchQuery = $(this).val().trim();
    
        if (searchQuery.length === 0) {
          // Clear and hide the searching result if the input is empty
          $('#customer-info').empty().hide();
          return;
        }
    
        $.ajax({
          url: '{{ url('search-customer-admin') }}',
          method: 'GET',
          data: { q: searchQuery },
          success: function(response) {
            if (response.customers.length > 0) {
              // Clear existing customer information
              $('#customer-info').empty();
    
              const { customers } = response;
              customers.forEach(customer => {
                // Clone the customer card template
                const template = $('#customer-card-template').clone();
    
                // Populate the template fields
                template.find('.customer-name').text(customer.customer_name);
                template.find('.customer-email').text(customer.customer_email);
                template.find('.customer-phone').text(customer.customer_phone);
    
                // Append the template to the customer information area
                $('#customer-info').append(template.html());
              });
    
              $('#customer-info').show();
            } else {
              $('#customer-info').html('<p>Không tìm thấy kết quả.</p>').show();
            }
          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.error(textStatus, errorThrown);
          }
        });
      });
    });
    
    </script>




@endsection
